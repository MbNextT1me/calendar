<?php
session_start();
require_once "Request_form.php";
$form = new Request_form(0);
$login = $_POST['login'];
$password = md5($_POST['password']);
$form->checkUser($login, $password);