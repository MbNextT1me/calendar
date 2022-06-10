<?php
include_once "Request_form.php";
$form = new Request_form(0);
if (!empty($_GET) and !empty($_POST)) {
    $data = $_GET['x'];
    $date = $_POST['date_out'];
}
else {
    $date = 0;
    $data = 0;
}
$form->coutForm($data,$date);