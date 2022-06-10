<?php

include_once(__DIR__ . "/../dbh.php");

class IP_Stat extends dbh
{

    public $ip;
    public $date;

    public function __construct($ip, $date){
        $this->ip = $ip;
        $this->date = $date;
    }

    public function CountIPs()
    {

        $sql = "SELECT `visit_id` FROM `visits` WHERE `date`='$this->date'";
        $conn = $this->connect();
        $res = $conn->query($sql);
        if ($this->ip != 0){
            if ($res->num_rows == 0){
                $conn->query("DELETE FROM `ips`");
                $conn->query("INSERT INTO `ips` SET `ip_address`='$this->ip'");
                $conn->query("INSERT INTO `visits` SET `date`='$this->date', `hosts`=1, `views`=1");
            }
            else {
                $current_ip = $conn->query("SELECT `ip_id` FROM `ips` WHERE `ip_address`='$this->ip'");
                if($current_ip->num_rows == 1){
                    $conn->query("UPDATE `visits` SET `views`=`views`+1 WHERE `date`='$this->date'");
                }
                else {
                    $conn->query("INSERT INTO `ips` SET `ip_addresss`='$current_ip'");
                    $conn->query("UPDATE `visits` SET `hosts`=`hosts`+1,`views`=`views`+1 WHERE `date`='$this->date'");
                }
            }
        }

        return 0;
    }

    public function getInfo() {
        $sql = "SELECT `views`, `hosts` FROM `visits` WHERE `date`='$this->date'";
        $conn = $this->connect();
        $res = $conn->query($sql);
        return mysqli_fetch_assoc($res);
    }
}