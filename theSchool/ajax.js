function ajax(a) {
    var ajax = "ajax"

    if (document.getElementById("username") !== null)
        var username = document.getElementById("username").value
    if (document.getElementById("password") !== null)
        var password = document.getElementById("password").value
    if (document.getElementById("studentName") !== null)
        var studentName = document.getElementById("studentName").value
    if (document.getElementById("studentEmail") !== null)
        var studentEmail = document.getElementById("studentEmail").value
    if (document.getElementById("studentPhone") !== null)
        var studentPhone = document.getElementById("studentPhone").value
    if (document.getElementById("studentId") !== null)
        var studentId = document.getElementById("studentId").value
    if (a.getAttribute('data-studentName') != undefined)
        var studentName = a.getAttribute('data-studentName')
    if (a.getAttribute('data-studentId') != undefined)
        var studentId = a.getAttribute('data-studentId')
    if (document.getElementById("role") !== null) {
        var role1 = document.getElementById("role")
        var role = role1.options[role1.selectedIndex].value;
    }
    if (document.getElementsByClassName("chooseCourseDiv")[0] !== undefined) {
        var courseChecked = [];
        $('.course:checked').each(function(i){
          courseChecked[i] = $(this).val();
        });
    }

    var action = a.getAttribute('name')
    if (action === "logout") {
        document.location.href = "index.html";
    }
    if (action === "course") {
        var courseName = a.innerHTML
        ajax = "ajax2"
    }
    if (action === "student" || action === "students" || action === "staff") {
        var student = a.innerHTML
        ajax = "ajax2"
    }
    if (action === "addStudent" || action === "addStaff") {
        ajax = "addStudent"
    }
    if (action === "deleteStudent" || action === "deleteStaff") {
        if (confirm("Are you sure you would like to delete")) {} else { throw "Decided not to delete"; }
    }
    var allAjax = document.getElementsByClassName("allAjax")
    for (i = 0; i < allAjax.length; i++) {
        allAjax[i].innerHTML = ""
    }



    var data = new FormData()
    data.append("action", action);
    data.append("username", username);
    data.append("password", password);
    data.append("courseName", courseName);
    data.append("student", student);
    data.append("studentName", studentName);
    data.append("studentPhone", studentPhone);
    data.append("studentEmail", studentEmail);
    data.append("studentId", studentId);
    data.append("role", role);
    data.append("courseChecked", courseChecked);


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            document.getElementById(ajax).innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "API.php", true);
    xhttp.send(data);
}