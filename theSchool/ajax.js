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
    var action = a.getAttribute('name')
    if (action === "course") {
        var courseName = a.innerHTML
        ajax = "ajax2"
    }
    if (action === "student" || action === "students") {
        var student = a.innerHTML
        ajax = "ajax2"
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




    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(ajax).innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "API.php", true);
    xhttp.send(data);
}