<html>
<head>
	<meta charset="UTF-8"/>
	<title>Panel administratora</title>
	<link rel="stylesheet" href="styl4.css"/>
</head>
<body>
	<header>
		<h3>Portal Społecznośowy-panel administratora</h3>
	</header>
	<div class="leftpanel">
		<h4>Użytkownicy</h4>
		<?php
			$con = new mysqli("127.0.0.1", "root", "", "dane4");
			$q = 'SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM `osoby` LIMIT 30;';
			$res = $con -> query($q);
			$list = $res -> fetch_all(MYSQLI_ASSOC);
			for ($i=0; $i<count($list);$i++){
				$wiek = 2023-intval($list[$i]["rok_urodzenia"]);
				echo $list[$i]["id"].". ";
				echo $list[$i]["imie"]."&nbsp;";
				echo $list[$i]["nazwisko"].", ";
				echo $wiek." lat";
				echo "<br>";
			};
		?>
		<a href="settings.html">Inne ustawienia</a>
	</div>
	<div class="rightpanel">
		<h4>Podaj id użytkownika</h4>
		<form method="POST">
			<input name="ajdi" id="ajdi" type="number">
			<button type="submit">ZOBACZ</button>
		</form>
		<hr>
		<?php
		if (isset($_POST["ajdi"])){
			$q1 = 'SELECT osoby.id, imie, nazwisko, rok_urodzenia, opis, zdjecie, hobby.nazwa FROM `osoby` JOIN hobby ON Hobby_id=hobby.id WHERE osoby.id ="'.$_POST["ajdi"].'";';
			$res1 = $con -> query($q1);
			$re = $res1 -> fetch_all(MYSQLI_ASSOC);
			echo "<h2>".$re[0]["id"].". ".$re[0]["imie"]."&nbsp;".$re[0]["nazwisko"]."</h2> <br>";
			echo "<img src=".$re[0]["zdjecie"]." alt=".$re[0]["id"]."> <br>";
			echo "<p> Rok urodzenia: ".$re[0]["rok_urodzenia"]."</p>";
			echo "<p> Opis: ".$re[0]["opis"]."</p>";
			echo "<p> Hobby: ".$re[0]["nazwa"]."</p>";
			$con-> close();
		};
		?>
	</div>
	<footer>
		<p>Stronę wykonał: xxxxxxxxSJ</p>
	</footer>
</body>
</html>