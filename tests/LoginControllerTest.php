<?php

namespace Tests;

use App\Controllers\LoginController;
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * test login method
     * @throws \JsonException
     */
    public function testLogin(): void
    {
        //Given
        $loginInstance = new LoginController();
        //When
        $_POST['username'] = 'admin';
        $_POST['password'] = 'admin';
        $loginInstance->login();
        //Then
        self::assertJson(['data' => array('status' => 'success' ,'msg' => '' ,'url' => '/')]);
    }
}

