<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $sales_rep_id;
    public $store_id;
    public $visit_date;

    public function __construct($sales_rep_id, $store_id, $visit_date)
    {
        $this->sales_rep_id = $sales_rep_id;
        $this->store_id = $store_id;
        $this->visit_date = $visit_date;
    }
}
