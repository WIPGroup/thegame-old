<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Na Hlavni strance je TheGame');
$I->amOnPage('/');
$I->see('TheGame');
