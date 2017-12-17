
<!DOCTYPE html>

    <html>
            <head>

            </head>

            <body>
              <?php
            require "course.php";
            require "students.php";

         $course = new course;
         $course->allCourse();

         $students = new students;
         $students->allStudents();
           
            
            ?>
                 <div id="ajax2"></div>
            <script src="ajax.js"></script>
            
            
            
            </body>
    </html>