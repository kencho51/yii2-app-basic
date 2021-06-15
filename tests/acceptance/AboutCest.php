<?php

use yii\helpers\Url;

class AboutCest
{
    public function ensureThatAboutPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/about'));
        $I->see('About', 'h1');
        $I->see('This is the About page. You may modify the following file to customize its ABC:', 'p');
    }
}
