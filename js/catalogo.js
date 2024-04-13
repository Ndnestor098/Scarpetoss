function buscar(val){
    prd = document.querySelector('body').dataset.temp;

    if(prd.length != 0 && val.length != 0){
        //Se crea un JSON para mandar al cart.php
        let data = {
            query : val,
            query2 : prd, 
            true : '2',
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
        fetch("/php/shopping.php", config)
            .then(res => res.text())
            .then(res => {
                document.querySelector(".contenido-catalogo").innerHTML = res;
        });
    }else if(prd.length != 0 && val.length == 0){
        //Se crea un JSON para mandar al cart.php
        let data = {
            query : prd,
            true : '1',
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
        fetch("/php/shopping.php", config)
            .then(res => res.text())
            .then(res => {
                document.querySelector(".contenido-catalogo").innerHTML = res;
        });
    }else if(val.length != 0 && prd.length == 0){
        //Se crea un JSON para mandar al cart.php
        let data = {
            query : val,
            true : '1',
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
        fetch("/php/shopping.php", config)
            .then(res => res.text())
            .then(res => {
                document.querySelector(".contenido-catalogo").innerHTML = res;
        });
    }else{
        //Se crea un JSON para mandar al cart.php
        let data = {
            query : val,
            true : '1',
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
        fetch("/php/shopping.php", config)
            .then(res => res.text())
            .then(res => {
                document.querySelector(".contenido-catalogo").innerHTML = res;
        });
    }
}

buscar('',"1");