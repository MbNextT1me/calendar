<?php
include "Request_form.php";

$data = array();

if (!empty($_GET)) {
    $data = $_GET;
}

$form = new Request_form(0);

$form->dellRow($data);

header('Location: ../../index.php');