<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('tabule oznameni je na hlavni strance');
$I->amOnPage('/');
$I->see('Oznámení');
