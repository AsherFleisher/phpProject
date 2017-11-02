<!DOCTYPE html>

    <html>
            <head>

            </head>

            <body>
            <div >All students</div>
           <?php
               $a = new schoolBLL;
               $a->students();
           ?>
            
             
             <p>Add new student: </p> 
             Insert student Id <input id="studentId">
             Insert student name <input id="studentName">
             Insert student phone <input id="studentPhone">
             Insert student email <input id="studentEmail">
             <button name="create" onclick='ajax(this)'>Create new student</button>
                 <div id="ajax2"></div>
        
            
            </body>
    </html>