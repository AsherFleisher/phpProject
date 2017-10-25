<!DOCTYPE html>

    <html>
            <head>

            </head>

            <body>
            
            <button name="students" onclick="ajax(this)">View all students</button> 
             <p>Add new student: </p> 
             Insert student Id <input id="studentId">
             Insert student name <input id="studentName">
             Insert student phone <input id="studentPhone">
             Insert student email <input id="studentEmail">
             <button name="create" onclick='ajax(this)'>Create new student</button>
                 <div id="ajax2"></div>
            <script src="ajax.js"></script>
            
            </body>
    </html>