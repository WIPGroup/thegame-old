<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Check info provided by components/getinfo.php');
$I->amOnPage('/components/getinfo.php?id=0');
$I->see('Money');
$I->amOnPage('/components/getinfo.php?id=1');
$I->see('Gold');
$I->amOnPage('/components/getinfo.php?id=2');
$I->see('Iron');
$I->amOnPage('/components/getinfo.php?id=3');
$I->see('Silicon');
