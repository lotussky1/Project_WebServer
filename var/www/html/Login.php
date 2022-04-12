<?php
    //(localhost, mysql ID, mysql Passward, mysql - DB)
    $con = mysqli_connect("localhost", "user", "Passward", "PROJECT");
   
    mysqli_query($con,'SET NAMES utf8');

    $userID = isset($_POST["userID"]) ? $_POST["userID"] : "";
    $userPW = isset($_POST["userPW"]) ? $_POST["userPW"] : "";
    
    $statement = mysqli_prepare($con, "SELECT userID, userPW FROM USER WHERE userID = ? AND userPW = ?");
    mysqli_stmt_bind_param($statement, "ss", $userID, $userPW);
    
    //query문 실행
    mysqli_stmt_execute($statement);


    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $userPW);

    $response = array();
    $response["success"] = false;
 
    while(mysqli_stmt_fetch($statement)) {
        $response["success"] = true;
        $response["userID"] = $userID;
        $response["userPW"] = $userPW;   
    }

    echo json_encode($response);
?>
