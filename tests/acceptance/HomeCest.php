<?php

use yii\helpers\Url;

class HomeCest
{
    public function ensureThatHomePageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->see('Congratulations!', 'h1');
        $I->see('You have successfully created your Yii-powered application', 'p');


    }

    public function ensureThatThereAreLinks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->seeLink('About');
        $I->seeLink('Contact');
        $I->seeLink('Login');
    }

    public function ensureThatAboutLinkWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->click('About');
        $I->wait(1); // wait for page to be opened
        $I->see('This is the About page.');
    }

    public function ensureThatContactLinkWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->click('Contact');
        $I->wait(1); // wait for page to be opened
        $I->see('Contact', 'h1');
    }

    public function ensureThatLoginLinkWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->click('Login');
        $I->wait(1); // wait for page to be opened
        $I->see('Login', 'h1');

    }

    public function ensureThatGetStartedWithYiiButtonWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/index'));
        $I->click(['link' => 'Get started with Yii']);
        $I->amOnUrl('https://www.yiiframework.com/');

    }
}
