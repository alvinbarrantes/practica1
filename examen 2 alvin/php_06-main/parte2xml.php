<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<title>parte 2</title>
	</head>
	<body style="background-color: #FFFFCC; color: #800000">
		<img src="imagenes/encabe.png" alt="" >
		<h2>10 films mas rentados</h2>

		<?php
			//obtiene raiz del sitio
            $ruta = $_SERVER["DOCUMENT_ROOT"]."/php_06-main/";

			//Hablitia conexion con el motor de MySql.
      		include_once("codigos/conexion2.inc");

			//define consulta
			$AuxSql =  "SELECT f.film_id AS codigo_pelicula, f.title AS titulo_pelicula, COUNT(*) AS veces_alquilada, SUM(p.amount) AS total_generado
			FROM rental r
			INNER JOIN inventory i ON r.inventory_id = i.inventory_id
			INNER JOIN film f ON i.film_id = f.film_id
			INNER JOIN payment p ON r.rental_id = p.rental_id
			WHERE r.rental_date BETWEEN '1940-01-01' AND '2010-03-30'
			GROUP BY f.film_id
			ORDER BY veces_alquilada DESC
			LIMIT 10;";
		
			$Regis = mysqli_query($conex, $AuxSql) or die(mysqli_error($conex));
			//crea vector de datos
			$i = 0;
			while($fila = mysqli_fetch_array($Regis)){
				$codigo[$i] = $fila["codigo_pelicula"];
				$nombre[$i] = $fila["titulo_pelicula"];

				$codpro[$i] = $fila["veces_alquilada"];
				$nompro[$i] = $fila["total_generado"];
				$i++;
			}

			//libera espacio de la consulta
			mysqli_free_result($Regis);

			//impresion de los datos (solo prueba)
			$canti = sizeof($codigo);
			$cate = "";
			for($j=0; $j < $canti; $j++){
			    if($cate != $codigo[$j]){
					print("------------------------------------------------------------------------<br>");
					printf("codigo y nombre del film: %s - %s<br>", ($codigo[$j]),($nombre[$j]));
					print("------------------------------------------------------------------------<br>");
					$cate = $codigo[$j];
				}
				printf("cuantes veces fue alquilado y total generado: %s - %s<br>", ($codpro[$j]),($nompro[$j]));

			}
			print("<br>");

			//creacion del documento xml
			$xml = "<?xml version='1.0' encoding='utf-8' ?>";
			$xml .= "<informacion>";
			$xml .= "   <generalidades>";
			$xml .= "      <empresa>";
			$xml .= "         <nombre>Univesidad Técnica Nacional</nombre>";
			$xml .= "         <carrera>Tecnologías de la Información</carrera>";
			$xml .= "         <curso>Tecnologías y Sistemas Web2</curso>";
			$xml .= "      </empresa>";
			$xml .= "      <profesor>";
			$xml .= "         <nombre>Jorge Ruiz</nombre>";
			$xml .= "         <experiencia>Profesor en programación desde 1993</experiencia>";
			$xml .= "      </profesor>";
			$xml .= "   </generalidades>";
			$xml .= "   <clasificacion>";

			$cate = $codigo[0];
			$Datos[0] = '<categoria>
		                    <codigo>'.$codigo[0].'</codigo>
		                    <nombre>'.($nombre[0]).'</nombre>';
			for($j=0; $j < $canti; $j++){
				if($cate != $codigo[$j]){
					if(isset($Datos[$j])){
						$Datos[$j] .= '</categoria>';
					}else{
						$Datos[$j] = '</categoria>';
					}

					$Datos[$j] .= '<categoria>
		                              <codigo>'.$codigo[$j].'</codigo>
		                              <nombre>'.($nombre[$j]).'</nombre>';

					$cate = $codigo[$j];
				}


				if(isset($Datos[$j])){
			    	$Datos[$j] .= '<articulos>';
			    }else{
			    	$Datos[$j] = '<articulos>';
			    }

			    if(isset($Datos[$j])){
					$Datos[$j] .= '<codart>'.$codpro[$j].'</codart><nomart>'.($nompro[$j]).'</nomart>';
				}else{
					$Datos[$j] = '<codart>'.$codpro[$j].'</codart><nomart>'.($nompro[$j]).'</nomart>';
				}
                $Datos[$j] .= '</articulos>';


		        $xml = $xml.$Datos[$j];
			}//fin del for

			$xml .= "      </categoria>";
			$xml .= "   </clasificacion>";
			$xml .= "</informacion>";

			//escribir archivo xml
			$ruta = $ruta."generales_5.xml";

			try{
				$archivo = fopen($ruta,"w+");
				fwrite($archivo,$xml);
				fclose($archivo);
			}catch(Exception $e){
				echo "Error:..".$e->getMessage();
			}
		?>

		<a href="generales_5.xml">XML Generado</a>

	</body>
</html>
