<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $valor = $_GET['valor'];
    //echo "la opcion seleccionada es: =" . $valor;
    $baki = ["Baki the grappler", "1991", "Baki Hanma", "Martial arts anime, the main actor is Baki Hanma"];
    $kengan = ["Kengan ashura", "2019", "Ohma Tokita", "Martial arts anime, the main actor is Ohma Tokita"];
    $ken = ["Kenichi", "2002", "Kenichi Shirahama", "Martial arts anime, the main actor is Kenichi shirahama"];
    $kara = ["Karate Shokoshi", "2012", "Minoru Kohinata", "Martial arts anime, the main actor is Minoru Kohinata"];

// $productos = array( 
// 		array( '<img src=anime1.JPG height="400px" width="300px">', 'Equipo y programas para diseñadores', 'hhhhh' ),
// 		array( '1', 'Simbolo universal para Internet', 'hhh' ),
// 		array( '1', 'Simbolo de quipo de computo', 'hhhh' ),
// 		array( '1', 'Programa Ofimatico para empresas', 'hhhh' ),
//         array( '1', 'Sistema operativo GNU/Linux', 'hhhh' ) );

    switch($valor)
    {
        case "cien":
            //echo '<table>';
			//for ( $fila = 0; $fila < 5; $fila++ ) {
				//echo '<tr>';
				//for ( $colu = 0; $colu < 3; $colu++ ) {
				//	echo '<td>';
				//	if ( $colu != 1 && $fila!=1 ) {
				//		echo $productos[ $fila ][ $colu ];
				//	}
                //    elseif($colu == 1 && $fila==1){
				//	echo '<img src="' . $productos[ $fila ][ $colu ] . '" width="150" //height="150" />';
				//	};
				//	echo '</td>';
				//}
				//echo '</tr>';
			//}
			//echo '</table>';
            echo "<table style='margin-left:250px'>";
            echo "<tr>";
            echo "<td rowspan='5'> <img src='anime1.JPG' height='400px' width='300px'> </td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> serie</th> ";
            echo "<td> $baki[0]</td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> year</th> ";
            echo "<td> $baki[1]</td> ";
            echo "</tr>";
            echo "<th> Actor</th> ";
            echo "<td> $baki[2]</td> ";
            echo "</tr>";
            echo "<th style='margin-left:10px'> Observations</th> ";
            echo "<td> $baki[3]</td> ";
            echo "</tr>";
            echo "</table>";
        break;

        case "doscien":
            echo "<table style='margin-left:250px'>";
            echo "<tr>";
            echo "<td rowspan='5'> <img src='anime2.JPG' height='400px' width='300px'> </td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> serie</th> ";
            echo "<td> $kengan[0]</td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> year</th> ";
            echo "<td> $kengan[1]</td> ";
            echo "</tr>";
            echo "<th> Actor</th> ";
            echo "<td> $kengan[2]</td> ";
            echo "</tr>";
            echo "<th style='margin-left:10px'> Observations</th> ";
            echo "<td> $kengan[3]</td> ";
            echo "</tr>";
            echo "</table>";
        break;

        case "trescien":
            echo "<table style='margin-left:250px'>";
            echo "<tr>";
            echo "<td rowspan='5'> <img src='anime3.JPG' height='400px' width='300px'> </td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> serie</th> ";
            echo "<td> $ken[0]</td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> year</th> ";
            echo "<td> $ken[1]</td> ";
            echo "</tr>";
            echo "<th> Actor</th> ";
            echo "<td> $ken[2]</td> ";
            echo "</tr>";
            echo "<th style='margin-left:10px'> Observations</th> ";
            echo "<td> $ken[3]</td> ";
            echo "</tr>";
            echo "</table>";
        break;

        case "cuatrocien":
            echo "<table style='margin-left:250px'>";
            echo "<tr>";
            echo "<td rowspan='5'> <img src='anime4.JPG' height='400px' width='300px'> </td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> serie</th> ";
            echo "<td> $kara[0]</td> ";
            echo "</tr>";
            echo "<tr>";
            echo "<th> year</th> ";
            echo "<td> $kara[1]</td> ";
            echo "</tr>";
            echo "<th> Actor</th> ";
            echo "<td> $kara[2]</td> ";
            echo "</tr>";
            echo "<th style='margin-left:10px'> Observations</th> ";
            echo "<td> $kara[3]</td> ";
            echo "</tr>";
            echo "</table>";
        break;

    }
    ?>

</body>
</html>