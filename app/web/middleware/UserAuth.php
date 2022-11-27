<?php

namespace app\web\middleware;

class UserAuth
{
    function handle()
    {
        if (is_student() == false) {
            new_error("login", "You must login first");
            redirect(base_url() . 'login');
        }
    }
}