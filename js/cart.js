// ===================================AGREGAR AL CARRITO===================================
const contadorCarrello = document.getElementById("contador-carrello");

//En caso que no exista el localstorage se crea
if(!localStorage.getItem("AlmacenCarrito")){
    localStorage.setItem("AlmacenCarrito", "");
}

//En caso de que el localstorage este vacio se cancela el style, en caso contrario
//se cuenta la cantidad de productos en el localstorage
function vizualizarCarrito(){
    if(localStorage.getItem("AlmacenCarrito") == ""){
        contadorCarrello.style.display = "none";
    } else {
        contadorCarrello.style.display = "block";
        const cantidadAlmacenada = localStorage.getItem("AlmacenCarrito").split(",");
        contadorCarrello.textContent = cantidadAlmacenada.length;
    }
}

//Cargar el carrito de compra apenas se inicie la pagina web
vizualizarCarrito();


//Cargar el producto en el carrito se haga click
function contar(NUM){
    const cantidadAlmacenada = localStorage.getItem("AlmacenCarrito").split(",");

    if(cantidadAlmacenada[0] == ""){
        cantidadAlmacenada.shift()
    }
    cantidadAlmacenada.push(NUM);

    localStorage.setItem("AlmacenCarrito", cantidadAlmacenada)

    vizualizarCarrito()
}

// ===================================ELIMINAR AL CARRITO===================================

function delated(NUM) {
    const cantidadAlmacenada = localStorage.getItem("AlmacenCarrito").split(",");

    let index = (cantidadAlmacenada.indexOf(NUM));

    if (index > -1) {
        cantidadAlmacenada.splice(index, 1);
    }
    
    localStorage.setItem("AlmacenCarrito", cantidadAlmacenada);
    updateCart();
    updatePago();
    vizualizarCarrito();
} 

function updatePago(){
    //Se crea un JSON para mandar al pago.php
    data = {
        AlmacenCarrito : localStorage.getItem("AlmacenCarrito"),
    };

    //Configuracion de pago.php
    config = { 
        method:"POST",
        header: {"Content-Type": "application/json"},
        mode:"cors",
        cache:'no-cache',
        body:JSON.stringify(data),
    }

    //Se envia y se recibe toda la informacion de pago.php
    fetch("/php/pago-cart.php", config)
    .then(res => res.text())
    .then(res => {
        document.querySelector(".area-pago").innerHTML = res;
    });
}

function updateCart(){
    //Se crea un JSON para mandar al cart.php
    let data = {
        AlmacenCarrito : localStorage.getItem("AlmacenCarrito"),
    };

    //Configuracion de cart.php
    let config = { 
        method:"POST",
        header: {"Content-Type": "application/json"},
        mode:"cors",
        cache:'no-cache',
        body:JSON.stringify(data),
    }

    //Se envia y se recibe toda la informacion de cart.php
    fetch("/php/cart.php", config)
    .then(res => res.text())
    .then(res => {
        console.log(res)
        document.querySelector(".area-productos").innerHTML = res;
    });
}