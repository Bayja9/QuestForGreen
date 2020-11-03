// Fichier pour vos scripts JavaScript
function connect() {
    var xmlhttp = new XMLHttpRequest();
    var login = document.getElementById("login").value;
    var mdp = document.getElementById("mdp").value;
    var labelLogin = document.createElement("label");
    xmlhttp.open("GET", "loginSubmit.php?login=" + login + "&mdp=" + mdp, true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            labelLogin.innerHTML = this.responseText;
            document.querySelector("body").appendChild(labelLogin);
        }
    }
    xmlhttp.send();
}