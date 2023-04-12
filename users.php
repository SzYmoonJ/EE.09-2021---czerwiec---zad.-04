<html>
<head>
	<meta charset="utf-8" />
	<title>Panel administratora</title>
	<link  href="styl4.css" rel="stylesheet" />
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
			$con-> close();
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
			<?php
			
			echo '<button type="submit">ZOBACZ</button>'
			?>
		</form>
	</div>
	<footer>
		<p>Stronę wykonał: xxxxxxxxSJ</p>
	</footer>
</body>
</html>