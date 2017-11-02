<?php
      class students{        
              function chooseStudent()
              {
                $students = $_SESSION['students'];                
                require "DAL.php";
                $statement = $pdo->query("SELECT * FROM students");
                      
                       foreach ($statement as $row)
                       {          if($row['name'] ===  $students)
                               echo   "Name: " . $row['name'] . "<br/>Email: " . $row['email'] . "<br/>Phone: " . $row['phone'] . "<br/><button name='editStudent' data-studentName='{$row['name']}' onclick='ajax(this)' > Edit student</button><br/>";
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