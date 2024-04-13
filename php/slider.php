<?php
require_once("./php/main.php");


$data = new Scarpetoss();

$data = $data->getProductSQL("SELECT * FROM productos LIMIT 8");
?>

        <div class="carrusel">
            <div class="carrusel-content">
                <?php  foreach ($data as $x) { ?>
                    <a href="/producto.php?scarpe=<?php echo $x["producto_name"]; ?>"><div class="producto-carrusel">
                    <div class="image-producto">
                        <img src="<?php echo $x["producto_imageP"]; ?>" alt="Zapato">
                    </div>

                    <div class="informacion-producto">
                        <div class="title-producto"><?php echo $x["producto_name"]; ?></div>
                        <div class="precio-producto">$<?php echo number_format($x["producto_price"], 2, '.', ','); ?></div>
                        <button onclick="<?php echo 'contar('.$x["producto_ID"].')'; ?>">Añadir al Carrito</button>
                    </div>
                </div></a>
                <?php  }  ?>

                <div class="arrow">
                    <button class="left" onclick="sliderLeft()"><</button>
                    <button class="right" onclick="sliderRigth()">></button>
                </div>
            </div>
        </div> 
