<?php   
    class staff{
                    function allStaff()
                    {
                                echo "<div class='staffDiv'><h4>  All Staff</h4><button name='addStaff' onclick='ajax(this)'>+</button><br/>";
                                require "DAL.php";
                                $statement = $pdo->query("SELECT * FROM admin");
                                        
                                foreach ($statement as $row)
                                {          
                                    if($row['role'] !== "owner" || $_SESSION["role2"] === "owner" ){
                                        echo  "<button class='staff btn btn-outline-secondary' name='staff' onclick='ajax(this)'>" . $row['name'] . "</button><br/>";
                                    }
                                       
                                } 
                                echo "</div>";                     
                    }

                    function chooseStaff()
                    {
                            $students = $_SESSION['students'];                
                            require "DAL.php";
                            $statement = $pdo->query("SELECT * FROM admin");
                            
                            foreach ($statement as $row)
                            {          if($row['name'] ===  $students)
                                    echo   "Name: " . $row['name'] . "<br/>Email: " . $row['email'] . "<br/>Phone: " . $row['phone'] ."<br/>Role: " . $row['role'] . "<br/><button name='editStaff' data-studentId='{$row['id']}' data-studentName='{$row['name']}' onclick='ajax(this)' > Edit staff</button><br/><button name='deleteStaff' data-studentId='{$row['id']}' data-studentName='{$row['name']}' onclick='ajax(this)' > Delete staff</button><br/>";
                            }  
                    }

                    function insertStaff($studentId,$studentName,$studentEmail,$studentPhone,$password,$role)
                    {
                            if($studentId==="" || $studentName ==="" || $studentEmail==="" || $studentPhone==="" || $password === "" || $role === "")
                            {
                              echo "please fill out";
                            }
                            else
                            {
                                    require "DAL.php";
                                    $statement = $pdo->query("SELECT * FROM admin");
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
                                                    $statement = $pdo->prepare("INSERT INTO admin(Id,name,phone,email,password,role)
                                                    VALUES( :Id,:name,:phone,:email,:password,:role)");
                                                    $statement->execute(array(
                                                    ":Id" => $studentId,
                                                    ":name" => $studentName,
                                                    ":phone" => $studentPhone,
                                                    ":email" => $studentEmail,
                                                    ":password" => $password,
                                                    ":role" => $role
                                                    ));
                                                    echo  $studentName . " has been created <br/>";
                                            }
                            }
                            $staff = new staff;
                            $staff->allStaff();
                    }
                    
                    function addStaff()
                    {
                           echo " <h4> Add new Staff: </h4><p>Insert Staff Id <input type='number' id='studentId'></p>
                           <p>Insert Staff name <input id='studentName'></p>
                           <p>Insert Staff phone <input type='number' id='studentPhone'></p>
                           <p>Insert Staff email <input type='email' id='studentEmail'></p>
                           <p>Insert Staff password <input type='password' id='password'></p>
                           <p>Insert Staff role <select id='role'>
                           <option value='manager'>Manager</option>
                           <option value='sales'>Sales</option>
                         </select>
                             
              
                           <button name='createStaff' onclick='ajax(this)'>Create new Staff</button>";
                    }

                    function editStaff($studentName,$studentId)
                    {
                            $_SESSION["studentChange"]=$studentId;
                            echo  "<p>Update {$studentName} , Id: $studentId: </p> 
                            <p>Change Staff Id to: <input type='number' id='studentId'></p>
                            <p>Change Staff name to: <input id='studentName'></p>
                            <p>Change Staff phone to: <input type='number' id='studentPhone'></p>
                            <p>Change Staff email to: <input id='studentEmail'></p>";
                            if($_SESSION["role2"] === "owner" && $studentId != 1)
                            {
                                echo "Change Staff role <select id='role'> 
                                <option value='manager' >Manager</option>
                                <option value='sales'>Sales</option>
                              </select>";
                            }
                            
                            echo "<button name='updateStaff' onclick='ajax(this)'>Change </button>";
                    }

                    function updateStaff($studentId,$studentName,$studentEmail,$studentPhone,$role)
                    {
                            require "DAL.php";
                            $statement = $pdo->query("SELECT * FROM admin");
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

                                            if($role !== "")
                                            {
                                                    if($studentEmail !== "" || $studentId !== "" || $studentName !== "" || $studentPhone !== "")
                                                    {
                                                    $stm .= ", role = '{$role}'";
                                                    }
                                                    else{
                                                            $stm = "role = '{$role}'";
                                                    }
                                            }
                                            
                                            $ID =intval($_SESSION['studentChange']);
                                            if(isset($stm))
                                            {
                                                    $stm2 = "UPDATE admin SET $stm WHERE id = $ID ";
                                                    
                                                    $statement = $pdo->query($stm2);   
                                            }
                                            else{echo "you didnt enter any information for change";}
                                                           
                                    }
                                    $a = new staff;
                                    $a->allStaff();
                            }

                            function deleteStaff($studentName,$studentId)
                            {
                                    require "DAL.php";
                                    $statement = $pdo->query("DELETE FROM admin WHERE id = {$studentId} ");
                                    echo "{$studentName} Was deleted!";
                                    $a = new staff;
                                    $a->allStaff();
    
                                    
                            }
                            


                }
?>
    