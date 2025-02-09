"use strict";

// Seleccionamos todos los elementos de producto dentro del carrusel
const productos = document.querySelectorAll(".carousel-content .carousel-item");

// Seleccionamos el contenedor principal del carrusel
const carrusel = document.querySelector(".carousel");

// Variables de control del slider
let sliderContar = 0; // Índice actual del slider
let widthHTML = carrusel.clientWidth; // Ancho actual del carrusel
let valorContadorLeft = productos.length / 4 - 1; // Límite izquierdo (para retroceder)
let valorContadorRight = productos.length / 4; // Límite derecho (para avanzar)

/**
 * Función para reajustar los valores del slider según el tamaño de la pantalla.
 * Determina cuántos elementos se mostrarán en función del ancho del carrusel.
 */
function resizeCarousel() {
    widthHTML = carrusel.clientWidth; // Se actualiza el ancho del carrusel

    switch (true) {
        case widthHTML >= 1130:
            // Pantallas grandes (PC)
            widthHTML = 1130;
            valorContadorLeft = productos.length / 4 - 1;
            valorContadorRight = productos.length / 4;
            break;

        case widthHTML >= 800:
            // Pantallas medianas (Tablets)
            valorContadorLeft = productos.length / 2 - 2;
            valorContadorRight = productos.length / 2 - 1;
            break;

        case widthHTML >= 500:
            // Pantallas pequeñas (Móviles en horizontal)
            valorContadorLeft = 2;
            valorContadorRight = 3;
            break;

        default:
            // Pantallas muy pequeñas (Móviles en vertical)
            valorContadorLeft = 4;
            valorContadorRight = 5;
            break;
    }
}

// Llamamos a la función para calcular los valores iniciales
resizeCarousel();

// Recalculamos los valores cuando la ventana cambie de tamaño
window.addEventListener('resize', resizeCarousel);

/**
 * Función para mover el slider hacia la izquierda
 */
function sliderLeft() {
    sliderContar = sliderContar <= 0 
        ? valorContadorLeft  // Si ya está en el inicio, vuelve al final
        : --sliderContar;    // De lo contrario, retrocede un paso

    scroll();
}

/**
 * Función para mover el slider hacia la derecha
 */
function sliderRight() {
    sliderContar++;

    sliderContar = sliderContar >= valorContadorRight 
        ? 0  // Si llega al final, vuelve al inicio
        : sliderContar;

    scroll();
}

/**
 * Función para aplicar la animación del slider
 */
function scroll() {
    productos.forEach((item) => {
        item.style.transform = `translateX(${-sliderContar * widthHTML}px)`;
    });
}
