<?php
      class students{        
                        function chooseStudent()
                        {
                                $students = $_SESSION['students'];                
                                require "DAL.php";
                                $statement = $pdo->query("SELECT * FROM students");
                                
                                foreach ($statement as $row)
                                {          if($row['name'] ===  $students)
                                        echo   "Name: " . $row['name'] . "<br/>Email: " . $row['email'] . "<br/>Phone: " . $row['phone'] . "<br/><button name='editStudent' data-studentId='{$row['id']}' data-studentName='{$row['name']}' onclick='ajax(this)' > Edit student</button><br/>";
                                }  
                        }

                        function allStudents()
                        {
                                echo "<div class='studentDiv'><h4>  All Students</h4><button name='addStudent' onclick='ajax(this)'>+</button><br/>";
                                require "DAL.php";
                                $statement2 = $pdo->query("SELECT * FROM students");
                                                
                                foreach ($statement2 as $row)
                                {          
                                        echo  "<button class='student btn btn-outline-secondary' name='student' onclick='ajax(this)'>" . $row['name'] . "</button><br/>";
                                }  
                                echo "</div>";
                        }

                        function insertStudent($studentId,$studentName,$studentEmail,$studentPhone)
                        {
                                if($studentId==="" && $studentName ==="" && $studentEmail==="" && $studentPhone==="")
                                {
                                  echo "please fill out";
                                }
                                else
                                {
                                        require "DAL.php";
                                        $statement = $pdo->query("SELECT * FROM students");
                                        $haveAlready = 0;
                                        foreach ($statement as $row)
                                        {
                                                if($row['email'] === $studentEmail || $row["id"]== $studentId)
                                                {
                                                        $haveAlready = 1; 
                                                }
                                        }        
                                                if($haveAlready === 1)
                                                {
                                                        echo "student exists already";
                                                }
                                                else
                                                {
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
                                $a = new students;
                                $a->allStudents();
                        }

                        function updateStudent($studentId,$studentName,$studentEmail,$studentPhone)
                        {
                                require "DAL.php";
                                $statement = $pdo->query("SELECT * FROM students");
                                $haveAlready = 0;
                                foreach ($statement as $row)
                                {
                                        if($_SESSION['studentChange'] == $row['id'] && $studentId == $row['id'])
                                        {
                                                $haveAlready = 1;
                                        }
                                }
                                if($haveAlready === 1)
                                {
                                        echo "Id taken choose anther id";
                                }        
                                        else{
                                                if($studentId !== "")
                                                {
                                                        $stm = "id = {$studentId} ";
                                                }
                                                if($studentEmail !== "")
                                                {
                                                        if($studentId !== "")
                                                        {
                                                                $stm .= ", email = '{$studentEmail}' ";
                                                        }
                                                        else{
                                                                $stm = "email = '{$studentEmail}' ";
                                                        }                                  
                                                }
                                                if($studentName !== "")
                                                {
                                                        if($studentEmail !== "" || $studentId !== "")
                                                        {
                                                        $stm .= ", name = '{$studentName}' ";
                                                        }
                                                        else{
                                                                $stm = "name = '{$studentName}'" ;
                                                        }
                                                }
                                                if($studentPhone !== "")
                                                {
                                                        if($studentEmail !== "" || $studentId !== "" || $studentName !== "" )
                                                        {
                                                        $stm .= ", phone = {$studentPhone}";
                                                        }
                                                        else{
                                                                $stm = "phone = {$studentPhone}";
                                                        }
                                                }
                                                
                                                $ID =intval($_SESSION['studentChange']);
                                                if(isset($stm))
                                                {
                                                        $stm2 = "UPDATE students SET $stm WHERE id = $ID ";
                                                        
                                                        $statement = $pdo->query($stm2);   
                                                }
                                                else{echo "you didnt enter any information for change";}
                                                               
                                        }
                                        $a = new students;
                                        $a->allStudents();
                                }
                                
                        

                        function editStudent($studentName,$studentId)
                        {
                                $_SESSION["studentChange"]=$studentId;
                                echo  "<p>Update {$studentName} , Id: $studentId: </p> 
                                Change student Id to: <input type='number' id='studentId'>
                                Change student name to: <input id='studentName'>
                                Change student phone to: <input type='number' id='studentPhone'>
                                Change student email to: <input id='studentEmail'>
                                <button name='updateStudent' onclick='ajax(this)'>Change </button>";
                        }

                        function addStudent()
                        {
                                echo "<h4> Add new Student: </h4><p>Insert student Id <input type='number' id='studentId'></p>
                                <p>Insert student name <input id='studentName'></p>
                                <p>Insert student phone <input type='number' id='studentPhone'></p>
                                <p>Insert student email <input type='email' id='studentEmail'></p>
                                <button name='create' onclick='ajax(this)'>Create new student</button>";
                        }
                     }  
?>