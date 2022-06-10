<?php

set_error_handler('err_handler');
function err_handler($errno, $errmsg, $filename, $linenum) {
    $date = date('Y-m-d H:i:s (T)');
    $f = fopen(__DIR__ . '/../../logs/errors.txt', 'a');
    if (!empty($f)) {
        $filename  =str_replace($_SERVER['DOCUMENT_ROOT'],'',$filename);
        $err  = $date ."\t" . "$errmsg = $filename = $linenum\r\n";
        fwrite($f, $err);
        fclose($f);
    }
}

class dbh
{
    private $servername;
    private $username;
    private $password;
    private $dbname;


    protected function connect()
    {
        $this->servername = "localhost";
        $this->username = "bd_form71";
        $this->password = "Taht57CH";
        $this->dbname = "bd_form71";

        mysqli_report(MYSQLI_REPORT_OFF);

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($conn->connect_errno) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        return $conn;
    }


    protected function saveAllInfo($data){
        $sql = "INSERT INTO form (`type`, `topic`, `place`, `datetime`, `duration`, `comment`, `complete`,`deleted`)" .
            "VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]', '$data[6]', '$data[7]');";
        $this->connect()->query($sql);
        return true;
    }

    protected function getAllInfo()
    {
        $sql = "SELECT * FROM form";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    protected function delRow($id)
    {
        $sql = "UPDATE form SET deleted = 1 WHERE id = $id;";

        $this->connect()->query($sql);
    }
}