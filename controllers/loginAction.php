<?php

$users = getAllUsers();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

if (checkPassword($_POST['username']) === $_POST['password']) {
    header('Location: /profile');
} else {
    header('Location: /login');
}
