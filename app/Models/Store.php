<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public $id;
    public $name;
    public $code;
    public $longitude;
    public $latitude;
    public $subdistrict;
    public $postal_code;
    public $frequency; // weekly, biweekly, monthly

    public function __construct($id, $name, $code, $longitude, $latitude, $subdistrict, $postal_code, $frequency)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
        $this->subdistrict = $subdistrict;
        $this->postal_code = $postal_code;
        $this->frequency = $frequency;
    }
}
