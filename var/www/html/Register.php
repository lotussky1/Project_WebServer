<?php 
     //(localhost, mysql ID, mysql Passward, mysql - DB)
    $con = mysqli_connect("localhost", "user", "Passward", "PROJECT");
    mysqli_query($con,'SET NAMES utf8');

    $userID = isset($_POST["userID"]) ? $_POST["userID"] : "";
    $userPW = isset($_POST["userPW"]) ? $_POST["userPW"] : "";
    $userAGE = isset($_POST["userAGE"]) ? $_POST["userAGE"] : "";
    $userFre = 0;

    $statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?,?,?,?)");
    mysqli_stmt_bind_param($statement, "ssii", $userID, $userPW, $userAGE, $userFre);
    
    mysqli_stmt_execute($statement);


    $response = array();
    $response["success"] = true;
 
   
    echo json_encode($response);



?>
