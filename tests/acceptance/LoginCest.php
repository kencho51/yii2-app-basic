<?php

use yii\helpers\Url;

class LoginCest
{
    public function ensureThatLoginAsAdminWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', 'admin');
        $I->fillField('input[name="LoginForm[password]"]', 'admin');
        $I->click('login-button');
        $I->wait(1); // wait for button to be clicked

        $I->expectTo('see user info');
        $I->see('Logout');
    }

    public function ensureThatLoginAsDemoWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/login'));
        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', 'demo');
        $I->fillField('input[name="LoginForm[password]"]', 'demo');
        $I->click('login-button');
        $I->wait(1); // wait for button to be clicked
        $I->expectTo('see user info');
        $I->see('Logout');

    }
}
