<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Conversor de Monedas</title>
</head>
<body>
<header align="center">
	<h1>Conversor de Monedas</h1>
	<img src="icons/divisa.png" width="150px" height="150px">
</header>
<section>
	<article>
		<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" align = "center">
			<h1></h1>
			<input type="number" id="cantidad" name="cantidad" />
			<h1></h1>
			<table align="center">
				<td>
					<select name="monedao">
						<option value="1"> Dólar Estadounidense</option>
						<option value="0.88"> Euro</option>
						<option value="115.63"> Yen Japonés</option>
						<option value="0.74"> Libra Esterlina</option>
					</select>
					<img src="icons/revertir.png" width="20px" height="20px">
					<select name="monedac">
						<option value="1"> Dólar Estadounidense</option>
						<option value="0.88"> Euro</option>
						<option value="115.63"> Yen Japonés</option>
						<option value="0.74"> Libra Esterlina</option>
					</select>
				</td>
			</table>
			<h1></h1>
			<input type="submit" value="Convertir"/>
			<?php
				if($_POST){
					$cantidad=$_POST['cantidad'];
					$monedao=$_POST['monedao'];
					$monedac=$_POST['monedac'];
					$signo = "";
					$signof = "";
					
					if($cantidad<=0){
						echo "<h3>\nFavor ingresar un valor</h3>";
					}
					else{
						$convertido=$cantidad * $monedac / $monedao;

						switch ($monedao){
							case 1: $signo= "$"; 
							break;
							case 0.88: $signo = "€";
							break;
							case 115.63: $signo = "¥";
							break;
							case 0.74: $signo = "£";
							break;
						}
						switch ($monedac){
							case 1: $signof = "$";
							break;
							case 0.88: $signof = "€";
							break;
							case 115.63: $signof = "¥";
							break;
							case 0.74: $signof = "£";
							break;
						}

						echo "\n<h2> $cantidad $signo </h2>";
						echo "\n<h4> Equivale a </h2>";
						echo "\n<h2> ". round($convertido, 2) . " $signof </h2>";
					}

				}
			?>
		</form>
	</article>
</section>
</body>
</html>
