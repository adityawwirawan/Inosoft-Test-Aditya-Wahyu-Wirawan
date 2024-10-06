<?php

namespace App\Services;

use App\Helpers\Sales;
use App\Models\Store;

class RoutingService
{
    protected $stores = [];
    protected $routes = []; // New property to hold the route plans
    protected $headquarters = [
        'latitude' => -7.9826,
        'longitude' => 112.6308,
    ];
    protected $salesRepresentatives = 10; // Total sales representatives

    public function loadStores(array $storeData)
    {
        for ($x=0; $x<count($storeData); $x++) {
            $this->stores[] = new Store(
                $x+1,
                $storeData[$x]['name'],
                $storeData[$x]['code'],
                $storeData[$x]['longitude'],
                $storeData[$x]['latitude'],
                $storeData[$x]['subdistrict'],
                $storeData[$x]['postal_code'],
                $storeData[$x]['frequency']
            );
        }

    }

    public function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371; // Earth radius in kilometers

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c; // Distance in kilometers
    }

    public function generateRoutes()
    {
        $schedules = [];
        $storeVisits = []; // To keep track of how many times each store has been assigned

        // Initialize the schedule for each representative
        for ($rep = 1; $rep <= $this->salesRepresentatives; $rep++) {
            $schedules["Sales{$rep}"] = [];
        }

        $totalDays = 31; // Total days in October
        $salesReps = $this->salesRepresentatives;

        // Pre-calculate which stores are available on each day
        $availableStoresPerDay = [];

        for ($day = 1; $day <= $totalDays; $day++) {
            if ($day > 30) break; // October has 31 days
            if (date('N', strtotime("2024-10-{$day}")) == 7) {
                continue; // Skip Sundays
            }

            $date = sprintf('2024-10-%01d', $day);
            $availableStores = []; // Track stores assigned today

            foreach ($this->stores as $store) {
                // Frequency check
                if ($store->frequency == 'weekly' && ($day % 7) != 1) {
                    continue; // Only assign on specified weeks
                }
                if ($store->frequency == 'biweekly' && ($day % 15) != 1) {
                    continue; // Only assign on specified biweekly days
                }
                if ($store->frequency == 'monthly' && $day != 30) {
                    continue; // Only assign on the last day of the month
                }

                $availableStores[] = $store->name; // Store name
            }

            $availableStoresPerDay[$date] = $availableStores;
        }

        // Assign stores to sales representatives
        for ($day = 1; $day <= $totalDays; $day++) {
            if ($day > 30) break; // October has 31 days
            if (date('N', strtotime("2024-10-{$day}")) == 7) {
                continue; // Skip Sundays
            }

            $date = sprintf('2024-10-%01d', $day);
            $assignedStoresToday = [];

            // Loop through each sales representative
            for ($rep = 1; $rep <= $salesReps; $rep++) {
                // Get available stores for today
                $availableStores = array_diff($availableStoresPerDay[$date], $assignedStoresToday);

                // Assign stores if available
                if (!empty($availableStores)) {
                    $assignedToday = $this->assignStores(array_values($availableStores), 30); // Limit to 30 stores
                    $schedules["Sales{$rep}"][$date] = $assignedToday;
                    $assignedStoresToday = array_merge($assignedStoresToday, $assignedToday);

                    // Track the number of times each store has been assigned
                    foreach ($assignedToday as $storeName) {
                        if (!isset($storeVisits[$storeName])) {
                            $storeVisits[$storeName] = 0;
                        }
                        $storeVisits[$storeName]++;
                    }
                }
            }
        }

        return $schedules;
    }
    protected function assignStores($stores, $limit)
    {
        shuffle($stores); // Randomize the order of stores
        return array_slice($stores, 0, min($limit, count($stores))); // Return up to 'limit' stores
    }

    protected function createRoutePlan($frequency, $stores)
    {
        $plan = [];
        $dailyLimit = 30; // Maximum stores per day
        $storeCount = count($stores);
        $daysNeeded = ceil($storeCount / $dailyLimit);

        for ($i = 0; $i < $daysNeeded; $i++) {
            $dailyStores = array_slice($stores, $i * $dailyLimit, $dailyLimit);
            $plans[] = $this->calculateRouteForDay($dailyStores);
        }

        return $plans;
    }

    protected function calculateRouteForDay($stores)
    {
        $route = [];
        $visited = [];
        $currentLocation = $this->headquarters; // Start from headquarters

        while (count($visited) < count($stores)) {
            $closestStore = null;
            $closestDistance = PHP_INT_MAX;

            foreach ($stores as $store) {
                if (!in_array($store->id, $visited)) {
                    $distance = $this->calculateDistance($currentLocation['latitude'], $currentLocation['longitude'], $store->latitude, $store->longitude);
                    if ($distance < $closestDistance) {
                        $closestDistance = $distance;
                        $closestStore = $store;
                    }
                }
            }

            if ($closestStore) {
                $route[] = $closestStore;
                $visited[] = $closestStore->id;
                $currentLocation = ['latitude' => $closestStore->latitude, 'longitude' => $closestStore->longitude];
            }
        }

        return $route;
    }

    public function getRoutes()
    {
        return $this->routes; // Return the routes
    }

    public function getStores()
    {
        return $this->stores;
    }

    public function getSales()
    {
        return Sales::salesList();
    }
}
