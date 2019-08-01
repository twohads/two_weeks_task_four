<?php


namespace student;


use based\Based;

class Student extends Based
{
    public function calcPrice()
    {
        if (!$this->check) {
            $this->checkAge();
        }

        $this->sumOrder += $this->distance * 1 + $this->time * 1;

        if ($this->discount) {
            $this->increasePrice();
        } elseif ($this->extraOptionsExist) {
            $this->allExtraCosts($this->time, 1);
        }

        return $this->sumOrder;
    }

    public function checkAge()
    {
        if ($this->ageUser < 18 || $this->ageUser > 25) {
            $this->check = false;
            echo $this->ageUser = "Вы попадаете под возрастные ограничения. Отказано в обслуживание. Вам " . $this->ageUser . PHP_EOL . " лет.";
            die;
        } elseif ($this->ageUser > 17 && $this->ageUser < 22) {
            echo "от 18 до 22 " . $this->ageUser . PHP_EOL;
            $this->discount = true;
            die;
        }
    }
}