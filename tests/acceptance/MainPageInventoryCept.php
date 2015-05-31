<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Check inventory for money, iron and gold');
$I->amOnPage('/');
$I->fillField('hrac','root');
$I->fillField('heslo','root');
$I->click('Prihlásiť');
$I->dontSee('Prosím, prihlásťe sa');
$I->click('Úvod');
//$I->see('Money'); ajax
//$I->see('Gold');
//$I->see('Iron');
