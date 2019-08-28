<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model {

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
