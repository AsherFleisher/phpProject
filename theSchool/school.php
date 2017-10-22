<!DOCTYPE html>

    <html>
            <head>

            </head>

            <body>
              <?php
            require "DAL.php";
            $statement = $pdo->query("SELECT * FROM course");
           
            foreach ($statement as $row)
            {          
                    echo  "<button name='course' onclick='ajax(this)'>" . $row['name'] . "</button><br/>";
            }  
            ?>
                 <div id="ajax"></div>
            <script src="ajax.js"></script>
            
            </body>
    </html>