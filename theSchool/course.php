<?php
      require_once "DAL.php";
     $courseName = $_SESSION['courseName'];
     $statement = $pdo->query("SELECT * FROM course");
           
            foreach ($statement as $row)
            {          if($row['name'] ===  $courseName)
                    echo   $row['name'] . $row['description'] . "<br/>";
            }  
?>