<?php


namespace App\Helpers;

use Illuminate\Support\Str;


class RusStr extends Str
{
    public static function rus_plural($count = 1, $titles = array())
    {
        $cases = array(2, 0, 1, 1, 1, 2);

        return $count . " " . $titles[($count % 100 > 4 && $count % 100 < 20) ? 2 : $cases[min($count % 10, 5)]];
    }
}
