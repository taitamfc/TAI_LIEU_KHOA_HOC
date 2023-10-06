<?php

// Hàm kết nối dữ liệu
function db_connect() {
    global $conn;
    $db = func_get_arg(0);
    $conn = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);
    if (!$conn) {
        die("Kết nối không thành công ".mysqli_connect_error());
    }
//    else{
//        echo "Connect thành công";
//    }
}

//Thực thi chuổi truy vấn
function db_query($query_string) {
    global $conn;
    $result = mysqli_query($conn, $query_string);
    if (!$result) {
        db_sql_error('Query Error', $query_string);
    }
    return $result;
}

// Lấy một dòng trong CSDL
function db_fetch_row($query_string) {
    global $conn;
    $result = array();
    $mysqli_result = db_query($query_string);
    $result = mysqli_fetch_assoc($mysqli_result);
    mysqli_free_result($mysqli_result);
    return $result;
}

//Lấy một mảng trong CSDL
function db_fetch_array($query_string) {
    global $conn;
    $result = array();
    $mysqli_result = db_query($query_string);
    while ($row = mysqli_fetch_assoc($mysqli_result)) {
        $result[] = $row;
    }
    mysqli_free_result($mysqli_result);
    return $result;
}
//Lấy số bản ghi
function db_num_rows($query_string) {
    global $conn;
    $mysqli_result = db_query($query_string);
	return mysqli_num_rows($mysqli_result);
}

function db_insert($table, $data) {
    global $conn;
    $fields = "(" . implode(", ", array_keys($data)) . ")";
    $values = "";
    foreach ($data as $field => $value) {
        if ($value === NULL)
            $values .= "NULL, ";
        else
            $values .= "'" . escape_string($value) . "', ";
    }
    $values = substr($values, 0, -2);
    db_query("
            INSERT INTO `{$table}` $fields
            VALUES($values)
        ");
    return mysqli_insert_id($conn);
}

function db_update($table, $data, $where) {
    global $conn;
    $sql = "";
    foreach ($data as $field => $value) {
        if ($value === NULL)
            $sql .= "$field=NULL, ";
        else
            $sql .= "$field='" . escape_string($value) . "', ";
    }
    $sql = substr($sql, 0, -2);
    db_query("
            UPDATE `{$table}`
            SET $sql
            WHERE $where
   ");
    return mysqli_affected_rows($conn);
}

function db_delete($table, $where) {
    global $conn;
    $query_string = "DELETE FROM `{$table}` WHERE $where";
    db_query($query_string);
    return mysqli_affected_rows($conn);
}

function escape_string($str) {
    global $conn;
    return mysqli_real_escape_string($conn, $str);
}

// Hiển thị lỗi SQL

function db_sql_error($message, $query_string = "") {
    global $conn;

    $sqlerror = "<table width='100%' border='1' cellpadding='0' cellspacing='0'>";
    $sqlerror.="<tr><th colspan='2'>{$message}</th></tr>";
    $sqlerror.=($query_string != "") ? "<tr><td nowrap> Query SQL</td><td nowrap>: " . $query_string . "</td></tr>\n" : "";
    $sqlerror.="<tr><td nowrap> Error Number</td><td nowrap>: " . mysqli_errno($conn) . " " . mysqli_error($conn) . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Date</td><td nowrap>: " . date("D, F j, Y H:i:s") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> IP</td><td>: " . getenv("REMOTE_ADDR") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Browser</td><td nowrap>: " . getenv("HTTP_USER_AGENT") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Script</td><td nowrap>: " . getenv("REQUEST_URI") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Referer</td><td nowrap>: " . getenv("HTTP_REFERER") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> PHP Version </td><td>: " . PHP_VERSION . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> OS</td><td>: " . PHP_OS . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server</td><td>: " . getenv("SERVER_SOFTWARE") . "</td></tr>\n";
    $sqlerror.="<tr><td nowrap> Server Name</td><td>: " . getenv("SERVER_NAME") . "</td></tr>\n";
    $sqlerror.="</table>";
    $msgbox_messages = "<meta http-equiv=\"refresh\" content=\"9999\">\n<table class='smallgrey' cellspacing=1 cellpadding=0>" . $sqlerror . "</table>";
    echo $msgbox_messages;
    exit;
}
