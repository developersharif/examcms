<?php

namespace app\web\controller;

class AdminController
{
	function index()
	{
		$students = DB()->student->select()->get()->count();
		$teacher = DB()->users->select()->where('role =', 'teacher')->get()->count();
		$exams = DB()->exam->select()->get()->count();
		$couner = [
			'student' => $students,
			'teacher' => $teacher,
			'exams' => $exams
		];
		return view("admin/home/index", ['counter' => $couner]);
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

	function students()
	{
		$students = DB()->student
			->select()
			->orderBy('id DESC')
			->get();
		return view("admin/student/list", ['students' => $students]);
	}
	function add_student()
	{
		if (isset($_POST['submit']) and $_SERVER['REQUEST_METHOD'] == 'POST' and is_csrf_valid()) {
			$name = trim(htmlspecialchars($_POST['name']));
			$email = trim(htmlspecialchars($_POST['email']));
			$password = $_POST['password'];
			$department = strtolower(trim(htmlspecialchars($_POST['department'])));
			$session = strtolower(trim(htmlspecialchars($_POST['session'])));
			$semester = strtolower(trim(htmlspecialchars($_POST['semester'])));
			$section = strtolower(trim(htmlspecialchars($_POST['section'])));
			$roll = trim(htmlspecialchars($_POST['roll']));
			$hash_pass = password_hash($password, PASSWORD_DEFAULT);
			$users = DB()->student
				->select()
				->one()
				->where('email =', $email)
				->get();
			if ($users !== null) {
				new_error("add_student", "Email already exists");
				redirect(admin_url("/student/add"));
			} else {
				$add = DB()->student
					->insert([
						'name' => $name,
						'email' => $email,
						'password' => $hash_pass,
						'department' => $department,
						'session' => $session,
						'semester' => $semester,
						'section' => $section,
						'roll' => $roll,
						'status' => 1,
						'created_at' => date('Y-m-d H:i:s')
					])
					->run();
				if ($add) {
					new_alert("add_student", "Student added successfully");
					redirect(admin_url("/student/add"));
				} else {
					new_error("add_student", "Something went wrong");
					redirect(admin_url("/student/add"));
				}
			}
		}

		return view("admin/student/add");
	}
	function exams()
	{
		$exams = DB()->exam
			->select()
			->where('teacher_id =', user()->id)
			->orderBy('id DESC')
			->get();
		return view("admin/exam/list", ['exams' => $exams]);
	}
	function add_exam()
	{

		if (isset($_POST['submit'])) {
			$name = trim(htmlspecialchars($_POST['name']));
			$department = strtolower(trim(htmlspecialchars($_POST['department'])));
			$section = strtolower(trim(htmlspecialchars($_POST['section'])));
			$semester = trim(htmlspecialchars($_POST['semester']));
			$session = trim(htmlspecialchars($_POST['session']));
			$subject = trim(htmlspecialchars($_POST['subject']));
			$total_marks = trim(htmlspecialchars($_POST['total_marks']));
			$start = trim(htmlspecialchars($_POST['date_start']));
			$end = trim(htmlspecialchars($_POST['date_end']));

			$data = function () {
				$req = $_POST;
				$data = [];
				for ($i = 0; $i < count($req['questions']); $i++) {
					array_push($data, ['question' => $req['questions'][$i], 'marks' => $req['marks'][$i]]);
				}
				return $data;
			};
			$questions = ['questions' => $data()];
			$questions = json_encode($questions);
			$add = DB()->exam
				->insert([
					'name' => $name,
					'department' => $department,
					'section' => $section,
					'semester' => $semester,
					'session' => $session,
					'subject' => $subject,
					'total_mark' => $total_marks,
					'questions' => $questions,
					'start' => $start,
					'end' => $end,
					'teacher_id' => user()->id,
					'created_at' => date('Y-m-d H:i:s')
				])
				->run();
			if ($add) {
				new_alert("add_exam", "Exam created successfully");
				redirect(admin_url("/exam/add"));
			} else {
				new_error("add_exam", "Something went wrong");
				redirect(admin_url("/exam/add"));
			}
		}
		return view("admin/exam/add");
	}
	function check_exam($id)
	{

		$answer = DB()->attend->select()->one()->where('id =', $id)->get();
		if ($answer->status !== 1) {
			$update = DB()->attend->update(['status' => 1])->where('id =', $id);
			$update();
		}

		if (isset($_POST['submit'])) {
			$teacher_marks = $_POST['marks'];
			$student_marks = json_encode($teacher_marks);

			$insert = DB()->result->insert([
				'question_id' => $answer->question_id,
				'student_id' => $answer->student_id,
				'teacher_marks' => $student_marks,
				'teacher_id' => $answer->teacher_id,
				'created_at' => date('Y-m-d H:i:s')
			])->run();
			if ($insert) {
				new_alert("check_exam", "Marks added successfully");
				redirect(admin_url("/check/$id"));
			}
		}
		return view("admin/exam/check", ['answer' => $answer]);
	}
	function exam_attend()
	{
		$attends = DB()->attend->select()->where('teacher_id =', user()->id)->orderBy('id DESC')->get();
		return view("admin/exam/attend", ['attends' => $attends]);
	}
	function exam_results()
	{
		$results = DB()->result->select()->where('teacher_id =', user()->id)->orderBy('id DESC')->get();
		return view("admin/exam/results", ['results' => $results]);
	}
}