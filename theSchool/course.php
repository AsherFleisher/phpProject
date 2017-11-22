<?php
class course{
            
                        function allCourse()
                        {
                                echo "<div class='courseDiv'><h4>  All Course</h4>";
                                require "DAL.php";
                                $statement = $pdo->query("SELECT * FROM course");
                                
                                foreach ($statement as $row)
                                {          
                                        echo  "<button class='course btn btn-outline-secondary' name='course' onclick='ajax(this)'>" . $row['name'] . "</button><br/>";
                                } 
                                echo "</div>";
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