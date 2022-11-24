<?php

namespace app\web\middleware;

class UserAuth
{
    function handle()
    {
        if (auth() == false) {
            new_error("login", "You must login first");
            redirect(base_url() . 'login');
        }
    }
}