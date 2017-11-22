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

            function staffs()
            {
                require_once "staff.php";
                $staff = new staff;
                $staff->allStaff();
            }

            function staff($student)
            {
               $_SESSION["students"] = $student;
               require "staff.php";
               $staff = new staff;
               $staff->chooseStaff();
            }

            function create($studentId,$studentName,$studentEmail,$studentPhone)
            { 
                require "students.php";
                $students = new students;
                $students->insertStudent($studentId,$studentName,$studentEmail,$studentPhone);     
            }

            function createStaff($studentId,$studentName,$studentEmail,$studentPhone,$password,$role)
            { 
                require "staff.php";
                $staff = new staff;
                $staff->insertStaff($studentId,$studentName,$studentEmail,$studentPhone,$password,$role);     
            }
                
                function editStudent($studentName,$studentId,$courses)
                {
                    $_SESSION["studentChange"]=$studentId;
                    require "students.php";
                    $students = new students;
                    $students->editStudent($studentName,$studentId,$courses);   
                }
                
                function updateStudent($studentId,$studentName,$studentEmail,$studentPhone)
                {                   
                    require "students.php";
                    $students = new students;
                    $students->updateStudent($studentId,$studentName,$studentEmail,$studentPhone);      
                           
                }

                function deleteStudent($studentName,$studentId)
                {
                    $_SESSION["studentChange"]=$studentId;
                    require "students.php";
                    $students = new students;
                    $students->deleteStudent($studentName,$studentId);   
                }
                
                function editStaff($studentName,$studentId)
                {
                    $_SESSION["studentChange"]=$studentId;
                    require "staff.php";
                    $staff = new staff;
                    $staff->editStaff($studentName,$studentId);   
                }

                function updateStaff($studentId,$studentName,$studentEmail,$studentPhone,$role)
                {                   
                    require "staff.php";
                    $staff = new staff;
                    $staff->updateStaff($studentId,$studentName,$studentEmail,$studentPhone,$role);      
                           
                }

                function deleteStaff($studentName,$studentId)
                {
                    $_SESSION["studentChange"]=$studentId;
                    require "staff.php";
                    $staff = new staff;
                    $staff->deleteStaff($studentName,$studentId);   
                }
   }

?>