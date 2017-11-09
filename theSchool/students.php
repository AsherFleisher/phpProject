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

                        function insertStudent($studentId,$studentName,$studentEmail,$studentPhone)
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

                        function updateStudent($studentId,$studentName,$studentEmail,$studentPhone)
                        {
                                require "DAL.php";
                                
                                $statement = $pdo->query("UPDATE students
                                SET id = {$studentId}, name = '{$studentName}', email = '{$studentEmail}', phone ={$studentPhone} 
                                WHERE name = '{$_SESSION['studentChange']}'");
                        }

                        function editStudent($studentName)
                        {
                                $_SESSION["studentChange"]=$studentName;
                                echo  "<p>Update {$_SESSION["studentChange"]}: </p> 
                                Change student Id to: <input id='studentId'>
                                Change student name to: <input id='studentName'>
                                Change student phone to: <input id='studentPhone'>
                                Change student email to: <input id='studentEmail'>
                                <button name='updateStudent' onclick='ajax(this)'>Change </button>";
                        }
                     }  
?>