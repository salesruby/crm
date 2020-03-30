<?php
/**
 * Created by PhpStorm.
 * User: tujailer
 * Date: 3/15/20
 * Time: 5:03 PM
 */

namespace App\Service;


class Select
{
    public static function showSelected($info, $text){
        return $info === $text ? "selected" : "";
    }
}