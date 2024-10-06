<?php

namespace App\Helpers;

use App\Exports\DataExport;
use Illuminate\Support\Facades\Auth;

class ExportHelper
{
    public static function prepareReport($datas)
    {
        $response = [];
        $header = [
            'Sales',
            '1-Oct',
            '2-Oct',
            '3-Oct',
            '4-Oct',
            '5-Oct',
            '6-Oct',
            '7-Oct',
            '8-Oct',
            '9-Oct',
            '10-Oct',
            '11-Oct',
            '12-Oct',
            '13-Oct',
            '14-Oct',
            '15-Oct',
            '16-Oct',
            '17-Oct',
            '18-Oct',
            '19-Oct',
            '20-Oct',
            '21-Oct',
            '22-Oct',
            '23-Oct',
            '24-Oct',
            '25-Oct',
            '26-Oct',
            '27-Oct',
            '28-Oct',
            '29-Oct',
            '30-Oct',
            '31-Oct',
        ];
        array_push($response, $header);

        foreach ($datas as $data => $days) {
            array_push($response, [
                $data,
                isset($days["2024-10-1"]) ? implode(', ', $days["2024-10-1"]) : '',
                isset($days["2024-10-2"]) ? implode(', ', $days["2024-10-2"]) : '',
                isset($days["2024-10-3"]) ? implode(', ', $days["2024-10-3"]) : '',
                isset($days["2024-10-4"]) ? implode(', ', $days["2024-10-4"]) : '',
                isset($days["2024-10-5"]) ? implode(', ', $days["2024-10-5"]) : '',
                isset($days["2024-10-6"]) ? implode(', ', $days["2024-10-6"]) : '',
                isset($days["2024-10-7"]) ? implode(', ', $days["2024-10-7"]) : '',
                isset($days["2024-10-8"]) ? implode(', ', $days["2024-10-8"]) : '',
                isset($days["2024-10-9"]) ? implode(', ', $days["2024-10-9"]) : '',
                isset($days["2024-10-10"]) ? implode(', ', $days["2024-10-10"]) : '',
                isset($days["2024-10-11"]) ? implode(', ', $days["2024-10-11"]) : '',
                isset($days["2024-10-12"]) ? implode(', ', $days["2024-10-12"]) : '',
                isset($days["2024-10-13"]) ? implode(', ', $days["2024-10-13"]) : '',
                isset($days["2024-10-14"]) ? implode(', ', $days["2024-10-14"]) : '',
                isset($days["2024-10-15"]) ? implode(', ', $days["2024-10-15"]) : '',
                isset($days["2024-10-16"]) ? implode(', ', $days["2024-10-16"]) : '',
                isset($days["2024-10-17"]) ? implode(', ', $days["2024-10-17"]) : '',
                isset($days["2024-10-18"]) ? implode(', ', $days["2024-10-18"]) : '',
                isset($days["2024-10-19"]) ? implode(', ', $days["2024-10-19"]) : '',
                isset($days["2024-10-20"]) ? implode(', ', $days["2024-10-20"]) : '',
                isset($days["2024-10-21"]) ? implode(', ', $days["2024-10-21"]) : '',
                isset($days["2024-10-22"]) ? implode(', ', $days["2024-10-22"]) : '',
                isset($days["2024-10-23"]) ? implode(', ', $days["2024-10-23"]) : '',
                isset($days["2024-10-24"]) ? implode(', ', $days["2024-10-24"]) : '',
                isset($days["2024-10-25"]) ? implode(', ', $days["2024-10-25"]) : '',
                isset($days["2024-10-26"]) ? implode(', ', $days["2024-10-26"]) : '',
                isset($days["2024-10-27"]) ? implode(', ', $days["2024-10-27"]) : '',
                isset($days["2024-10-28"]) ? implode(', ', $days["2024-10-28"]) : '',
                isset($days["2024-10-29"]) ? implode(', ', $days["2024-10-29"]) : '',
                isset($days["2024-10-30"]) ? implode(', ', $days["2024-10-30"]) : '',
                isset($days["2024-10-31"]) ? implode(', ', $days["2024-10-31"]) : '',

            ]);
        }

        return new DataExport($response);
    }

}
