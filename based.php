<?php

namespace based;


use common\iRate;
use extra\extraOptions;

class Based implements iRate
{
    use extraOptions;
    protected $distance;
    protected $time;
    protected $ageUser;
    protected $check = false;
    protected $sumOrder = 0;
    protected $discount = false;
    protected $extraOptionsExist;

    public function __construct($distance, $time, $ageUser, $extraOptionsExist)
    {
        $this->distance = $distance;
        $this->time = $time;
        $this->ageUser = $ageUser;
        $this->extraOptionsExist = $extraOptionsExist;
    }

    public function calcPrice()
    {
        if (!$this->check) {
            $this->checkAge();
        }

        $this->sumOrder += $this->distance * 10 + $this->time * 3;

        if ($this->discount) {
            $this->increasePrice();
        } elseif ($this->extraOptionsExist) {
            $this->allExtraCosts($this->time, 1);
        }

        return $this->sumOrder;
    }

    public function toRoundNumber()
    {
        $this->time = ceil($this->time);
        return $this->time;
    }

    public function checkAge()
    {
        if ($this->ageUser < 18 || $this->ageUser > 64) {
            $this->check = false;
            echo $this->ageUser = "Вы попадаете под возрастные ограничения. Отказано в обслуживание. Вам " . $this->ageUser . PHP_EOL . " лет.";
            die;
        } elseif ($this->ageUser > 17 && $this->ageUser < 22) {
            echo "от 18 до 22 " . $this->ageUser . PHP_EOL;
            $this->discount = true;
            die;
        }
    }

    public function increasePrice()
    {
        return $this->sumOrder += $this->sumOrder * 0.1; //TODO Скидка должна делить
    }


    public function allExtraCosts($GpsOptions = 0, $DriverOptions = 0)
    {
        $this->sumOrder += $this->driver(1);
        $this->sumOrder += $this->gps($GpsOptions);

    }
}