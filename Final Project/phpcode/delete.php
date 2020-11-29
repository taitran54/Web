<?php



function deleteUploadFileAssignment($id){
  require "connection.php";
  $sql = "DELETE FROM UploadFileAssignment WHERE id = ".$id;
  return $conn -> query($sql);
}

function deleteSubmitFile ($id){
  require "connection.php";
  $sql = "DELETE FROM SubmitFile WHERE id = ".$id;
  return $conn -> query($sql);
}

function deleteAssignment ($id){
  require "connection.php";
  $sql = "SELECT S.id FROM SubmitFile S WHERE S.id_assignment= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteSubmitFile($row['id']);
  }

  $sql = "SELECT U.id FROM UploadFileAssignment U WHERE U.id_assignment= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteUploadFileAssignment($row['id']);
  }

  $sql = $sql = "DELETE FROM Assignment WHERE id = ".$id;
  return $conn -> query($sql);
}

function deleteComment($id){
  require "connection.php";
  $sql = "DELETE FROM Comment WHERE id = ".$id;
  return $conn -> query($sql);
}

function deleteUploadFile($id){
  require "connection.php";
  $sql = "DELETE FROM UploadFile WHERE id = ".$id;
  return $conn -> query($sql);
}

function deleteStatus ($id){
  require "connection.php";
  $sql = "SELECT U.id FROM UploadFile U WHERE U.id_status= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteUploadFile($row['id']);
  }

  $sql = "SELECT C.id FROM Comment C WHERE C.id_status= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteComment($row['id']);
  }

  $sql = $sql = "DELETE FROM Status WHERE id = ".$id;
  return $conn -> query($sql);
}

function deleteJoiningFromClass ($idclass){
  require "connection.php";
  $sql = "DELETE FROM Joining WHERE id_class = ".$idclass;
  return $conn -> query($sql);
}

function deleteJoiningFromAccount ($idaccount){
  require "connection.php";
  $sql = "DELETE FROM Joining WHERE id_account = ".$idaccount;
  return $conn -> query($sql);
}

function deleteClass($id){
  require "connection.php";
  $sql = "SELECT S.id FROM Status S WHERE S.id_class= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteStatus($row['id']);
  }

  $sql = "SELECT A.id FROM Assignment A WHERE A.id_class= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteAssignment($row['id']);
  }

  $bool = deleteJoiningFromClass($id);

  $sql = $sql = "DELETE FROM Class WHERE id = ".$id;
  return $conn -> query($sql);
}

function deleteAccount ($id){
  require "connection.php";
  $sql = "SELECT S.id FROM Status S WHERE S.id_account= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteStatus($row['id']);
  }

  $sql = "SELECT S.id FROM SubmitFile S WHERE S.id_account= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteSubmitFile($row['id']);
  }

  $sql = "SELECT C.id FROM Comment C WHERE C.id_account= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteComment($row['id']);
  }

  $sql = "SELECT C.id FROM Class C WHERE C.id_teacher= ".$id;
  $result = $conn ->query ($sql);
  while ($row= $result ->fetch_assoc()){
    $bool = deleteClass($row['id']);
  }

  $bool = deleteJoiningFromAccount($id);

  $sql = "SELECT P.id FROM Profile P, Account A WHERE P.id=A.id_profile AND A.id=".$id;
  $result = $conn ->query ($sql);
  $row= $result ->fetch_assoc();
  $id_profile = $row['id'];
  $sql = "DELETE FROM Account WHERE id = ".$id;
  $bool = $conn -> query($sql);
  $sql = $sql = "DELETE FROM Profile WHERE id = ".$id_profile;
  return $conn -> query($sql);
}
// header("Location: classadmin.php");
?>