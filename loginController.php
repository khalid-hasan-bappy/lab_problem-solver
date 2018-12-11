<?php
spl_autoload_register(function ($class) {
    include $class . ".php";
});
?>

<?php
@session_start();
$auth = new Auth();
if (isset($_REQUEST['registration'])) {
    $userName = $_REQUEST['userName'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $checkemail = $auth->emailcheck($email);
    if ($userName == "" or $email == "" or $password == "" or $password == "") {
        $_SESSION['error_empty'] = "<div class='alert alert-danger'><strong>Error! </strong>Field must not be empty\nClick signup option and try again...</div>";
    } elseif (strlen($userName) < 3) {
        $_SESSION['error_empty'] = "<div class='alert alert-danger'><strong>Error!</strong> Username is too short\nClick signup option and try again...</div>";
    } elseif (preg_match('/[^a-z0-9_-]+/i', $userName)) {
        $_SESSION['error_empty'] = "<div class='alert alert-danger'><strong>Error!</strong> Username must only contain alphanumeric, dash, and dott\nClick signup option and try again...</div>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_empty'] = "<div class='alert alert-danger'><strong>Error!</strong> Email address is not valid\nClick signup option and try again...</div>";
    } elseif ($checkemail == true) {
        $_SESSION['error_empty'] = "<div class='alert alert-danger'><strong>Error!</strong> Email address already exit!\nClick signup option and try again...</div>";

    } elseif (strlen($password) < 6) {
        $_SESSION['error_empty'] = "<div class='alert alert-danger'><strong>Error!</strong> password length should be getter than 5 charecter\nClick signup option and try again...</div>";

    } else {
        $auth->setUsername($userName);
        $auth->setEmail($email);
        $password= $password;
        $auth->setPassword($password);
        $result = $auth->insert();
        if ($result == true) {
            $_SESSION['error_empty'] = "<div class='alert alert-success'><strong>Thank You!</strong>You have been registered ...</div>";
        }
    }

    header('Location:login.php');
    }
?>
<?php
$auth = new Auth();
if (isset($_REQUEST['login'])) {
    $userType = $_REQUEST['userType'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $data = $auth->login($email, $password, $userType);

if (strlen($password) < 6) {
    $_SESSION['error_empty'] = "<div class='alert alert-danger'><strong>Error!</strong> password length should be getter than 5 charecter\nClick signup option and try again...</div>";
    header('Location:login.php');
}
    else if ($data['email'] != $email or $data['password'] != $password or $data['userType'] != $userType) {
        header('Location:login.php');
    } else if ($data['email'] == $email AND $data['password'] == $password AND $data['userType'] == 'student') {
        @session_start();
        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        header('Location:create.php');
    } else if ($data['email'] == $email AND $data['password'] == $password AND $data['userType'] == 'admin') {
        @session_start();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header('Location:index.php');
    } else if($data['email'] == $email AND $data['password'] == $password AND $data['userType'] == '304'){
        @session_start();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header('Location:index304.php');
    } else if($data['email'] == $email AND $data['password'] == $password AND $data['userType'] == '404'){
        @session_start();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header('Location:index404.php');
    } else if($data['email'] == $email AND $data['password'] == $password AND $data['userType'] == '405'){
        @session_start();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header('Location:index405.php');
    }
    else if($data['email'] == $email AND $data['password'] == $password AND $data['userType'] == '605'){
        @session_start();
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header('Location:index605.php');
    }
    else {
        echo "something wrong";
    }
}
?>

