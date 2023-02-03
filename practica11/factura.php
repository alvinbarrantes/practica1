<!-- Oblig
Alvin Enrique Barrantes Alvarado -->
<!DOCTYPE html>
<html lang="en">
	<head>
	</head>
	<body>
    <META HTTP-EQUIV="REFRESH" CONTENT="10;URL=practica1.html">
	<?php
    //traigo los datos del captura por del menu 
    $User=$_POST['Usuario'];
    $plato=$_REQUEST['comida'];
    $extra=$_POST['extra'];
    $drink=$_POST['bebida'];
    $precio = 0;
    $precio2 = 0;
    $precio3 = 0;
    $iva = 15;
    //validacion de datos 
    switch ($plato) 
    {
        case "bis":
            $plato = "bistec_encebollado";
            $precio = 3500;
            break;
        case "cos":
            $plato = " Costilla de cerdo BBQ";
            $precio = 4500;
            break;
        case "fil":
            $plato = " Filet de pescado en salsa de camarones";
            $precio = 5000;
            break;
            case "mar":
                $plato = "Arroz mar y tierra especial";
                $precio = 5500;
                break;
    }

    switch ($extra) 
    {
        case "torti":
            $extra = "Tortillas";
            $precio2 = 500;
            break;
        case "ensa":
            $extra = " Ensalada";
            $precio2 = 1000;
            break;
        case "pure":
            $extra = " Pure de papa especial";
            $precio2 = 1500;
            break;
            case "aros":
                $extra = "Aros de cebolla";
                $precio = 500;
                break;
    }

    switch ($drink) 
    {
        case "ga":
            $drink = "Gaseosa";
            $precio3 = 1000;
            break;
        case "ag":
            $drink = "Agua";
            $precio3 = 1000;
            break;
        case "ca":
            $drink = "Cafe";
            $precio3 = 500;
            break;
            case "re":
                $drink = "Refresco natural ";
                $precio3 = 1100;
                break;
    }

    $subtotal = $precio + $precio2 + $precio3;
    $total_iva = $subtotal * ($iva / 100);

    date_default_timezone_set( 'America/Costa_Rica' );
			$fecha = date("d/M/Y" ); // fecha
			$hora = time(); // hora
    echo "<table>";
    echo "<tr>";
    echo "<td>Universidad Tecnica Nacional/</td>";
    echo "<td>/Factura</td>";
    echo "<td>/000001</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Sistema integrado de sodas universitaria/</td>";
    echo "<td>/Fecha</td>";
    echo "<td>$fecha</td><td>" ."<td>Hora</td><td>" .  strftime( '%H:%M:%S', $hora ) . "</td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <hr>
    <?php 
    echo "<table>";
    echo "<tr>";
    echo "<td>Cliente/</td>";
    echo "<td>/$User</td>";
    echo "<td>/Precio</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Plato fuerte/</td>";
    echo "<td>/$plato</td>";
    echo "<td>/$precio</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Acompanhamientos/</td>";
    echo "<td>/$extra</td>";
    echo "<td>/$precio2</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Bebidas/</td>";
    echo "<td>/$drink</td>";
    echo "<td>/$precio3</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Sub total/</td>";
    echo "<td>/</td>";
    echo "<td>/$subtotal</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>Impuestos/</td>";
    echo "<td>/IVA del 15%</td>";
    echo "<td>/$total_iva</td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <hr>
    <?php
        $total = $subtotal + $total_iva;
    echo "<table>";
    echo "<tr>";
    echo "<td>Total/</td>";
    echo "<td>/</td>";
    echo "<td>/$total</td>";
    echo "</tr>";
    echo "</table>";
    ?>
    <h2>Gracias</h2>
	</body>
</html>