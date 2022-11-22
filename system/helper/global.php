<?php
/* --------------------------------Predifined constants-------------------------------- */
define('APP_ROOT', __DIR__ . '/../../');
define('VIEWS_PATH', APP_ROOT . 'resources/views/');
define('DATABASE_PATH', APP_ROOT . '/database/');
/* --------------------------------Global Helper Functions-------------------------------- */
function config($target = 'app', $key = 'null')
{
    $data = require APP_ROOT . "config/{$target}.php";
    if (isset($data[$key])) {
        return $data[$key];
    } else {
        throw new Exception("Key:($key) Not Found", 1);
    }
}
//Database Helper 
function DB()
{
    return (new \system\database\Database())->connection;
}
function SQL()
{
    return (new \system\database\Database())->sql;
}
//View Helper
function out($text)
{
    echo htmlspecialchars($text);
}
function set_csrf()
{
    if (!isset($_SESSION["csrf"])) {
        $_SESSION["csrf"] = bin2hex(random_bytes(50));
    }
    echo '<input type="hidden" name="csrf" value="' . $_SESSION["csrf"] . '">';
}
function is_csrf_valid()
{
    if (!isset($_SESSION['csrf']) || !isset($_POST['csrf'])) {
        return false;
    }
    if ($_SESSION['csrf'] != $_POST['csrf']) {
        return false;
    }
    return true;
}
function view($view, $data = [])
{
    $file = str_replace('.', '/', $view);
    $file = VIEWS_PATH . $file . '.php';
    if (file_exists($file)) {
        extract($data);
        include $file;
    } else {
        throw new Exception("{$view} View Not Found", 1);
    }
}
function __admin_header__()
{
    return view("admin/common/header");
}
function __admin_footer__()
{
    return view("admin/common/footer");
}
function asset($location)
{
    $url = (substr($_ENV['APP_URL'], -1) == '/') ? $_ENV['APP_URL'] : $_ENV['APP_URL'] . '/';
    echo $url . 'asset/' . $location;
}

function env($key, $value = null)
{
    $_ENV[$key] = (isset($_ENV[$key])) ? $_ENV[$key] : null;
    if ($value !== null) {
        return $_ENV[$key] = $value;
    } else {
        return $_ENV[$key];
    }
}
function url($link)
{
    $url = (substr($_ENV['APP_URL'], -1) == '/') ? $_ENV['APP_URL'] : $_ENV['APP_URL'] . '/';
    echo $url . $link;
}
function is_assoc(array $arr)
{
    if (array() === $arr) return false;
    return array_keys($arr) !== range(0, count($arr) - 1);
}
function dd($x)
{
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    die;
}
//redirect 
function redirect($link)
{
    header("Location: $link");
    exit;
}
function userinfo(int $id)
{
    $users = DB()->users
        ->select()
        ->one()
        ->where('id =', $id)
        ->get();
    if ($users != null) {
        return $users;
    } else {
        return false;
    }
}
function user()
{
    if (isset($_SESSION['c_user'])) {
        $id = $_SESSION['c_user'];
        $users = DB()->users
            ->select()
            ->one()
            ->where('id =', $id)
            ->get();
        if ($users != null) {
            return $users;
        } else {
            return false;
        }
    }
}
function auth()
{
    if (isset($_SESSION['c_user'])) {
        $id = $_SESSION['c_user'];
        $user = userinfo($id);
        if ($user != null) {
            return true;
        } else {
            false;
        }
    }
}
//error handler
function new_error($key, $error_messages)
{
    $_SESSION['error'][$key] = $error_messages;
}
function show_error($key)
{
    if (isset($_SESSION['error'][$key])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>' . ucwords($key) . '!</strong> ' . $_SESSION['error'][$key] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
        unset($_SESSION['error']);
    } else {
        return false;
    }
}
function on_error($key)
{
    if (isset($_SESSION['error'][$key])) {
        echo  $_SESSION['error'][$key];
        unset($_SESSION['error']);
    } else {
        return false;
    }
}
function have_error($key)
{
    if (isset($_SESSION['error'][$key])) {
        return true;
    } else {
        return false;
    }
}

function error($key)
{
    if (have_error($key)) {
        show_error($key);
    } else {
        return null;
    }
}
function admin_url($path = null)
{
    $url = (substr($_ENV['APP_URL'], -1) == '/') ? $_ENV['APP_URL'] : $_ENV['APP_URL'] . '/';
    return $url . 'admin' . $path;
}
//alert
function new_alert($key, $error_messages)
{
    $_SESSION['alert'][$key] = $error_messages;
}

function show_alert($key, $status = 'success')
{
    if (isset($_SESSION['alert'][$key])) {
        if ($status == 'success') {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>' . ucwords($key) . '!</strong> ' . $_SESSION['alert'][$key] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            unset($_SESSION['alert']);
        } else {
            echo '<div class="alert alert-' . $status . ' alert-dismissible fade show" role="alert">
            <strong>' . ucwords($key) . '!</strong> ' . $_SESSION['alert'][$key] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            unset($_SESSION['alert']);
        }
    } else {
        return false;
    }
}
function on_alert($key)
{
    if (isset($_SESSION['alert'][$key])) {

        echo  $_SESSION['alert'][$key];
        unset($_SESSION['alert']);
    } else {
        return false;
    }
}
function have_alert($key)
{
    if (isset($_SESSION['alert'][$key])) {
        return true;
    } else {
        return false;
    }
}

function alert($key)
{
    if (have_alert($key)) {
        show_alert($key);
    } else {
        return null;
    }
}
//notify  
function notify($key)
{

    error($key);
    if (have_alert($key)) {
        show_alert($key);
    }
}
//create session  
function create_session(string $name, $value)
{
    try {
        $_SESSION[$name] = $value;
        return true;
    } catch (\Throwable $th) {
        throw new Exception("session error...");
    }
}

//update session  
function update_session(string $name, $value)
{
    try {
        $_SESSION[$name] = $value;
        return true;
    } catch (\Throwable $th) {
        throw new Exception("session error...");
    }
}

function remove_session($key)
{
    unset($_SESSION[$key]);
}

//remove all sessions veriables
function remove_sessions()
{
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();

    return true;
}
//get session data
function get_session($key)
{
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } else {
        return false;
    }
}