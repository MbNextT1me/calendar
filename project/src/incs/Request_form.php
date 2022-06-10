<?php

include_once "dbh.php";

class Request_form extends dbh
{
    public static $types = [
        1 => 'Встреча',
        2 => 'Звонок',
        3 => 'Совещание',
        4 => 'Дело'
    ];

    public static $durations = [
        1 => '30 минут',
        2 => '1 час',
        3 => '2 часа',
        4 => '6 часов',
        5 => 'Более'
    ];

    public $deleted = 0;
    public $topic = '';
    public $type = '';
    public $place = '';
    public $duration ='';
    public $datetime;
    public $comment = '';
    public $ipaddr = '';
    public $complete = 0;

    public $data= array();

    public function __construct($data){
        if(is_array($data)) {
            $this->topic = $data['topic'];
            $this->type = array_search($data['type'], self::$types);
            $this->place = $data['place'];
            $this->datetime = $data['date'] . ' ' . $data['time'];
            $this->duration = array_search($data['duration'], self::$durations);
            $this->comment = $data['comment'];
            $this->deleted = 0;
            # $this->ipaddr = $_SERVER['REMOTE_ADDR'];
        }
        else if (is_int($data) and $data == 0){
            return;
        }
    }

   public function save(){
        array_push($this->data, $this->type, $this->topic,$this->place,$this->datetime,$this->duration,$this->comment, $this->deleted, $this->complete);
        $this->saveAllInfo($this->data);
   }

    public function coutForm($x, $date){
        $a = date('d.m.Y H:i:s');
        $datas = $this->getAllInfo();
        if ($datas != null) {
            foreach ($datas as $data) {
                $counter = 1;
                $buff = $data['datetime'];
                $buff = explode(" ", "$buff");
                if ($data["deleted"] == 0) {
                    if ($x == 4 and strtotime($buff[0]) == strtotime($date)) {
                        echo "<tr>";
                        $id = $data['id'];
                        $sliced = array_slice($data, 1);
                        foreach ($sliced as $key => $row) {
                            if ($counter < 5) {
                                if ($key == "type") $row = self::$types[$row];
                                if ($key == "duration") $row = self::$durations[$row];
                                if ($key == "topic") {
                                    echo '<td><a href="./src/incs/php/task.php?id=' . $id . '&type=' . self::$types[$sliced['type']] . '&topic=' . $sliced['topic'] .
                                        '&datetime=' . $sliced['datetime'] . '&duration=' . $sliced['duration'] . '&place=' . $sliced['place'] .
                                        '&comment=' . $sliced['comment'] .
                                        '">' . $row . "</a></td>";
                                } else if ($counter == 4) {
                                    echo "<td class='special_th'>" . $row . "</td>";
                                } else {
                                    echo "<td>" . $row . "</td>";
                                }
                                $counter++;
                            }
                        }
                        echo "</tr>";
                    }
                    else if ($x == 2 and $data['complete'] == 1) {
                        echo "<tr>";
                        $id = $data['id'];
                        $sliced = array_slice($data, 1);
                        foreach ($sliced as $key => $row) {
                            if ($counter < 5) {
                                if ($key == "type") $row = self::$types[$row];
                                if ($key == "duration") $row = self::$durations[$row];
                                if ($key == "topic") {
                                    echo '<td><a href="./src/incs/php/task.php?id=' . $id . '&type=' . self::$types[$sliced['type']] . '&topic=' . $sliced['topic'] .
                                        '&datetime=' . $sliced['datetime'] . '&duration=' . $sliced['duration'] . '&place=' . $sliced['place'] .
                                        '&comment=' . $sliced['comment'] .
                                        '">' . $row . "</a></td>";
                                } else if ($counter == 4) {
                                    echo "<td class='special_th'>" . $row . "</td>";
                                } else {
                                    echo "<td>" . $row . "</td>";
                                }
                                $counter++;
                            }
                        }
                        echo "</tr>";
                    }
                    else if ($x == 1 and (strtotime($data['datetime'])<strtotime($a))and $data['complete'] == 0){
                        echo "<tr>";
                        $id = $data['id'];
                        $sliced = array_slice($data, 1);
                        foreach ($sliced as $key => $row) {
                            if ($counter < 5) {
                                if ($key == "type") $row = self::$types[$row];
                                if ($key == "duration") $row = self::$durations[$row];
                                if ($key == "topic") {
                                    echo '<td><a href="./src/incs/php/task.php?id=' . $id . '&type=' . self::$types[$sliced['type']] . '&topic=' . $sliced['topic'] .
                                        '&datetime=' . $sliced['datetime'] . '&duration=' . self::$durations[$sliced['duration']] . '&place=' . $sliced['place'] .
                                        '&comment=' . $sliced['comment'] .
                                        '">' . $row . "</a></td>";
                                } else if ($counter == 4) {
                                    echo "<td class='special_th'>" . $row . "</td>";
                                } else {
                                    echo "<td>" . $row . "</td>";
                                }
                                $counter++;
                            }
                        }
                        echo "</tr>";
                    }
                    else if ($x == 0 and (strtotime($data['datetime'])>strtotime($a) or $data['duration'] == "5") and $data['complete'] == 0){
                        echo "<tr>";
                        $id = $data['id'];
                        $sliced = array_slice($data, 1);
                        foreach ($sliced as $key => $row) {
                            if ($counter < 5) {
                                if ($key == "type") $row = self::$types[$row];
                                if ($key == "duration") $row = self::$durations[$row];
                                if ($key == "topic") {
                                    echo '<td><a href="./src/incs/php/task.php?id=' . $id . '&type=' . self::$types[$sliced['type']] . '&topic=' . $sliced['topic'] .
                                        '&datetime=' . $sliced['datetime'] . '&duration=' . self::$durations[$sliced['duration']] . '&place=' . $sliced['place'] .
                                        '&comment=' . $sliced['comment'] .
                                        '">' . $row . "</a></td>";
                                } else if ($counter == 4) {
                                    echo "<td class='special_th'>" . $row . "</td>";
                                } else {
                                    echo "<td>" . $row . "</td>";
                                }
                                $counter++;
                            }
                        }
                        echo "</tr>";
                    }
                }
            }
        }
    }

    public function dellRow($data) {
        foreach ($data  as $k => $v) {
            $this->delRow($v);
        }
    }


    public function complete($data) {
        $conn = $this->connect();
        $id = $data['id'];
        $conn->query("UPDATE form SET `complete`=1 WHERE id = {$id};");
    }

    public function update($data, $info) {
        $conn = $this->connect();
        $id = $data['id'];
        $type =array_search($info['type'], self::$types);;
        $dur = array_search($info['duration'], self::$durations);
        $top = $info['topic'];
        $place = $info['place'];
        $comm = $info['comment'];
        $datetime = $info['date'] . ' ' .$info['time'];

        $conn->query("UPDATE form SET `type`= '$type', `topic` = '$top', `place` = '$place',
                `datetime` = '$datetime', `duration` = '$dur', `comment` = '$comm' WHERE id = {$id};");
    }

    public function checkUser($login, $password) {
        $conn = $this->connect();
        $check_user = $conn->query("SELECT * FROM `users` WHERE `login`='$login' AND `password` = '$password'");
        if ($check_user->num_rows > 0) {
            $user = mysqli_fetch_assoc($check_user);
            $_SESSION['admin'] = [
                "id" => $user['id'],
                "nickname" => $user['login']
            ];
            $_SESSION['LAST_ACTIVITY'] = time();
            header('Location: ../php/admin.php');
        }
        else {
            $_SESSION['message'] = 'Неверный логин или пароль!';
            header('Location: ../php/login.php');
        }
    }
}