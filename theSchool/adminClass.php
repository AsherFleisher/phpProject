<?php
class admin
{
    function admin(){

    require "DAL.php";           
    $statement = $pdo->query("SELECT * FROM admin");
    
    foreach ($statement as $row)
    {    
            if($row['name'] === $username && $row['password'] === $password)
            {
               $_SESSION["role"] =  $row['role'];
               header("Location: main.php");
               die();                     
            }                
    }
    echo "username or pass not valid";
}
}
?>