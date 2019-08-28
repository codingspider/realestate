<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model {

    protected $table = 'features';
    protected $primaryKey = 'id';
    public $timestamps = false;

}
