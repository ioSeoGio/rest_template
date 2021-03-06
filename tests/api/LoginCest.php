<?php

class LoginCest
{
    public function _before(ApiTester $I)
    {
        $I->haveFixtures([
            'users' => [
                'class' => \tests\fixtures\UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'users.php'
            ]
        ]);
    }

    public function testSuccessLogin(ApiTester $I)
    {
        $I->sendPostAsJson('/site/login', [
            'username' => 'admin',
            'password' => '12345678',
        ]);       
        
        $I->seeResponseIsJson();
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseContainsJson([
            'data' => [
              'access_token' => 'K1t9ek5Y5llzWcqee7G5lL2j9SR1Vj6r_1644828238',
            ],
            'rbac' => [
                'roles' => [],
                'permissions' => [],
                'rules' => [],
            ],
            'messages' => [],
        ]);
    }

    public function testFailedLogin(ApiTester $I)
    {
        $I->sendPostAsJson('/site/login', [
            'username' => 'admin',
            'password' => 'not-correct-password',
        ]);

        $I->seeResponseIsJson();
        $I->seeResponseCodeIsClientError();
    }
}
