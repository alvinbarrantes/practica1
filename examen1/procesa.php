<?php
    $proceso = false;
    if(isset($_POST["oc_Control"])){

        //procesa los datos generales del archivo recibido.
		$archivo = $_FILES["txtArchi"]["tmp_name"];
		$tamanio = $_FILES["txtArchi"]["size"];
		$tipo    = $_FILES["txtArchi"]["type"];
        $nombre  = $_FILES["txtArchi"]["name"];
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

                    echo "<br>";
                    echo "<h4>Estructura.</h4>";
                    echo "<table class='table table-bordered table-hover'>";
                    echo "  <tr>";
                    echo "  </tr><tr>";
                    foreach($encabezados2 as $titulo2){
                        echo "<td>".$titulo2."</td>";
                    }

                    echo "  </tr><tr>";
                    
                    foreach($contenido2[1] as $datos2){
                        switch (true) 
                        {
                            case gettype($datos2):
                                echo "<td>".gettype($datos2)."</td>";
                            break;
                            case 'string':
                                echo "<td>Cadena</td>";
                            break;
                            case is_bool():
                                echo "<td>Booleano</td>";
                            break;
                            case is_float($datos2):
                                echo "<td>Float</td>";
                            break;
                        }
                    }
                    echo "<tbody></table>";

                    
                    

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










