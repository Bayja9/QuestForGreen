// Fichier pour vos scripts JavaScript
function connect() {
    var xmlhttp = new XMLHttpRequest();
    var login = document.getElementById("login").value;
    var mdp = document.getElementById("mdp").value;
    xmlhttp.open("GET", "loginSubmit.php?login=" + login + "&mdp=" + mdp, true);
    xmlhttp.withCredentials = true;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("getResponseConnect").innerHTML = this.responseText;

            setTimeout(() => {
                if (document.querySelector(".alert-success")) {
                    document.location.href = "/QuestForGreen/Home/";
                }
            }, 300);
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


function checkMdp() {
    var register = document.getElementById('register-btn');
    var mdp = document.getElementById('mdp').value;
    var mdp2 = document.getElementById('mdp2').value;
    if (mdp != mdp2) {
        register.disabled = true;
    } else register.disabled = mdp == '' || mdp2 == '';
}

function sendFormEditUsername() {
    var xmlhttp = new XMLHttpRequest();
    var pseudo = document.getElementById("pseudo").value;
    var labelLogin = document.createElement("label");
    xmlhttp.open("GET", "editUsernameSubmit.php?pseudo=" + pseudo, true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            labelLogin.innerHTML = this.responseText;
            document.getElementById("showFormEditUsername").style.display = "none";
            document.getElementById("showButtonEditUsername").style.display = "none";
            document.getElementById('getResponseEditUsername').innerHTML = "";
            document.querySelector(".getResponseEditUsername").appendChild(labelLogin);
        }
    }
    xmlhttp.send();
}

function sendFormEditEmail() {
    var xmlhttp = new XMLHttpRequest();
    var email = document.getElementById("email").value;
    var labelLogin = document.createElement("label");
    xmlhttp.open("GET", "editEmailSubmit.php?email=" + email, true);
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            labelLogin.innerHTML = this.responseText;
            document.getElementById("showFormEditEmail").style.display = "none";
            document.getElementById("showButtonEditEmail").style.display = "none";
            document.getElementById('getResponseEditEmail').innerHTML = "";
            document.querySelector(".getResponseEditEmail").appendChild(labelLogin);
        }
    }
    xmlhttp.send();
}


function initPageProfile() {
    document.getElementById("showFormEditUsername").style.display = "none";
    document.getElementById("showFormEditEmail").style.display = "none";
}

function showFormEditUsername() {
    document.getElementById("showFormEditUsername").style.display = "flex";
    document.getElementById("showButtonEditUsername").style.display = "none";
}

function showFormEditEmail() {
    document.getElementById("showFormEditEmail").style.display = "flex";
    document.getElementById("showButtonEditEmail").style.display = "none";
}

function hideFormEditUsername(){
    document.getElementById("showFormEditUsername").style.display = "none";
    document.getElementById("showButtonEditUsername").style.display = "flex";
}

function hideFormEditEmail() {
    document.getElementById("showFormEditEmail").style.display = "none";
    document.getElementById("showButtonEditEmail").style.display = "flex";
}
var loadFile = function() {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};
