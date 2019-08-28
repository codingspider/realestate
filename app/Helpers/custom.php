<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Session as s;

/*
 *  Get Simple Comapny 
 * param id
 */

function get_catogory($id) {
    $res = DB::table("category")->where("id" , $id)->first();
    if (count($res) <= 0)
        return false;
    return $res->name;
}

function get_testimonials() {
    $res = DB::table("testimonials")->get();
    if (count($res) <= 0)
        return false;
    return $res;
}

function get_agent($id) {
    $res = DB::table("users")->where("id" , $id)->first();
    if (count($res) <= 0)
        return false;
    return $res->name;
}

function get_property($id) {
    $res = DB::table("properties")->where("id" , $id)->first();
    if (count($res) <= 0)
        return false;
    return $res;
}


function get_setting() {
    $res = DB::table("settings")->where("id" , 1)->first();
    if (count($res) <= 0)
        return false;
    return $res;
}


function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full)
        $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}





