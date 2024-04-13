<?php
require_once "./main.php";

$_POST = json_decode(file_get_contents('php://input'),true);

$_POST['AlmacenCarrito'] = explode(',', $_POST['AlmacenCarrito']);



if($_POST['AlmacenCarrito'][0] != ''){
    $class = new Scarpetoss();
?>

<?php foreach ($_POST['AlmacenCarrito'] as $x) {$data = $class->getProductSQL("SELECT * FROM productos WHERE producto_ID = $x");?>
    <div class="producto">
        <div class="img-producto">
            <img src="<?php echo $data[0]['producto_imageP'] ?>" alt="zapatos">
        </div>
        <div class="info-producto">
            <a href="/producto.php?scarpe=<?php echo $data[0]["producto_name"]; ?>"><div class="title-producto">
                <h5><?php echo $data[0]['producto_proveedor'] ?></h5>
                <p><?php echo $data[0]['producto_name'] ?></p>
            </div></a>
            <div class="descripcion-producto">
                <p>Cantidad: 1</p>
            </div>
            <div class="opciones">
                <i class="fa-solid fa-trash" style="display:flex;gap:10px;" onclick="<?php echo 'delated(`'.$data[0]["producto_ID"].'`)'; ?>"><p>Eliminar</p></i>
            </div>
        </div>
        <div class="precio-producto">
            <p>$<?php echo number_format($data[0]["producto_price"], 2, '.', ',') ?></p>
        </div>
    </div>
<?php }} else {?> 

    <div class="producto-vacio">
        <p class="title">Tu carrito de compra está vacío</p>
        <p>Añade productos al carrito de compra</p>
    </div>

<?php }?>