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
                        
                        function showCourses($courses)
                        {
                                require "DAL.php";
                                $courses = explode(",",$courses);
                                $statement = $pdo->query("SELECT * FROM course");
                                
                                echo "<div id='coursesTaken'><br/><h5>Courses taken</h5><br/>";
                                foreach ($statement as $row)
                                {     
                                        for($i = 0; $i < count($courses); $i++)
                                        {
                                                if($courses[$i] == $row["id"])
                                                {
                                                        $_SESSION["courseArray"] .= $row["id"] .",";
                                                        echo "<span class='courses'>" . $row["name"] . "</span>";
                                                }
                                        }
                                }
                                echo "</div>";
                                          
                        }

                        function pickCourses(){
                                echo "<div class='chooseCourseDiv'><h4>  All Course</h4>";
                                require "DAL.php";
                                $courseArray = explode( ",",$_SESSION["courseArray"]);
                                $statement = $pdo->query("SELECT * FROM course");                           
                                foreach ($statement as $row)
                                { 
                                        $checked =null;  
                                        for($i =0; $i<count($courseArray); $i++)
                                        {
                                                 if($courseArray[$i] == $row["id"])
                                                 {
                                                        $checked ="checked";
                                                 }    
                                        }
                                        echo  "<input type='checkbox' class='course btn btn-outline-secondary' name='updateCourse' value={$row['id']} $checked>" . $row['name'] . "</input><br/>";
                                       
                                } 
                                echo "</div>";
                        }


        }
?>