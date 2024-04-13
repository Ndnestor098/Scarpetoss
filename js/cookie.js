function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function aceptarCookies(a){
    document.cookie = "acceptCookie=yes";
    document.querySelector("body").classList.remove("no-scroll");
    document.querySelector(".cookie").style.display = "none";
    document.getElementById("contenedor-cookie").innerHTML = "";
}


if(getCookie('acceptCookie') == ""){
    document.querySelector("body").className = "no-scroll";

    document.getElementById("contenedor-cookie").innerHTML = `
    <div class="cookie">
        <div class="info-cookie">
            <span class="title"><i class="fa-solid fa-cookie-bite"></i>Cookies</span>
            <p>Utilizamos cookies para hacer que nuestro sitio funcione mejor al almacenar información limitada sobre su uso del sitio. <a href="/legalidades/politica-cookie.php">Más información aquí.</a></p>
            <div>
                <button onclick="aceptarCookies(false)">Solo Necesarias</button>
                <button onclick="aceptarCookies(true)">Todas las Cookies</button>
            </div>
        </div>
    </div>`;
}

