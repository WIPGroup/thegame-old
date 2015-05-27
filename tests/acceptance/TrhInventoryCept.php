<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Login');
$I->amOnPage('/');
$I->fillField('hrac','root');
$I->fillField('heslo','root');
$I->click('Prihlásiť');
$I->wantTo('Check inventory for money, iron and gold');
$I->click('Trh');
$I->see('Money');
$I->see('Gold');
$I->see('Iron');
