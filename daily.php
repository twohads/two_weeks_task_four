<?php


namespace daily;


use based\Based;

class DailyRate extends Based
{
    public function calcPrice()
    {
        if (!$this->check){
            $this->checkAge();
        }
        $this->toRoundNumber();
        $this->sumOrder += $this->distance * 1 + $this->time * 1000;

        if($this->discount){
            $this->increasePrice();
        }elseif ($this->extraOptionsExist){
            $this->allExtraCosts($this->time, 1);
        }

        return $this->sumOrder;
    }

    public function toRoundNumber()
    {
        if ($this->time % 1440 < 30) {
            $this->time = floor($this->time / 1440);
        }elseif ($this->time > 30){
            $this->time = 0;
        } else {
            $this->time = ceil($this->time / 1440);
        }
        return $this->time;
    }
}