<?php

use \omnilight\scheduling\Schedule;

$schedule = new Schedule();

$schedule->call(function() {
  echo "task";
})->dailyAt('21:00');