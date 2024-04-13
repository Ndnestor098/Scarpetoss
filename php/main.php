<?php
    class Scarpetoss{

        //Insertar en la base de datos usuario
        function setSQL($query){
            $pdo = new PDO("mysql:host=localhost;dbname=Scarpetoss;charset = UTF-8",'root', '');

            $pdo->query($query);
            $pdo = null;
        }
        function getUserEmail($email){
            $pdo = new PDO("mysql:host=localhost;dbname=Scarpetoss;charset = UTF-8",'root', '');

            $pdo = $pdo->query("SELECT users_email FROM users WHERE users_email = '$email'");

            if($pdo->rowCount() > 0){
                $pdo = null;
                return 'Correo email ya existente';
            }
        }
        function getUserAll($email){
            $pdo = new PDO("mysql:host=localhost;dbname=Scarpetoss;charset = UTF-8",'root', '');

            $pdo = $pdo->query("SELECT * FROM users WHERE users_email = '$email'");

            foreach($pdo as $row){
                $pdo = null;
                return array($row['users_ID'], $row['users_name'], $row['users_email'], $row['users_key']);
            }
            
        }
        function getUser($email, $key){
            $pdo = new PDO("mysql:host=localhost;dbname=Scarpetoss;charset = UTF-8",'root', '');

            $pdo = $pdo->query("SELECT users_email FROM users WHERE users_email = '$email' AND users_key = '$key'");

            if($pdo->rowCount() > 0){
                $pdo = null;
                return 'Correo email ya existente';
            }
        }

        //Verificacion de Email de usuario
        function verifyEmail($string){
            if(preg_match("/^(?=.{1,254}$)[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}(?:\.[a-zA-Z]{2,})?$/",$string)){
                return true;
            }else{
                return false;
            }
        }

        //Verificacion de Clave de usuario
        function verifyKey($string){
            if(preg_match("/^(?=.*[a-zA-Z])^(?=.*\d)^(?=.*[^\s\w]).{8,}$/",$string)){
                return true;
            }else{
                return false;
            }
        }

        //Limpiar la los string contras las inyecciones
        function cleanString($string){
            //Limpiar espacios
            $string = trim($string);

            //Limpiar las barras invertidas
            $string = stripslashes($string);

            //Array de posibles ataques de inyeccion
            $array = ["<script>","</script>", "<script src", "<script type=", "SELECT * FROM". "DELETE FROM", "INSERT INTO", '==', ';','/',
            "DROP TABLE", 'DROP DATABASE', 'TRUNCATE TABLE', 'SHOW TABLE', 'SHOW DATABASE', '<?php', '?>', '--', '^', "<", '[',']', '::',
            'SELECT', 'FROM', 'DELATE', 'INSERT', 'DROP', 'TRUNCATE', "*"];
            
            //Limpieza de posibles ataques de inyeccion
            foreach($array as $x){
                $string = str_ireplace($x, "", $string);
            }

            //Limpiar espacios
            $string = trim($string);

            //Limpiar las barras invertidas
            $string = stripslashes($string);

            return $string;
        }

        //Renombrar imagenes
        function renameImage($string){
            $array = [' ', '/', '#', '-', '$', '.', ','];

            foreach($array as $x){
                $string = str_ireplace($x, "_", $string);
            }
            $string = $string.'_'.rand(0,100);

            return $string;
        }

        //Paginador
        function pageTable($page, $Npage, $url, $button){
            $table = '<nav class="pagination is-centered --bulma-scheme-main-l" role="navigation" aria-label="pagination">';

            //Creando los botones anterior
            if ($page <= 1) { 
                $table .= '<a class="pagination-previous is-disable" disabled>Anterior</a>
                            <ul class="pagination-list">';
            }else{
                $table .= '<a href="'.$url.($page-1).'" class="pagination-previous">Anterior</a>
                            <ul class="pagination-list">
                                <li><a href="'.$url.'1" class="pagination-link" aria-label="Goto page 1">1</a></li>
                                <li><span class="pagination-ellipsis">&hellip;</span></li>';
            }
        
            //Control de los botones
            $ci = 0;
            
            for($i=$page; $i<=$Npage; $i++){
                //Verificacion de los botones
                if($ci >= $button){
                    break;
                }

                //Creacion de los botones del centro del pagination
                if($page == $i){
                    $table .= '<li><a class="pagination-link is-current" aria-label="Page '.$i.'" aria-current="page">'.$i.'</a></li>';
                }else{
                    $table .= '<li><a href="'.$url.$i.'" class="pagination-link" aria-label="Goto page '.$i.'">'.$i.'</a></li>';
                }

                $ci++;
            }

            //Creando los botones Siguiente
            if ($page == $Npage) {
                $table .= '</ul><a class="pagination-next is-disable" disabled>Siguiente</a>';
            }else{
                $table .= '<li><span class="pagination-ellipsis">&hellip;</span></li>
                            <li><a href="'.$url.$Npage.'" class="pagination-link" aria-label="Goto page '.$Npage.'">'.$Npage.'</a></li>
                            </ul>
                            <a href="'.$url.($page+1).'" class="pagination-next">Siguiente</a>';
            }

            $table .= '</nav>';

            return $table;
        }

        //Guardar informacion en las cookies
        function session($id, $name, $email){
            session_name("LOGIN");
            session_start(); 

            $_SESSION["session_active"] = "yes";//Asi se crean las variables de sesion.
            $_SESSION["Name"] = $name;
            $_SESSION["email"] = $email;
            $_SESSION["ugid"] = $id;
        }

        //Extraer todos los datos de los productos de la base de datos a base de query
        function getProductSQL($query){
            $pdo = new PDO("mysql:host=localhost;dbname=Scarpetoss;charset = UTF-8",'root', '');
            $pdo = $pdo->query($query);
            $data = array(); 

            foreach($pdo as $row){
                array_push($data, array(
                    "producto_ID"=>$row['producto_ID'],
                    "producto_name"=>$row['producto_name'],
                    "producto_price"=>$row['producto_price'],
                    "producto_genero"=>$row['producto_genero'],
                    "producto_descripcion"=>$row['producto_descripcion'],
                    "producto_imageP"=>$row['producto_imageP'],
                    "producto_imageR"=>$row['producto_imageR'],
                    "producto_stock"=>$row['producto_stock'],
                    "producto_proveedor"=>$row['producto_proveedor'],
                    "category_ID"=>$row['category_ID'],
                    "size_ID"=>$row['size_ID'],
                ));
            }

            $pdo = null;
            return $data;
        }

        //Extraer los datos de los productos de la base de datos que se van a usar en el sliders
        function getProductCount($query){
            $pdo = new PDO("mysql:host=localhost;dbname=Scarpetoss;charset = UTF-8",'root', '');
            $pdo = $pdo->query($query);
            $data = array(); 

            foreach($pdo as $row){
                $data = $row['cuenta'];
            }

            $pdo = null;
            return $data;
        }

    } 