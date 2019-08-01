<?php


namespace common;


interface iRate
{
    public function calcPrice();

    public function toRoundNumber();

    public function checkAge();

    public function increasePrice();

}