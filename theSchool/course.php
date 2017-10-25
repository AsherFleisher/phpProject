<?php
class course{
            
        function allCourse()
        {
                require "DAL.php";
                $statement = $pdo->query("SELECT * FROM course");
                
                foreach ($statement as $row)
                {          
                        echo  "<button class='course' name='course' onclick='ajax(this)'>" . $row['name'] . "</button><br/>";
                } 
        }

        function chooseCourse()
     {
        $courseName = $_SESSION['courseName'];
        require "DAL.php";
        $statement = $pdo->query("SELECT * FROM course");
              
               foreach ($statement as $row)
               {          if($row['name'] ===  $courseName)
                       echo   $row['name'] . $row['description'] . "<br/>";
               }
     }
       
            
        }
?>