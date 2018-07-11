<?php

use \omnilight\scheduling\Schedule;
use app\models\balance_account\BalanceAccount;

$schedule = new Schedule();

$schedule->call(function() {
    $account = new BalanceAccount();
    $account->balance = 100;
    $account->save();
})->dailyAt('21:10');