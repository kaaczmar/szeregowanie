<?php
/**
 * PROBLEM SZEREGOWANIA
 *
 *<p>WPROWADZANIE INSTANCJI PROBLEMU ZA POSREDNICTWEM FORMULARZA</p>
 * 
 * @author      Patryk Kaczmarek & Szymon Marcinkowski
 * @copyright   Metody Optymalizacji 2015
 * @link        http://www.kaaczmar.pl/szeregowanie
 * @package		SZEREGOWANIE
 */

 require ("szeregowanie.php"); 
 $PRE = new szeregowanie; 
?>


<!DOCTYPE HTML> 
<html lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Metody Optymalizacji</title>
	<meta name="description" content="Metody Optymalizacji" />
    <meta name="keywords" content="wmetody, optymalizacji, kaczmarek, marcinkowski" />
	<meta name="Author" content="Kaczmar"/>
	<meta name="copyright" content="Copyright (c) Kaczmarek & Marcinkowski"/>

	
	<link rel="stylesheet" type="text/css" href="css/style_css.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<script type="text/javascript" src="script.js"></script>
	
	  
</head> 

<body>
<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><strong>METODY OPTYMALIZACJI</strong></h1>
					<ul>
						<li><a href="index.php">Wprowadzenie instancji problemu</a></li>
						<li><bb class="current">Uzupełnianie formularza</bb></li>
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
				
				<?php
				
						
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//// obsługa formularza dodawania NAZWY STANU i LICZBY POPULACJI
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
					if ( isset($_POST["send1"]) ) 
						{
															
						$sprawdz= htmlspecialchars(trim($_POST['liczba_zadan']));
						
						
						// jeśli spełnione są warunki wyświetlany jest formularz
						
							if ( isset($_POST["REL"]) )
							{
								$ileBYLO = htmlspecialchars(trim($_POST['ILEB']));
								for($zz=0; $zz < $ileBYLO; $zz++)
											{
												$PRE->nazwa_zadan_c[$zz] = trim($_POST["nazwa_zadania_B$zz"]);    
												$PRE->czas_zadan_c[$zz] = trim($_POST["czas_zadania_B$zz"]);
												$PRE->okres_zadan_c[$zz] = trim($_POST["okres_zadania_B$zz"]);																		
													
											}
								
								echo "<form action='index-3.php' method='post' id='contactform' name='contactform'>";
									echo    "<fieldset>";
									echo    "<legend>Informacje o zadaniach do uszeregowania</legend>";
									echo"<br>";								
									echo "<table><tr><td>Lp.</td><td>Nazwa Zadania</td><td>Czas Zadania</td><td>Okres Zadania</td></tr>";
									$tmpILE = 0;
											 for ($zz=0; $zz<$ileBYLO; $zz++)
												{	
													echo"<tr><td><center>".($zz+1).".</center></td>";
													
														echo"<td><input type='text' id='nazwa_zadania$zz' name='nazwa_zadania$zz'  placeholder='nazwa zadania ".($zz+1)."' required='required' value='".$PRE->nazwa_zadan_c[$zz]."' autocomplete='off' /></td>";
														echo"<td><div><input type='number' id='czas_zadania$zz' name='czas_zadania$zz' min='1' placeholder='czas zadania ".($zz+1)."' required='required' value='".$PRE->czas_zadan_c[$zz]."' autocomplete='off'/></div></td>";														
														echo"<td><input type='number' id='okres_zadania$zz' name='okres_zadania$zz' min='1' placeholder='okres zadania ".($zz+1)."' required='required' value='".$PRE->okres_zadan_c[$zz]."' autocomplete='off'/></td></tr>";
													$tmpILE++;	
													
												}
												
												
												
												for ($zz=$tmpILE; $zz<$sprawdz; $zz++)
												{	
													echo"<tr><td><center>".($zz+1).".</center></td>";
													
														echo"<td><input type='text' id='nazwa_zadania$zz' name='nazwa_zadania$zz'  placeholder='nazwa zadania ".($zz+1)."' required='required' value='zadanie".($zz+1)."' autocomplete='off' /></td>";
														echo"<td><div><input type='number' id='czas_zadania$zz' name='czas_zadania$zz' min='1' placeholder='czas zadania ".($zz+1)."' required='required' autocomplete='off'/></div></td>";														
														echo"<td><input type='number' id='okres_zadania$zz' name='okres_zadania$zz' min='1' placeholder='okres zadania ".($zz+1)."' required='required' autocomplete='off'/></td></tr>";
														
													
												}
												
												
												
												
												
									echo "</table>";
									echo"<br>";
									echo"<div><input type='hidden' name='liczbaZ' id='liczbaZ' value='$sprawdz' /></div>";
									//echo"<input type='button' value='POWRÓT' id='back' name='back' />";
									echo"<input type='submit' value='DALEJ' id='send' name='send' />";
									echo"<br><br>";
									echo"<div class='blad' id='blad' style=\"color:yellow; font-size:x-large\" ></div>";
									echo"<br><br>";
									echo"</fieldset>";
									echo"</form>";
								
								
							
							}
							else
							{
				
									echo "<form action='index-3.php' method='post' id='contactform' name='contactform'>";
									echo    "<fieldset>";
									echo    "<legend>Informacje o zadaniach do uszeregowania</legend>";
									echo"<br>";								
									echo "<table><tr><td>Lp.</td><td>Nazwa Zadania</td><td>Czas Zadania</td><td>Okres Zadania</td></tr>";
									
											 for ($zz=0; $zz<$sprawdz; $zz++)
												{	
													echo"<tr><td><center>".($zz+1).".</center></td>";
													
														echo"<td><input type='text' id='nazwa_zadania$zz' name='nazwa_zadania$zz'  placeholder='nazwa zadania ".($zz+1)."' required='required' value='zadanie".($zz+1)."' autocomplete='off' /></td>";
														echo"<td><div><input type='number' id='czas_zadania$zz' name='czas_zadania$zz' min='1' placeholder='czas zadania ".($zz+1)."' required='required' autocomplete='off'/></div></td>";														
														echo"<td><input type='number' id='okres_zadania$zz' name='okres_zadania$zz' min='1' placeholder='okres zadania ".($zz+1)."' required='required' autocomplete='off'/></td></tr>";
														
													
												}
									echo "</table>";
									echo"<br>";
									echo"<div><input type='hidden' name='liczbaZ' id='liczbaZ' value='$sprawdz' /></div>";
									//echo"<input type='button' value='POWRÓT' id='back' name='back' />";
									echo"<input type='submit' value='DALEJ' id='send' name='send' />";
									echo"<br><br>";
									echo"<div class='blad' id='blad' style=\"color:yellow; font-size:x-large\" ></div>";
									echo"<br><br>";
									echo"</fieldset>";
									echo"</form>";
								}
									
									// przeslanie zmiennych z powrotem
									//echo "<div id='HF' style='display:none;'>";
									
									echo "<br><br><form action='index.php' method='post' id='contactform_B' name='contactform_B'>";
										
									echo"<input type='hidden' name='liczbaZ' id='liczbaZ' value='$sprawdz' />";
									echo"<input type='hidden' name='REL' id='REL' value='REL' />";
									
									 for ($zz=0; $zz<$sprawdz; $zz++)
												
										{			
											echo"<input type='hidden' id='nazwa_zadania_B$zz' name='nazwa_zadania_B$zz' />";
											echo"<input type='hidden' id='czas_zadania_B$zz' name='czas_zadania_B$zz'  />";														
											echo"<input type='hidden' id='okres_zadania_B$zz' name='okres_zadania_B$zz'/>";
											
													
										}
									echo"<input type='submit' value='WSTECZ' id='back' name='back' />";
									
									
									echo"</form>";
									//echo "</div>";
									
									
						
								
						/////////////////////////////////////////////////////////////////////////////////////////
						
						}
						else
						{
							header("Location: index.php");
						}
					
					

				?>
				
				
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