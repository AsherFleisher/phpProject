<?php
session_start();
   class schoolBLL
   {
        function login($username,$password)
        {
            require "DAL.php";           
            $statement = $pdo->query("SELECT * FROM admin");
            
            foreach ($statement as $row)
            {    
                    if($row['name'] === $username && $row['password'] === $password)
                    {
                       $_SESSION["role"] =  $row['role'];
                       header("Location: main.php");
                       die();                     
                    }                
            }
            echo "username or pass not valid";                          
        }

        function logout()
        {
           unset($_SESSION["username"]);
           unset($_SESSION["password"]);
           header("Location: index.html");
           die();
        }

          function school()
            {
             
                require_once "school.php";
            }

            function administration()
            {
                require_once "administration.php";
            }

            function course($courseName)
            {
               $_SESSION["courseName"] = $courseName;
               require_once "course.php";
               $course = new course;
               $course->chooseCourse();
            }

            function student($student)
            {
               $_SESSION["students"] = $student;
               require_once "students.php";
               $students = new students;
               $students->chooseStudent();
            }

            function students()
            {
               require_once "students.php";
               $students = new students;
               $students->allStudents();
            }

            function create($studentId,$studentName,$studentEmail,$studentPhone)
            {
                require "DAL.php";
    
                    $statement = $pdo->prepare("INSERT INTO students(Id,name,phone,email)
                    VALUES( :Id,:name,:phone,:email)");
                    $statement->execute(array(
                    ":Id" => $studentId,
                    ":name" => $studentName,
                    ":phone" => $studentPhone,
                    ":email" => $studentEmail
                    ));
    
                    echo  $studentName . " has been created <br/>";
                }
                
            
            
   }

 


?>