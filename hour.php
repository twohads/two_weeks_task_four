<?php


namespace hour;


use based\Based;
use extra\extraOptions;


class HourRate extends Based
{
    use extraOptions;
    public function calcPrice()
    {
        if (!$this->check){
            $this->checkAge();
        }

        $this->sumOrder += $this->time * 3.3; // Перевел стоимость цены за час в минуту
        if($this->discount){
            $this->increasePrice();
        }

        return $this->sumOrder;
    }

}