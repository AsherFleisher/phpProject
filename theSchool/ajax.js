function ajax(a)
{
    if (document.getElementById("username") !== null)
    var username = document.getElementById("username").value
    if (document.getElementById("password") !== null)
    var password = document.getElementById("password").value
    var action = a.getAttribute('name')

    var data = new FormData()
    data.append("action", action);
    data.append("username", username);
    data.append("password", password);
    


    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajax").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "API.php", true);
    xhttp.send(data);
}