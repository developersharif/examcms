<?php

namespace app\web\controller;

use system\controller\Controller;

class HomeController extends Controller
{


    public function index()
    {

        $exams = DB()->exam
            ->select()
            ->where('department =', student()->department)
            ->where('semester =', student()->semester)
            ->where('session =', student()->session)
            ->where('section =', student()->section)
            ->where('status =', 1)
            ->orderBy('id DESC')
            ->get();
        return view('frontend/homepage', ['exams' => $exams]);
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
        $exam = DB()->exam
            ->select()
            ->one()
            ->where('id =', $id)
            ->where('status =', 1)
            ->get();
        if (isset($_POST['submit'])) {
            $answers = function () {
                $req = $_POST;
                $data = [];
                for ($i = 0; $i < count($req['answer']); $i++) {
                    array_push($data, ['answers' => $req['answer'][$i], 'marks' => $req['marks'][$i]]);
                }
                return $data;
            };
            $data = [
                'student_id' => student()->id,
                'teacher_id' => $exam->teacher_id,
                'question_id' => $id,
                'answers' => json_encode($answers()),
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $insert = DB()->attend
                ->insert($data)
                ->run();
            if ($insert) {
                new_alert("exam", "Your Answers submitted successfully");
                redirect(base_url() . 'exam/' . $id);
            } else {
                new_error("exam", "Something went wrong");
                redirect(base_url() . 'exam/' . $id);
            }
        }
        return view("frontend/exam/exam", ['exam' => $exam]);
    }

    function result($id)
    {
        return view("frontend/result");
    }
    function results()
    {
        $resutls = DB()->result->select()->where('student_id =', student()->id)->orderBy('id DESC')->get();
        return view("frontend/results", ['results' => $resutls]);
    }
    function profile()
    {
        $profile = DB()->student->select()->where('id =', student()->id)->one()->get();
        return view('frontend/profile', ['profile' => $profile]);
    }
    function logout()
    {
        session_destroy();
        redirect(base_url() . 'login');
    }
}