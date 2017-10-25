<?php
      class students{        
              function chooseStudent()
              {
                $students = $_SESSION['students'];                
                require "DAL.php";
                $statement = $pdo->query("SELECT * FROM students");
                      
                       foreach ($statement as $row)
                       {          if($row['name'] ===  $students)
                               echo   $row['name'] . $row['email'] . $row['phone'] . "<br/>";
                       }  
              }

              function allStudents()
              {
                require "DAL.php";
                $statement2 = $pdo->query("SELECT * FROM students");
                
                foreach ($statement2 as $row)
                {          
                        echo  "<button class='student' name='student' onclick='ajax(this)'>" . $row['name'] . "</button><br/>";
                }  
              }
      }
      
     
?>