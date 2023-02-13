<!DOCTYPE html>
<html lang="en">
<head>	
    <?php
        include_once("segmentos/encabe.inc");        
	?>
    
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">
        var datos = $.ajax({
            url:'datos.php',
            type:'post',
            dataType:'json',
            async:false
        }).responseText;

        datos = JSON.parse(datos);

        google.load("visualization", "1", {packages:["corechart"]});

        google.setOnLoadCallback(creaGrafico);

        function creaGrafico() {
            var data = google.visualization.arrayToDataTable(datos);
        
            var opciones = {
                title: 'Votos Gay y Transgenero',
                hAxis: {title: 'MESES', titleTextStyle: {color: 'green'}},
                vAxis: {title: 'Encuestados', titleTextStyle: {color: '#FF0000'}},
                backgroundColor:'#ffffcc',
                legend:{position: 'bottom', textStyle: {color: 'blue', fontSize: 13}},
                width:900,
                height:500
            };

            var grafico = new google.visualization.ColumnChart(document.getElementById('grafica'));
            grafico.draw(data, opciones);
}
    </script> 
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <script type="text/javascript">
        var datos2 = $.ajax2({
            url2:'datos2.php',
            type2:'post',
            dataType2:'json',
            async:false
        }).responseText;

        datos2 = JSON.parse(datos2);

        google.load("visualization", "1", {packages:["corechart"]});

        google.setOnLoadCallback(creaGrafico2);

        function creaGrafico2() {
            var data2 = google.visualization.arrayToDataTable(datos2);
        
            var opciones2 = {
                title2: 'INTENSION DE VOTOS',
                hAxis2: {title: 'MESES2', titleTextStyle: {color: 'green'}},
                vAxis2: {title: 'Encuestados2', titleTextStyle: {color: '#FF0000'}},
                backgroundColor2:'#ffffcc',
                legend2:{position: 'bottom', textStyle: {color: 'blue', fontSize: 13}},
                width:900,
                height:500
            };

            var grafico2 = new google.visualization.ColumnChart(document.getElementById('grafica2'));
            grafico2.draw(data2, opciones2);
}

    </script>  
</head>
<body class="container">
	<header class="row">
		<?php
			include_once("segmentos/menu.inc");
		?>
	</header>

	<main class="row">
		<div class="linea_sep">
            <div id="grafica"> </div>
		</div>
	</main>
    <main class="row">
		<div class="linea_sep">
            <div id="grafica2"> </div>
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
</body>
</html>
