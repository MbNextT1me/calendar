<?php
include "Request_form.php";

$data = array();

if (!empty($_GET)) {
    $data = $_GET;
}

$form = new Request_form(0);

$form->update($data,$_POST);

header('Location: ../../index.php');