<?php
require_once "extra.php";
require_once "iRate.php";
require_once "based.php";
require_once "hour.php";
require_once "daily.php";
require_once "student.php";

$hour = new \hour\HourRate(12, 67, 22, true);
echo $hour->calcPrice();
echo "<br>";
$based = new \based\Based(12, 67, 22, true);
echo $based->calcPrice();
echo "<br>";
$daily = new \daily\DailyRate(12, 4349, 22, true);
echo $daily->calcPrice();
echo "<br>";
$student = new \student\Student(36, 1300, 26, false);
echo $student->calcPrice();
