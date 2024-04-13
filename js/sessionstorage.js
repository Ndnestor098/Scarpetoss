// ===================================SESSIONSTORAGE===================================
const logUsers = document.querySelectorAll(".activar-user")
const usuario = document.querySelector('header').dataset.temp.split(",");

function readUser(e) {
    e.style.display = "block";
}

if(sessionStorage.getItem("session_active") == 'yes'){
    logUsers.forEach(readUser);

    document.querySelector(".user_name").innerHTML = sessionStorage.getItem("name");
    document.getElementById("button-singup").style.display ="none";
    document.getElementById("button-login").style.display ="none";
}

if(usuario[0] == 'yes'){
    logUsers.forEach(readUser);

    document.querySelector(".user_name").innerHTML = usuario[1];
    document.getElementById("button-singup").style.display ="none";
    document.getElementById("button-login").style.display ="none";
}



