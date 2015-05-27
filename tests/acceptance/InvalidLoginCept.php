<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Try an invalid login');
$I->amOnPage('/');
$I->fillField('hrac','root');
$I->fillField('heslo','random');
$I->click('Prihlásiť');
$I->see('Nesprávne meno alebo heslo!');
