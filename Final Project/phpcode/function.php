<?php 
function takeRole ($username){
    require "connection.php";
    $sql = "SELECT A.role FROM Account A WHERE A.username = ?";
    $stm = $conn->prepare ($sql);
    $stm-> bind_param('s', $username);
    $stm->execute();
    $result = $stm ->get_result();
    if ($row = $result -> fetch_assoc()){
        $stm -> close();
        $conn ->close();
        return $row["role"];
    }
    else {
        $stm -> close();
        $conn ->close();
        return null;
    }
}

function checkAdmin ($username){
    $role = takeRole($username);
    if ($role == "admin"){
        return TRUE;
    }
    else return FALSE;
}

function canTeach ($username){
    $role = takeRole($username);
    if (($role == "admin") or ($role == "teacher")){
        return TRUE;
    }
    else return FALSE;
}

function getId ($username){
    require "connection.php";
    $sql = "SELECT A.id FROM Account A WHERE A.username = ?";
    $stm = $conn->prepare ($sql);
    $stm-> bind_param('s', $username);
    $stm->execute();
    $result = $stm ->get_result();
    if ($row = $result -> fetch_assoc()){
        $stm -> close();
        $conn ->close();
        return $row["id"];
    }
    else {
        $stm -> close();
        $conn ->close();
        return null;
    }
}

function getCurrentDateTime(){
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    return date('Y-m-d H:i:s');
}


?> 