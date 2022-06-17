<?php

namespace App\Middleware;

class RedirectIfNotAuthMiddleware
{
    /**
     * middleware to redirect to login if not authenticated
     */
    public static function handle(): void
    {
        if(!isset($_SESSION['LoginData']['username']) && $_SERVER['REQUEST_URI'] !== '/login'){
            header("location:login");
            exit;
        }
    }
}
