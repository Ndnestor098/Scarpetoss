"use strict";
const formularios = document.querySelector(".form-carrello");

formularios.addEventListener('submit', function(e) {
    const select = document.getElementById('sizes');
    e.preventDefault();

    if (select.value === "") {
        select.classList.add('alerta-talla');
    } else {
        if (typeof window.isAuthenticated !== "undefined" && !window.isAuthenticated) {
            window.location.href = "/login";
            return;
        }
        
        select.classList.remove('alerta-talla');

        let data = new FormData(formularios);
        let method = formularios.getAttribute("method");
        let action = formularios.getAttribute("action");

        let headers = new Headers();

        let config = {
            method: method,
            headers: headers, 
            mode: "cors",
            cache: 'no-cache',
            body: data,
        };

        fetch(action, config)
            .then(res => res.json())
            .then(res => {
                if (res.status === 200) {
                    try {
                        document.getElementById("counter-cart").innerHTML = parseInt(document.getElementById('counter-cart').textContent) + 1;
                    } catch (error) {
                        document.getElementById("add-cart").innerHTML = `<i id="contador-carrello">1</i>`;
                    }
                } else if (res.status == 401) {
                    window.location.href = "/login";
                    return;
                } else {
                    console.error(res.message);
                }
            })
            .catch(error => {
                console.error('Error en la solicitud fetch:', error);
            });
    }
});
