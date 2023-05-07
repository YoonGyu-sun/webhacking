<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Hacking</title>
</head>
<body>
    <form action="/jyCTFd/password_process.php" method="GET">
    <input type="text" name="pw" placeholder="값 입력">
    <input type="submit">
</form>


<?php 
    if($_GET['pw']){
        include($_SERVER['DOCUMENT_ROOT'].'/jyCTFd/include/dbinfo.php');    
    } 

    if(preg_match("/ |\/|\(|\)|\||&|select|from|0x/i",$_GET['pw'])){
     exit("no hack");
    }
    $stmt = $mysqli->stmt_init();
    $sql = "SELECT id FROM 1test1 WHERE id='guest' AND pw ={$_GET['pw']}";
 
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();

    if($row['id']=="guest"){
        echo"hi guest";
    }
    if($row['id']=="admin"){
        echo "hi admin";
    }
?>
</body>
</html>