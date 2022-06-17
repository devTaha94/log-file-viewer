<?php

namespace App\Controllers;

class LoginController
{
    /**
     * display login page view
     */
    public function index(): void
    {
        require_once APP_ROOT . '/views/login.php';
    }

    /**
     * submit login form
     * @throws \JsonException
     */
   public function login() :\JsonException
   {
           $credentials  = array('admin' => 'admin');
           $username     = $_POST['username'] ?? '';
           $password     = $_POST['password'] ?? '';
           if (isset($credentials[$username]) && $credentials[$username] === $password){
               $_SESSION['LoginData']['username']= $credentials[$username];
               echo json_encode(array('status' => 'success', 'msg' => '', 'url' => '/'), JSON_THROW_ON_ERROR );
               exit;
           }

       echo json_encode(array('status' => 'failed', 'msg' => 'Invalid Login Details'), JSON_THROW_ON_ERROR);
       exit();
   }
}
