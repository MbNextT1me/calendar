<?php
session_start();
include_once "IP_Stat.php";

$visitor_ip = $_SERVER['REMOTE_ADDR'];
$date = date("Y-m-d");

$IP =  new IP_Stat($visitor_ip, $date);
$IP->CountIPs();
