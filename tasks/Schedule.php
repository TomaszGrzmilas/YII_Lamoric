<?php

use \omnilight\scheduling\Schedule;
use app\models\balance_account\BalanceAccount;

$schedule = new Schedule();

$schedule->call(function() {
    $account = new BalanceAccount();
    $account->balance = 100;
    if ($account->save())
    {

    } else {
        throw new UserException(Yii::t('app','Error when creating user account. Try again.'));
    }

})->dailyAt('21:10');