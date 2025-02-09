"use strict";

// ===================================MENU===================================
const openButton = document.getElementById("menu");
const menu = document.querySelector(".submenu");
const closeButton = document.getElementById("close-submenu-button");

openButton.addEventListener("click",()=>{
    menu.style.opacity = "1";
    menu.style.transitionProperty = "width";
    menu.style.transitionDuration  = "0.5s";
    menu.style.width = "240px";
    closeButton.style.opacity = "1";
    closeButton.style.transitionProperty = "opacity";
    closeButton.style.transitionDuration  = "0.4s";

});

closeButton.addEventListener("click",()=>{
    menu.style.transitionProperty = "width";
    menu.style.transitionDuration  = "0.5s";
    menu.style.width = "0px";
    closeButton.style.opacity = "0";
    closeButton.style.transitionProperty = "opacity";
    closeButton.style.transitionDuration  = "0.2s";

    setTimeout(() => {
        menu.style.opacity = "0";
        
    }, 300);
});




