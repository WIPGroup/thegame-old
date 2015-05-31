<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Craft a RAM');
$I->amGoingTo('Login');
$I->amOnPage('/');
$I->fillField('hrac','root');
$I->fillField('heslo','root');
$I->click('Prihlásiť');
$I->amGoingTo('Place crafting order');
$I->click('Výroba');
$I->click('Vyrobit');
//$I->see('RAM hotovo'); TODO ajax
