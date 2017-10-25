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
    if(isset( $_POST["studentName"]))
    {
       $studentName = $_POST["studentName"];
       $_SESSION["studentName"] = $studentName;
    }
    if(isset( $_POST["studentPhone"]))
    {
       $studentPhone = $_POST["studentPhone"];
       $_SESSION["studentPhone"] = $studentPhone;
    }
    if(isset( $_POST["studentEmail"]))
    {
       $studentEmail = $_POST["studentEmail"];
       $_SESSION["studentEmail"] = $studentEmail;
    }
    if(isset( $_POST["studentId"]))
    {
       $studentId = $_POST["studentId"];
       $_SESSION["studentId"] = $studentId;
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

        case "student":
        $a = new schoolBLL;
        $a->student($_POST["student"]);
        break;

        case "students":
        $a = new schoolBLL;
        $a->students();
        break;
        
        case "create":

        $a = new schoolBLL;
        $a->create($_SESSION["studentId"],$_SESSION["studentName"],$_SESSION["studentEmail"],$_SESSION["studentPhone"]);
        break;
        
    }
?>