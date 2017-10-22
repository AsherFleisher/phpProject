<?php
session_start();
   class schoolBLL
   {
        function login($username,$password)
        {
            require "DAL.php";

            
            $statement = $pdo->query("SELECT * FROM admin");
            $stm = $pdo->query("SELECT * FROM students");
            foreach ($statement as $row)
            {    
                    if($row['name'] === $username && $row['password'] === $password)
                    {
                       $_SESSION["role"] =  $row['role'];
                       header("Location: main.php");
                       die();
                      
                    }
            }     

                foreach ($stm as $row2)
                {
                     if($row['name'] === $username && $row['password'] === $password)
                    {
                          header("Location: main.php");
                          die();
                    }
                }           
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
            }



   }

 


?>