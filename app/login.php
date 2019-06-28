<?php
include 'db.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM users WHERE `username` = '$username' AND `password` = '$password' LIMIT 1";

$users = mysqli_query($conn, $query);

if (mysqli_num_rows($users) > 0) {
    //user valid

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $_SESSION['admin'] = $username;

    echo "
        <script type='text/javascript'>
            alert('Successfully logged in!');

            window.location.href = '/dashboard.php';
        </script>
    ";
} else {
    echo "
        <script type='text/javascript'>
            alert('$username dan $password');
            alert('You have entered an invalid username or password');

            window.location.href = '../index.php?page=login';
        </script>
    ";
}

mysqli_close($conn);