<?php

use yii\helpers\Url;

class ContactCest
{
    public function _before(\AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/contact'));
    }
    
    public function contactPageWorks(AcceptanceTester $I)
    {
        $I->wantTo('ensure that contact page works');
        $I->see('Contact', 'h1');
        $I->see('If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.', 'p');
    }

    public function contactFormCanBeSubmitted(AcceptanceTester $I)
    {
        $I->amGoingTo('submit contact form with correct data');
        $I->fillField('#contactform-name', 'tester');
        $I->fillField('#contactform-email', 'tester@example.com');
        $I->fillField('#contactform-subject', 'test subject');
        $I->fillField('#contactform-body', 'test content');
        $I->fillField('#contactform-verifycode', 'testme');

        $I->click('contact-button');
        
        $I->wait(2); // wait for button to be clicked

        $I->dontSeeElement('#contact-form');
        $I->see('Thank you for contacting us. We will respond to you as soon as possible.');
        $I->see('Note that if you turn on the Yii debugger, you should be able to view the mail message on the mail panel of the debugger.', 'p');
    }
}
