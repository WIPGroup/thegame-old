<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('ROOT login');
$I->amOnPage('/');
$I->fillField('hrac','root');
$I->fillField('heslo','root');
$I->click('Prihlásiť');
$I->see('Uživatel: root');
