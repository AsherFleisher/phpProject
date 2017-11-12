<?php
session_start();
   class schoolBLL
   {
        function login($username,$password)
        {
            require_once "adminClass.php";
            $admin = new admin;
            $admin->admin($username,$password);               
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
               require "students.php";
               $students = new students;
               $students->chooseStudent();
            }

            function students()
            {
               require "students.php";
               $students = new students;
               $students->allStudents();
            }

            function create($studentId,$studentName,$studentEmail,$studentPhone)
            { 
                require "students.php";
                $students = new students;
                $students->insertStudent($studentId,$studentName,$studentEmail,$studentPhone);     
            }
                
                function editStudent($studentName)
                {
                    $_SESSION["studentChange"]=$studentName;
                    require "students.php";
                    $students = new students;
                    $students->editStudent($studentName);   
                }
                
                function updateStudent($studentId,$studentName,$studentEmail,$studentPhone)
                {                   
                    require "students.php";
                    $students = new students;
                    $students->editStudent($studentId,$studentName,$studentEmail,$studentPhone);      
                           
                }     
   }

?>