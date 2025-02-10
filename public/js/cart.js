"use strict";
const cartForm = document.getElementById("cart-form");

cartForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const select = document.getElementById('sizes');

    if (select.value === "") {
        select.classList.add('alert');
    } else {
        if (typeof window.isAuthenticated !== "undefined" && !window.isAuthenticated) {
            window.location.href = "/login";
            return;
        }
        
        select.classList.remove('alert');

        let data = new FormData(cartForm);
        let method = cartForm.getAttribute("method");
        let action = cartForm.getAttribute("action");

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
                }

                if (res.status == 401) {
                    window.location.href = "/login";  // Redirige al login si no está autenticado
                    return;
                }
            })
            .catch(error => {
                console.error('Error en la solicitud fetch:', error);
            });
    }
});
