<?php

namespace app\web\controller;

class AdminController
{
	function index()
	{
		return view("admin/home/index");
	}
	function login()
	{
		if (auth() != false) {
			redirect(admin_url());
		}
		return view("admin/home/login");
	}
	function check_login()
	{

		if (auth() != false) {
			redirect(admin_url());
		}
		if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == 'POST' and is_csrf_valid()) {
			$email = $email = trim(htmlspecialchars($_POST['email']));
			$password = $_POST['password'];
			$users = DB()->users
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
					redirect(admin_url());
				} else {
					new_error("login", "Email or password is invalid");
					redirect(admin_url("/login"));
				}
			} else {
				new_error("login", "Wrong info");
				redirect(admin_url("/login"));
			}
		}
	}
	function logout()
	{
		return view("admin/home/logout");
	}
	function teachers()
	{
		$teachers = DB()->users
			->select()
			->where('role =', 'teacher')
			->orderBy('id DESC')
			->get();
		return view("admin/teacher/list", ['teachers' => $teachers]);
	}
	function add_teacher()
	{
		if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == 'POST' and is_csrf_valid()) {
			$name = trim(htmlspecialchars($_POST['name']));
			$email = trim(htmlspecialchars($_POST['email']));
			$password = $_POST['password'];
			$hash_pass = password_hash($password, PASSWORD_DEFAULT);
			$users = DB()->users
				->select()
				->one()
				->where('email =', $email)
				->get();
			if ($users !== null) {
				new_error("add_teacher", "Email already exists");
				redirect(admin_url("/teacher/add"));
			} else {
				$add = DB()->users
					->insert([
						'name' => $name,
						'email' => $email,
						'password' => $hash_pass,
						'role' => 'teacher',
						'status' => 1,
						'created_at' => date('Y-m-d H:i:s')
					])
					->run();
				if ($add) {
					new_alert("add_teacher", "Teacher added successfully");
					redirect(admin_url("/teacher/add"));
				} else {
					new_error("add_teacher", "Something went wrong");
					redirect(admin_url("/teacher/add"));
				}
			}
		}
		return view("admin/teacher/add");
	}
	function subjects()
	{
		return view("admin/subject/list");
	}
	function add_subject()
	{
		return view("admin/subject/add");
	}
	function students()
	{
		return view("admin/student/list");
	}
	function add_student()
	{
		return view("admin/student/add");
	}
	function exams()
	{
		return view("admin/exam/list");
	}
	function add_exam()
	{
		return view("admin/exam/add");
	}
}