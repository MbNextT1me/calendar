<?php
include_once "IP_Stat.php";
include_once "online_users.php";
$date = date("Y-m-d");
$IP =  new IP_Stat(0,$date);
$row = $IP->getInfo();
$online = getOnlineUsers();
echo "<li class='stat__item'>Уникальных по IP: <b>{$row['hosts']}</b></li>";
echo "<li class='stat__item'>Пользователей по сессиям(активные): <b>{$online}</b></li></li>";
echo "<li class='stat__item'>Загрузок страницы(хитов): <b>{$row['views']}</b></li></li>";