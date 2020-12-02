<?php
    if (isset($_GET["aleart"])){
    echo '<script language="javascript">';
    if ($_GET["aleart"]=="success"){
        echo 'alert("Succes")';
    }
    else if ($_GET["aleart"]=="fail"){
        echo 'alert("Fail")';
    }
    echo '</script>';
    }
?>