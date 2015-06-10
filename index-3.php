<?php
/**
 * PROBLEM SZEREGOWANIA ZADAN
 
 * @author      Patryk Kaczmarek & Szymon Marcinkowski
 * @copyright   Metody Optymalizacji 2015
 * @link        http://www.kaaczmar.pl/szeregowanie
 * @package		SZEREGOWANIE
 */
require ("szeregowanie.php"); 
 $szeregowanie = new szeregowanie;
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
	
	<script type="text/javascript" language="JavaScript">
function PokazAkapit()
	{
	       var 	akapit = document.getElementById('more');
		   var  odnosnik = document.getElementById('link');
		   
		   //alert(odnosnik.innerHTML);
		   var	view = akapit.style.display;
		   
		   if (view=="none") {
                akapit.style.display="block";
				odnosnik.innerHTML = "SCHOWAJ SZCZEGÓŁY ALGORYTMU";}
			else {	akapit.style.display="none";
					odnosnik.innerHTML = "POKAŻ SZCZEGÓŁY ALGORYTMU";}
	}
	
	function SchowajAkapit()
	{
	       var 	akapit2 = document.getElementById('more');
		   var  odnosnik2 = document.getElementById('link2');
		   
		   //alert(odnosnik.innerHTML);
		   var	view = akapit2.style.display="none";;
		   
	}



</script>
	
	  
</head> 

<body>
<header>
		<nav>
			<div class="container">
				<div class="wrapper">
					<h1><strong>METODY OPTYMALIZACJI</strong></h1>
					<ul>
						<li><a href="index.php">Wprowadzenie instancji problemu</a></li>
						<li><bb>Uzupełnianie formularza</bb></li>
						<li><bb class="current">Wyniki działania algorytmu</bb></li>

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
		</center>
				<?php
				
				
				
				$szeregowanie->er = "brak";
				
				if ( isset($_POST["send"]) ) 
					{		
					$limitNWW = 40;
					$szeregowanie->wczytywanie();
					
					echo "<p style=\"color:white\"> <font size=\"2\"> Limit NWW w programie max: ".$limitNWW."</font></p><br>";
					$szeregowanie->NWW_c = $szeregowanie->NWW();
					
					if ( $szeregowanie->NWW_c > $limitNWW ) 
					{
						echo "<p style=\"color:white\"> <font size=\"5\"> NWW: ".$szeregowanie->NWW_c."</font></p><br><br>";
						echo "<font size=\"3\">Zbyt duże NWW - nie można policzyć algorytmu:</font><br><br>";
						
						echo "<p><a href=\"index.php\"><input type=\"button\" name='back' id=\"back\" value=\"START MENU\"/></a></p>";
						$szeregowanie->er = "TAK";
					}
				
				
				
				
					//////////////////////////////////////////////////////////////////////////////
					
					if ($szeregowanie->er == "brak" )
					{
					
					$szeregowanie->przygotuj();
					
					echo "<p><a href=\"#\" id=\"link\" onclick=\"PokazAkapit();\">POKAŻ SZCZEGÓŁY ALGORYTMU</a></p><br>"; //ukrywanie działania algorytmu
					
					echo "<div id='more' style='display:none;'>";//początek bloku do schowania
					
					/////////////////////////////////////////////////////////////////////////////////////////
					////ALGORYTM
					/////////////////////////////////////////////////////////////////////////////////////////
					
					//KROK PIERWSZY
					
					echo "<font size=\"5\">KROK PIERWSZY:</font><br>";
					echo "<font size=\"3\">Obliczamy NWW - Najmniejszą Wspólną Wielokrotność dla wszystkich okresów zadań:</font><br>";
				
					echo "<p style=\"color:white\"> <font size=\"5\"> NWW: ".$szeregowanie->NWW_c."</font></p><br><br>";
					
					
										
					echo "<font size=\"5\">KROK DRUGI:</font><br>";
					echo "<font size=\"3\">Obliczamy częstotliwość szeregowania dla wszystkich zadań:</font><br>";
					$szeregowanie->czestotliwosc();
					
					echo "<table><tr style=\"color:white\"><td>Lp.</td><td>Nazwa zadania</td><td>Czas zadania</td><td>Okres zadania</td><td>CZĘSTOTLIWOŚĆ</td></tr>";
					
							 for ($z=0; $z<$szeregowanie->liczba_zadan_c; $z++)
								{	
									echo"<tr style=\"color:white\"><td style=\"color:white\"><center><font size=\"5\">".($z+1).".</font></center></td>";
									echo"<td style=\"color:white\"><font size=\"5\">".$szeregowanie->nazwa_zadan_c[$z]."</font></td>";
									echo"<td style=\"text-align:right\"><font size=\"5\">".$szeregowanie->czas_zadan_c[$z]."</font></td>";	
									echo"<td style=\"color:white\"><center><font size=\"5\">".$szeregowanie->okres_zadan_c[$z]."</font></center></td>";
									echo"<td style=\"color:red\"><center><font size=\"5\">".$szeregowanie->czestotliwosc_c[$z]."</font></center></td></tr>";
								}
					echo "</table><br><br>";
					
					echo "<font size=\"5\">KROK TRZECI:</font><br>";
					echo "<font size=\"3\">TRANSFORMACJA do problemu przydziału:</font><br>";
					$szeregowanie->transformacja();
					
					echo "<table><tr style=\"color:white\"><td>Lp.</td><td>Nazwa zadania</td><td>Czas zadania</td><td>Okres zadania</td><td>TRANSFORMACJA</td></tr>";
					
							 for ($z=0; $z<$szeregowanie->liczba_zadan_c; $z++)
								{	
									echo"<tr style=\"color:white\"><td style=\"color:white\"><center><font size=\"5\">".($z+1).".</font></center></td>";
									echo"<td style=\"color:white\"><font size=\"5\">".$szeregowanie->nazwa_zadan_c[$z]."</font></td>";
									echo"<td style=\"text-align:right\"><font size=\"5\">".$szeregowanie->czas_zadan_c[$z]."</font></td>";	
									echo"<td style=\"color:white\"><center><font size=\"5\">".$szeregowanie->okres_zadan_c[$z]."</font></center></td>";
									echo"<td style=\"color:red\"><center><font size=\"5\">".$szeregowanie->transformacja_c[$z]."</font></center></td></tr>";
								}
					echo "</table><br><br>";
					
					
					echo "<br>";
					
					echo "<font size=\"5\">KROK CZWARTY:</font><br>";
					echo "<font size=\"3\">Testy dolnej kwoty i wybór zadania o największym priorytecie:</font><br><br>";
							
					
					for ($as=0; $as < $szeregowanie->NWW_c ; $as++)
					{
						$szeregowanie->przydzial($as);
						
						$iter = $as+1;
						echo "<font size=\"3\">ITERACJA: $iter</font><br>";
						
						
							echo "<table><tr style=\"color:white\"><td>Lp.</td><td>Nazwa zadania</td><td>PRIORYTET</td></tr>";
						
								 for ($z=0; $z<$szeregowanie->liczba_zadan_c; $z++)
									{	
										echo"<tr style=\"color:white\"><td style=\"color:white\"><center><font size=\"3\">".($z+1).".</font></center></td>";
										echo"<td style=\"color:white\"><font size=\"3\">".$szeregowanie->nazwa_zadan_c[$z]."</font></td>";
										echo"<td style=\"color:red\"><center><font size=\"3\">".$szeregowanie->priorytet_c[$z]."</font></center></td></tr>";
									}
						echo "</table>";
						
						if ( $szeregowanie->kolejnosc_c[$as] == -1 ) 
						{
							echo "<font size=\"5\">WYBÓR: brak zdania do wyboru</font><br><br>";
						}
						else
						{						
							echo "<font size=\"5\">WYBÓR: ".$szeregowanie->nazwa_zadan_c[$szeregowanie->kolejnosc_c[$as]]."</font><br><br>";
						}
						
					}
					
					
			
					//////////////////////////////////////////////////////////////////////////////////////////////////
					echo "<br>";
				
					echo "<p><a href=\"#\" id=\"link2\" onclick=\"SchowajAkapit();\">SCHOWAJ SZCZEGÓŁY ALGORYTMU</a></p><br><br>"; //ukrywanie działania algorytmu
				
						
					echo "</div>"; //koniec bloku do schowania
										
///////////////////////////////////////////////////////////////////////
					
					
					////////////////////////////////////////////////
					
					
					echo "<font size=\"5\">Lista ZADAŃ </font>";
					echo "<table><tr style=\"color:white\"><td>Lp.</td><td>Nazwa zadania</td><td>Czas zadania [Ci]</td><td>Okres zadania [Ti]</td></tr>";
					
							 for ($z=0; $z<$szeregowanie->liczba_zadan_c; $z++)
								{	
									echo"<tr style=\"color:white\"><td style=\"color:white\"><center><font size=\"5\">".($z+1).".</font></center></td>";
									echo"<td style=\"color:white\"><font size=\"5\">".$szeregowanie->nazwa_zadan_c[$z]."</font></td>";
									echo"<td style=\"text-align:right\"><font size=\"5\">".$szeregowanie->czas_zadan_c[$z]."</font></td>";									
									echo"<td><center><font size=\"5\">".$szeregowanie->okres_zadan_c[$z]."</font></center></td></tr>";
								}
					echo "</table><br><br>";
					
					$sT = $szeregowanie->sprawdzROZW();
					
				if (  $sT == false )
					{
						echo "<font size=\"3\">ALGORYTM NIE ZNALAZŁ OPTYMALNEGO ROZWIĄZANIA !</font><br><br>";
						return;
						
					}
					else
					{
						echo "<font size=\"3\">ALGORYTM ZNALAZŁ OPTYMALNE ROZWIĄZANIE !</font><br><br>";
						
						$tmp=40;
						echo "<font size=\"2\">USZEREGOWANIE:</font><br>";
						for ($aa=0; $aa < $szeregowanie->NWW_c ; $aa++)
							{
								if ( $szeregowanie->kolejnosc_c[$aa] == -1 ) {echo"";}
								else
								{
								if ( $tmp == $aa) {echo "<br>"; $tmp = $tmp +40;}
								//echo "<font size=\"5\">".$szeregowanie->nazwa_zadan_c[$szeregowanie->kolejnosc_c[$aa]].",</font>";
								echo "<font size=\"5\">".( $szeregowanie->kolejnosc_c[$aa]+1).",</font>";
								
								}
							}
						echo "<br><br>";
						
						
						
					}
					
				///////////////////////////////////////////////////////////////////////////////////////////////
				//rysowanie wykresu przy pomocy GOOGLE CHARTS
				?>
				<center>
				<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization',
       'version':'1','packages':['timeline']}]}"></script>
<script type="text/javascript">

google.setOnLoadCallback(drawChart);
function drawChart() {

  var container = document.getElementById('example5.1');
  var chart = new google.visualization.Timeline(container);
  var dataTable = new google.visualization.DataTable();
  dataTable.addColumn({ type: 'string', id: 'ZADANIE' });
  dataTable.addColumn({ type: 'number', id: 'Start' });
  dataTable.addColumn({ type: 'number', id: 'End' });
  dataTable.addRows([
  

  <?php
 $OD=0; $DO=1; 
$tmpOD[]=0; $tmpDO[]=0;

for ($i=0; $i<($szeregowanie->NWW_c);$i++ )	
{
	
	if ($szeregowanie->kolejnosc_c[$i] == -1 ) 
	{
		
		$OD++;
		$DO++;
	
		
		
	}
	else
	{
	
		echo " ['".$szeregowanie->nazwa_zadan_c[$szeregowanie->kolejnosc_c[$i]]."',".$OD."000,".$DO."000]";
		$OD=$DO;
		$DO++;
		if ($i != $szeregowanie->NWW_c -1 ) {echo",";}		
	}
			 
}

    
?>
   ]);            
                  
  var options = { 
    timeline: { colorByRowLabel: true }
	
  };

  chart.draw(dataTable, options);
}

</script>

<legend>Wykres przedstawiający uszeregowanie zadań</legend><br>
	 <fieldset style="background:white">
	 
	 <br>
	 
	 
	 <?php
	 
	 $wys = $szeregowanie->liczba_zadan_c * 80;
	 
	  echo "<div id='example5.1' style='width: 900px; height:".$wys."px;'></div>";
		
		?>
	 
	 
	 
   
	<br>
	</fieldset>	
	<br>
	<br>
	<p>
	<a href="index.php"><input type="button"  id="send1" value="START MENU"/></a>
	</p>
	

				
		</center>
		
		
		<?php
		}
		}
		
						else
						{
							header("Location: index.php");
						}
		?>
		
	
		</div>
	</div>
		
		
		
		<div id="stopka">		
		<div id="stopkaL"><p>Metody Optymalizacji &copy; 2015</p></div>
		<div id="stopkaR"><p><strong>created by Patryk Kaczmarek & Szymon Marcinkowski</strong></div>		
		</div>
	
	
	</div>

</body>
</html>