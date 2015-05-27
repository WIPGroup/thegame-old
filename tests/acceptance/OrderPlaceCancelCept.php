<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Place and cancel an order');
$I->amGoingTo('Login');
$I->amOnPage('/');
$I->fillField('hrac','root');
$I->fillField('heslo','root');
$I->click('Prihlásiť');
$I->click('Trh');
$I->amGoingTo('Place an order for 1 Gold in exchange for 1 Money');
$I->selectOption('nabizi', 'Money');
$I->fillField('mnoznabizi','2');
$I->selectOption('chce', 'Gold');
$I->fillField('mnozchce','3');
$I->click('Odoslať');
$I->amGoingTo('Switch to Moje nabídky tab');
$I->click('Moje nabídky');
//TODO see the order
$I->amGoingTo('Cancel the order');
//TODO cancel the order
