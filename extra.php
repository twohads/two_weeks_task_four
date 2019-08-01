<?php


namespace extra;


trait extraOptions
{
    public function gps($time)
    {
        if ($time < 60) {
            return $sum = 15;
        } else {
            return $sum = $time / 60 * 15;
        }
    }

    public function driver($quantity)
    {
        return $quantity + 1000;
    }

}