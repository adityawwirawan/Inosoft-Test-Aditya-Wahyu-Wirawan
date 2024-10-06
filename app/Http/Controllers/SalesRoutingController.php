<?php

namespace App\Http\Controllers;

use App\Helpers\StoreList;
use App\Services\RoutingService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\ExportHelper;

class SalesRoutingController extends Controller
{
    protected $routingService;

    public function __construct(RoutingService $routingService)
    {
        $this->routingService = $routingService;
        $storeData = StoreList::storeList();
        $this->routingService->loadStores($storeData);
    }

    public function showStore()
    {
        $stores = $this->routingService->getStores();
        return view('stores', ['stores' => $stores]);
    }

    public function showSales()
    {
        $sales = $this->routingService->getSales();
        return view('sales', ['sales' => $sales]);
    }

    public function showRoutes()
    {
        $routes = $this->routingService->generateRoutes();
        return view('schedules', ['schedules' => $routes]);
    }

    public function export()
    {
        $datas = $this->routingService->generateRoutes();

        $export = ExportHelper::prepareReport($datas);
        return Excel::download($export, 'Schedule-' . Carbon::now()->format('Y-m-d') . '.xlsx');
    }
}
