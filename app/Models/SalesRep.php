<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesRep extends Model
{
    public $id;
    public $name;
    public $schedule = [];  // Stores the assigned store IDs and dates

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
