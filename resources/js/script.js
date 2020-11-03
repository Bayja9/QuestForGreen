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
            document.getElementById("getResponseConnect").innerHTML = "";
            document.querySelector(".getResponseConnect").appendChild(labelLogin);
        }
    }
    xmlhttp.send();
}

function register() {
    var xmlhttp = new XMLHttpRequest();
    var pseudo = document.getElementById("pseudo").value;
    var email = document.getElementById("email").value;
    var mdp = document.getElementById("mdp").value;
    var mdp_verif = document.getElementById("mdp2").value;
    var labelLogin = document.createElement("label");
    xmlhttp.open("GET", "registerSubmit.php?email=" + email + "&pseudo=" + pseudo + "&mdp=" + mdp + "&mdp-verif=" + mdp_verif, true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            labelLogin.innerHTML = this.responseText;
            document.getElementById('getResponseRegister').innerHTML = "";
            document.querySelector(".getResponseRegister").appendChild(labelLogin);
        }
    }
    xmlhttp.send();
}