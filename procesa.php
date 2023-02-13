<?php
    $proceso = false;
    if(isset($_POST["oc_Control"])){

        //procesa los datos generales del archivo recibido.
		$archivo = $_FILES["txtArchi"]["tmp_name"];
		$tamanio = $_FILES["txtArchi"]["size"];
		$tipo    = $_FILES["txtArchi"]["type"];
        $nombre  = $_FILES["txtArchi"]["name"];
        //
        $archivo2 = $_FILES["txtArchi2"]["tmp_name"];
		$tamanio2 = $_FILES["txtArchi2"]["size"];
		$tipo2    = $_FILES["txtArchi2"]["type"];
        $nombre2  = $_FILES["txtArchi2"]["name"];
        $caract = $_POST['caracter'];
        $caract2 = $_POST['caracter'];
        $enca = $_POST['yn'];
        //valida que
        if($tamanio > 0){
            //procesa el contenido del archivo recibido.
            $archi = fopen($archivo, "rb");
            $archi2 = fopen($archivo2, "rb");

            switch ($enca) 
            {
                case 'Y':
                    $encabezados = explode($caract,fgets($archi));
                    $encabezados2 = explode($caract,fgets($archi));
                    break;
                case 'N':
                    //$encabezados = explode($caract,fgets($archi));
                    $encabezados = array();
                    $encabezados2 = array();
                    //$posi2 = sizeof(explode($caract,fgets($archi)));
                    break;
            }
            $contenido = array();
            $posi = 0;
            while($linea = fgets($archi)){
                $contenido[$posi++] = explode($caract,$linea);
            }
            $contenido2 = array();
            $posi3 = 0;
            while($linea2 = fgets($archi2)){
                $contenido2[$posi3++] = explode($caract2,$linea2);
            }
            //funcion que me permite leer la cantidad de filas
            //genera un encabezado automatico
            $posi2 = count($contenido[0]);
            for($i=0; $i<$posi2; $i++)
            {
                $encabezados["titulo-($i)"] = $i;
            }
            $posi4 = count($contenido2[0]);
            for($i=0; $i<$posi4; $i++)
            {
                $encabezados2["titulo-($i)"] = $i;
            }
            //cierra el archivo.
            $observaciones= sizeof($contenido);
            $observaciones2= sizeof($contenido2);

            //cambia el estado del proceso.
            $proceso = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php
		include_once("segmentos/encabe.inc");
	?>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <title>Proceso de datos</title>
</head>
<body class="container">
	<header class="row">
		<?php
			include_once("segmentos/menu.inc");
		?>
	</header>

	<main class="row">
		<div class="linea_sep">
            <h3>Procesando archivo.</h3>
            <br>
            <?php
                if(!$proceso){
                    //En caso que el archivo .csv no pudiese ser procesado
                    echo '<div class="alert alert-danger" role="alert">';
                    echo '  El archivo no puede ser procesado, verifique sus datos.....!';
                    echo '</div>';
                }else{
                    //En caso que el archivo .csv pudiese ser procesado
                    echo "<h4>Datos Generales.</h4>";

                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";
                    echo "      <td>Archivo</td><td>tipo</td><td>Peso</td><td>Observaciones</td>";
                    echo "  </tr>";
                    echo "      <td>.$nombre.</td><td>".$tipo."</td><td>".number_format((($tamanio)/1024)/1024,2,'.',',')." MBs</td> <td>".$observaciones."</td>";
                    
                    echo "  <tr>";
                    echo "      <td>.$nombre2.</td><td>".$tipo2."</td><td>".number_format((($tamanio2)/1024)/1024,2,'.',',')." MBs</td> <td>".$observaciones2."</td>";
                    echo "  </tr>";
                    echo "  <tr>";
                    echo "  </tr>";
                    echo "</table>";

                    
                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";

                    echo "<br>";
                    echo "<h4>Estructura.</h4>";
                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";
                    echo "<h4>Estructura.</h4>";
                    foreach($encabezados as $titulo){
                        echo "<td>".$titulo."</td>";
                    }

                    echo "  </tr><tr>";
                    
                    foreach($contenido[1] as $datos){
                        switch (true) 
                        {
                            case 'string':
                                echo "<td>Cadena</td>";
                            break;
                            case is_bool($dato):
                                echo "<td>Booleano</td>";
                            break;
                            case is_float($datos):
                                echo "<td>Float</td>";
                            break;
                        }
                    }
                    echo "<tbody></table>";
                    
                    echo "<tbody></table>";
                    echo "<br>";
                    
                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";
                    echo "  </tr><tr>";
                    foreach($encabezados2 as $titulo2){
                        echo "<td>".$titulo2."</td>";
                    }
                    echo "  </tr><tr>";
                    foreach($contenido2[1] as $datos){
                        switch (true) 
                        {
                            case 'string':
                                echo "<td>Cadena</td>";
                            break;
                            case is_bool($dato):
                                echo "<td>Booleano</td>";
                            break;
                            case is_float($datos):
                                echo "<td>Float</td>";
                            break;
                        }
                    }
                    echo "</tr></thead><tbody>";
                    echo "<tbody></table>";

                    echo "<h4>Tabla 1.</h4>";
                    $contador = 0;
                foreach ($contenido as $value) 
                {
                    switch ($contador) 
                    {
                        case 0:
                            $contenido11 = $value;
                                break;
                        case 1:
                            $contenido12 = $value;
                            break;
                        case 2:
                            $contenido13 = $value;
                            break;
                        case 3:
                            $contenido14 = $value;
                            break;
                        case 4:
                            $contenido15 = $value;
                            break;
                        case 5:
                            $contenido16 = $value;
                            break;
                        case 6:
                            $contenido17 = $value;
                            break;
                        case 7:
                            $contenido18 = $value;
                            break;
                        case 8:
                            $contenido19 = $value;
                            break;
                        case 9:
                            $contenido20 = $value;
                            break;
                    }
                    ++$contador;
                }

    // se intentan leer las tablas para presentar info
    echo "<table>";  
    for ($i=0; $i<count($contenido11);++$i) {
        echo "<tr>";
        echo "<td>";
            echo $contenido11[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido12[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido13[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido14[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido15[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido16[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido17[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido18[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido19[$i];
        echo "</td>";
        echo "<td>";
            echo $contenido20[$i];
        echo "</td>";
        
    }


    echo "<h4>Tabla 2.</h4>";
    echo "</table>";
    $contador2 = 0;
    foreach ($contenido2 as $value) {
        switch ($contador2) {
             case 0:
                 $contenido111 = $value;
                 break;
             case 1:
                 $contenido121 = $value;
                 break;
             case 2:
                 $contenido131 = $value;
                 break;
             case 3:
                 $contenido141 = $value;
                 break;
             case 4:
                 $contenido151 = $value;
                 break;
             case 5:
                 $contenido161 = $value;
                 break;
             case 6:
                 $contenido171 = $value;
                 break;
             case 7:
                 $contenido181 = $value;
                 break;
             case 8:
                 $contenido191 = $value;
                 break;
             case 9:
                 $contenido201 = $value;
                 break;
             
         }
         ++$contador2;
    }
 
     echo "<table>";  
     for ($i=0; $i<count($contenido111);++$i) {
         echo "<tr>";
         echo "<td>";
             echo $contenido111[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido121[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido131[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido141[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido151[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido161[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido171[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido181[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido191[$i];
         echo "</td>";
         echo "<td>";
             echo $contenido201[$i];
         echo "</td>";
         
     }
     echo "</table>";
                    

                }//fin del else (solo si el archivo fue procesado)
            ?>
		</div>
	</main>

	<footer class="row pie">
		<?php
			include_once("segmentos/pie.inc");
		?>
	</footer>

	<!-- jQuery necesario para los efectos de bootstrap -->
    <script src="formatos/bootstrap/js/jquery-1.11.3.min.js"></script>
    <script src="formatos/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#tblDatos').dataTable({
                "language":{
                    "url": "dataTables.Spanish.lang"
                }
            });
        });
    </script>
</body>
</html>










