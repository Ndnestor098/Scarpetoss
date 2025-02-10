"use strict";

const imagePrincipal = document.getElementById('main-image');
const allImages = document.querySelectorAll('.thumbnail-image'); 

allImages.forEach((item) => {
    if(item.src == imagePrincipal.src){
        item.classList.add('selected-image')
    } else {
        item.classList.remove('selected-image')
    }


    item.addEventListener('mouseover', () => {
        if (item.src === imagePrincipal.src) {
            return;
        }
        
        allImages.forEach((img) => {
            img.classList.remove('selected-image'); 
        });

        imagePrincipal.src = item.src; 
        item.classList.add('selected-image');
    });
});
