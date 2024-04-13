"use strict";
const formularios = document.querySelector(".FORMULARIOS");

formularios.addEventListener('submit',(e)=>{
    e.preventDefault();

    let data = new FormData(formularios);
    let method = formularios.getAttribute("method");
    let action = formularios.getAttribute("action");

    let encabezado = new Headers();

    let config = { 
        method:method,
        header:encabezado,
        mode:"cors",
        cache:'no-cache',
        body:data,
    }

    fetch(action, config)
        .then(res => res.text())
        .then(res => {
            if(res.search('-') == 0){
                res = res.split("-");
                sessionStorage.setItem("session_active", "yes");
                sessionStorage.setItem("name", res[2]);
                sessionStorage.setItem("ugid", res[1]);
                sessionStorage.setItem("email", res[3]);
                location.href = '/';
            }else{
                if(res.search("/") == 0){
                    window.location = res;
                }else if(res.search('./') == 0){
                    window.location = res;
                }else{
                    document.querySelector(".error").innerHTML = res;
                }
            }

            
        });
    }
);