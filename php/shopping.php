<?php
require "./main.php";

$_POST = json_decode(file_get_contents('php://input'),true);

// echo $_POST['true'];
if($_POST['true'] == '1'){
    $query = 'SELECT * FROM productos WHERE producto_name != "" ';
    $class = new Scarpetoss();

    if($_POST['query'] == 'DESCLetra'){
        $query .= 'ORDER BY producto_name DESC';

    }else if($_POST['query'] == 'ASCLetra'){
        $query .= 'ORDER BY producto_name ASC';

    }else if($_POST['query'] == 'ASCPrecio'){
        $query .= 'ORDER BY producto_price ASC';

    }else if($_POST['query'] == 'DESCPrecio'){
        $query .= 'ORDER BY producto_price DESC';
    
    }else if($_POST['query'] == 'hombre'){
        $query .= 'AND producto_genero = "hombre"';
    
    }else if($_POST['query'] == 'mujer'){
        $query .= 'AND producto_genero = "mujer"';
    
    }else if($_POST['query'] == 'niño'){
        $query .= 'AND producto_genero = "niño"';
    
    }else if($_POST['query'] == 'unisex'){
        $query .= 'AND producto_genero = "unisex"';
    }

    $data = $class->getProductSQL($query);
}else if($_POST['true'] == '2'){
    $query = 'SELECT * FROM productos WHERE producto_name != "" ';
    $class = new Scarpetoss();
    $query2 = $_POST['query2'];

    if($_POST['query'] == 'DESCLetra'){
        $query .= "AND producto_genero = '$query2' ORDER BY producto_name DESC";

    }else if($_POST['query'] == 'ASCLetra'){
        $query .= "AND producto_genero = '$query2' ORDER BY producto_name ASC";

    }else if($_POST['query'] == 'ASCPrecio'){
        $query .= "AND producto_genero = '$query2' ORDER BY producto_price ASC";

    }else if($_POST['query'] == 'DESCPrecio'){
        $query .= "AND producto_genero = '$query2' ORDER BY producto_price DESC";
    
    }else if($_POST['query'] == 'hombre'){
        $query .= "AND producto_genero = 'hombre' AND producto_genero = '$query2";
    
    }else if($_POST['query'] == 'mujer'){
        $query .= "AND producto_genero = 'mujer' AND producto_genero = '$query2";
    
    }else if($_POST['query'] == 'niño'){
        $query .= "AND producto_genero = 'niño' AND producto_genero = '$query2";
    
    }else if($_POST['query'] == 'unisex'){
        $query .= "AND producto_genero = 'unisex' AND producto_genero = '$query2";
    }

    $data = $class->getProductSQL($query);
}

foreach ($data as $x) {
?>

<a href="/producto.php?scarpe=<?php echo $x["producto_name"]; ?>"><div class="producto-carrusel">
    <div class="image-producto">
        <img src='<?php echo $x["producto_imageP"]; ?>' alt="Zapato">
    </div>

    <div class="informacion-producto">
        <div class="title-producto"><?php echo $x["producto_name"]; ?></div>
        <div class="precio-producto">$<?php echo number_format($x["producto_price"], 2, '.', ','); ?></div>
        <button onclick="contar(<?php echo $x['producto_ID']; ?>) ">Añadir al Carrito</button>
    </div>
</div></a>

<?php } exit();?>