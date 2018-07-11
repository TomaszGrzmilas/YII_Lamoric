<?php

use \omnilight\scheduling\Schedule;


$schedule = new Schedule();

$schedule->exec('ls')->everyFiveMinutes();

// This command will call callback function every day at 10:00
$schedule->call(function(\yii\console\Application $app) {
  echo "task";
})->dailyAt('21:00');