<?php
/**
 * PROBLEM Liu-Laylanda
 *
 *<p>WPROWADZANIE INSTANCJI PROBLEMU.<p>
 * 
 * @author      Patryk Kaczmarek & Szymon Marcinkowski
 * @copyright   Metody Optymalizacji 2015
 * @link        http://www.kaaczmar.pl/Liu-Layland
 * @package		Liu-Layland
 */
 
?>

<!DOCTYPE HTML> 
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Metody Optymalizacji</title>
	<meta name="description" content="Metody Optymalizacji" />
    <meta name="keywords" content="metody, optymalizacji, kaczmarek, marcinkowski" />
	<meta name="Author" content="Kaczmar"/>
	<meta name="copyright" content="Copyright (c) Kaczmarek & Marcinkowski"/>

	
	<link rel="stylesheet" type="text/css" href="css/style_css.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	

	  
</head> 

<body>
<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><strong>METODY OPTYMALIZACJI</strong></h1>
					<ul>
						<li><a href="index.php"  class="current">Wprowadzenie instancji problemu</a></li>
						<li><bb>Uzupełnianie formularza</bb></li>
						<li><bb>Wyniki działania algorytmu</bb></li>

					</ul>
				</div>
			</div>
		</nav>
		
	</header>
	<div id="kontener">
	
		

	<div id="kontener-start">
		<div id="start-tresc">
		<center>
		PROBLEM SZEREGOWANIA ZADAŃ PROBLEM LIU - LAYLANDA<br><br>
		Wprowadź dane za pomocą formularzy<br><br>
		<a href="documentation/index.html" target=_blank>PRZEJDŹ DO DOKUMETACJI</a><br><br>
				<?php


						echo"<form action='index-2.php' method='post' id='contactform'>";
						echo"<fieldset>";
						echo"<legend><strong>Podaj ilość zadań</strong></legend>";
						echo "<br>";
						echo" <label>LICZBA ZADAŃ:</label><br>";
						echo"<input type='number' id='liczba_zadan' name='liczba_zadan' placeholder='liczba zadań' required='required' min='1' max='10' autocomplete='off'/><br><br>"; 
						echo"<input type='submit' value='Dalej' id='send1' name='send1' />";
						echo"<br><br>";
						echo"</fieldset>";
						echo"</form>";

				?>
				<br>

											
				
		</center>
		</div>
	</div>
		
		
		
		<div id="stopka">		
		<div id="stopkaL"><p>Metody Optymalizacji &copy; 2015</p></div>
		<div id="stopkaR"><p><strong>created by Patryk Kaczmarek & Szymon Marcinkowski</strong></div>		
		</div>
	
	
	</div>

</body>
</html>