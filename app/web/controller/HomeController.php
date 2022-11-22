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
        dd($_POST);
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
}