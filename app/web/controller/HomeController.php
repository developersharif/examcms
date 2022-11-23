<?php

namespace app\web\controller;

use system\controller\Controller;

class HomeController extends Controller
{


    public function index()
    {

        return view('frontend/homepage');
    }
    function login()
    {
        return view("frontend/login");
    }
    function check_login()
    {
        if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == 'POST' and is_csrf_valid()) {

            $email  = trim(htmlspecialchars($_POST['email']));
            $password = $_POST['password'];
            $users = DB()->student
                ->select()
                ->one()
                ->where('email =', $email)
                ->where('status =', 1)
                ->get();
            if ($users !== null) {
                $db_pass = $users->password;
                $pass_verify = password_verify($password, $db_pass);
                if ($users->status == 1 and $pass_verify) {
                    create_session("c_user", $users->id);
                    redirect(base_url());
                    exit;
                } else {
                    new_error("login", "Email or password is invalid");
                    redirect(base_url() . 'login');
                }
            } else {
                new_error("login", "Wrong info");
                redirect(base_url() . 'login');
            }
        }
    }
    function register()
    {
        return view("frontend/register");
    }
    function check_register()
    {
        dd($_POST);
    }
    function exam($id)
    {
        echo $id;
    }
    function result($id)
    {
        echo $id;
    }
    function profile()
    {
        return view('frontend/profile');
    }
    function logout()
    {
        session_destroy();
        redirect(base_url() . 'login');
    }
}