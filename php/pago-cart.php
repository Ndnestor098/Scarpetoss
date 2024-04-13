<?php
require_once "./main.php";

$_POST = json_decode(file_get_contents('php://input'),true);

$_POST['AlmacenCarrito'] = explode(',', $_POST['AlmacenCarrito']);

if($_POST['AlmacenCarrito'][0] != ''){
    $class = new Scarpetoss();
    $precio = 0;
    
    foreach ($_POST['AlmacenCarrito'] as $x) {
        $data = $class->getProductSQL("SELECT * FROM productos WHERE producto_ID = $x");
    
        $precio += $data[0]["producto_price"];
    }
?>
    <div class="title-pago">
        <p>Resumen</p>
    </div>
    <div class="resumen-pago">
        <div>
            <p>Valor de productos</p>
            <p>Entrega</p>
        </div>
        <div style="text-align:end;">
            <p style="font-size: 17px;font-weight: 500;color: #435334;">$<?php echo number_format($precio, 2, '.', ',') ?></p>
            <p>Seleccione la entrega y el pago</p>
        </div>
    </div>
        <div class="iva">
            <div>
            <p>A pagar (IVA incluido)</p>
        </div>
        <div style="text-align:end;">
            <p style="font-size: 17px;font-weight: 500;color: #435334;">$<?php echo number_format($precio, 2, '.', ',') ?></p>
        </div>
    </div>
    <div class="button-pagar">
        <a href="#"><span>IR A LA CAJA</span></a>
    </div>

<?php } else { ?> 

    <style>.area-pago{background-color: #fff !important;}</style>
        <div class="button-pagar">
        <a href="/shopping.php" style="padding: 0px 100px;"><span>IR A COMPRAR</span></a>
    </div>
    
<?php }?>