<?php

/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: helper.php
 */

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\User;

function getLevel($level) {
    $type = "";
    switch ($level) {
        case 6031:
            $type = "user";
            break;
        case 6036:
            $type = "admin";
            break;
        case 6035:
            $type = "editor";
            break;
        case 6034:
            $type = "recrutor";
            break;
    }
    return $type;
}

function loadEditors() {
    return User::whereIn('level', [6036,6035])->get();
}

?>
