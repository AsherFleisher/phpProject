<?php
require_once "BLL.php";

    $action = $_POST["action"];
    if(isset( $_POST["password"]) && $_POST["password"] !== "undefined")
    {
        $password = $_POST["password"];
        $_SESSION["password"] = $password;
    }
    
    if(isset( $_POST["username"]) && $_POST["username"] !== "undefined" )
    {
       $username = $_POST["username"];
       $_SESSION["username"] = $username;
    }
    if(isset( $_POST["studentName"]) && $_POST["studentName"] !== "undefined")
    {
       $studentName = $_POST["studentName"];
       $_SESSION["studentName"] = $studentName;
    }
    if(isset( $_POST["studentPhone"]) && $_POST["studentPhone"] !== "undefined")
    {
       $studentPhone = $_POST["studentPhone"];
       $_SESSION["studentPhone"] = $studentPhone;
    }
    if(isset( $_POST["studentEmail"]) && $_POST["studentEmail"]  !== "undefined")
    {
       $studentEmail = $_POST["studentEmail"];
       $_SESSION["studentEmail"] = $studentEmail;
    }
    if(isset( $_POST["studentId"]) && $_POST["studentId"] !== "undefined")
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
        
        case "editStudent":
        $a = new schoolBLL;
        $a->editStudent($_SESSION["studentName"],$_SESSION["studentId"],$_SESSION["courses"] );
        break;

        case "updateStudent":
        $a = new schoolBLL;
        $a->updateStudent($_SESSION["studentId"],$_SESSION["studentName"],$_SESSION["studentEmail"],$_SESSION["studentPhone"]);
        break;

        case "deleteStudent":
        $a = new schoolBLL;
        $a->deleteStudent($_SESSION["studentName"],$_SESSION["studentId"]);
        break;

        case "staff":
        $a = new schoolBLL;
        $a->staff($_POST["student"]);
        break;

        case "createStaff":
        $a = new schoolBLL;
        $a->createStaff($_SESSION["studentId"],$_SESSION["studentName"],$_SESSION["studentEmail"],$_SESSION["studentPhone"],$_SESSION["password"],$_POST["role"]);
        break;

        case "editStaff":
        $a = new schoolBLL;
        $a->editStaff($_SESSION["studentName"],$_SESSION["studentId"]);
        break;

        
        case "addStudent":
        require "students.php";
        $a = new students;
        $a->addStudent();
        break;

        case "updateStaff":
        $a = new schoolBLL;
        $a->updateStaff($_SESSION["studentId"],$_SESSION["studentName"],$_SESSION["studentEmail"],$_SESSION["studentPhone"],$_POST["role"]);
        break;
           
        case "addStaff":
        require "staff.php";
        $a = new staff;
        $a->addStaff();
        break;

        case "deleteStaff":
        $a = new schoolBLL;
        $a->deleteStaff($_SESSION["studentName"],$_SESSION["studentId"]);
        break;
    }
?>