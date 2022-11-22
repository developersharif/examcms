<?php

namespace app\web\middleware;

class Auth
{
    function handle()
    {
        if (auth() == false) {
            new_error("login", "You must login first");
            redirect(admin_url("/login"));
        }
    }
}