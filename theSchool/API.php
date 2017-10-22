<?php

require_once "BLL.php";

    $action = $_POST["action"];
    if(isset( $_POST["password"]))
    {
        $password = $_POST["password"];
        $_SESSION["password"] = $password;
    }
    
    if(isset( $_POST["username"]))
    {
       $username = $_POST["username"];
       $_SESSION["username"] = $username;
    }
    
    
    switch($action)
    {
        case "login":
        $a = new schoolBLL;
        $a->login($username,$password);
        break;

        case "logout":
        $a = new schoolBLL;
        $a->logout();
        break;
  
        case "school":
        $a = new schoolBLL;
        $a->school();
        break;

        case "administration":
        $a = new schoolBLL;
        $a->administration();
        break;

        case "course":
        $a = new schoolBLL;
        $a->course($_POST["courseName"]);
        break;
        
    }
?>