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
				
					$szeregowanie->wczytywanie();
				
				
				
				
					//////////////////////////////////////////////////////////////////////////////
				
					if ($szeregowanie->er == "brak" )
					{
					$szeregowanie->NWW_c = $szeregowanie->NWW();
					if ( $szeregowanie->NWW_c > 50 ) 
					{
						echo "<p style=\"color:white\"> <font size=\"5\"> NWW: ".$szeregowanie->NWW_c."</font></p><br><br>";
						echo "<font size=\"3\">Zbyt duże NWW - nie można policzyć algorytmu:</font><br><br>";
						return;
					}
					
					echo "<p><a href=\"#\" id=\"link\" onclick=\"PokazAkapit();\">POKAŻ SZCZEGÓŁY ALGORYTMU</a></p><br>"; //ukrywanie działania algorytmu
					
					echo "<div id='more' style='display:none;'>";//początek bloku do schowania
					
					/////////////////////////////////////////////////////////////////////////////////////////
					////ALGORYTM
					/////////////////////////////////////////////////////////////////////////////////////////
					
					//KROK PIERWSZY
					
					echo "<font size=\"5\">KROK PIERWSZY:</font><br>";
					echo "<font size=\"3\">Obliczamy NWW - Najmniejszą Wspólną Wielokrotność dla wszystkich okresów zadań:</font><br>";
					$szeregowanie->NWW_c = $szeregowanie->NWW();
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
					$a1 = 0;
					$aCZAS = 0;
					
					$STOP = true;
					
					while($STOP == true)
					{
					
					
					$szeregowanie->przydzial($a1);
						
					echo"SZEREGOWANIE -> ILE = ".$szeregowanie->ILE."<br>";
					echo"SZEREGOWANIE -> NWW_c = ".$szeregowanie->NWW_c."<br>";
					echo"aCZAS = ".$aCZAS."<br>";
					 						
					 if ( ($szeregowanie->NWW_c - $aCZAS) < $szeregowanie->czas_zadan_c[ $szeregowanie->kolejnosc_c[$a1] ] ) $STOP = false;
					    
					if ($STOP == true)
					{
						$iter = $a1+1;
						echo "<font size=\"3\">ITERACJA: $iter</font><br>";
							
							
							echo "<table><tr style=\"color:white\"><td>Lp.</td><td>Nazwa zadania</td><td>PRIORYTET</td></tr>";
						
								 for ($z=0; $z<$szeregowanie->liczba_zadan_c; $z++)
									{	
										echo"<tr style=\"color:white\"><td style=\"color:white\"><center><font size=\"3\">".($z+1).".</font></center></td>";
										echo"<td style=\"color:white\"><font size=\"3\">".$szeregowanie->nazwa_zadan_c[$z]."</font></td>";
										echo"<td style=\"color:red\"><center><font size=\"3\">".$szeregowanie->priorytet_c[$z]."</font></center></td></tr>";
									}
						echo "</table>";
						
						echo "<font size=\"3\">WYBÓR: ".$szeregowanie->nazwa_zadan_c[$szeregowanie->kolejnosc_c[$a1]]."</font><br><br>";
						
					   //$aCZAS = $aCZAS + $szeregowanie->czas_zadan_c[ $szeregowanie->kolejnosc_c[$a1] ];
					   $aCZAS = $aCZAS + $szeregowanie->czas_zadan_c[ $szeregowanie->kolejnosc_c[$a1] ] ;
					   $szeregowanie->ILE = $a1+1;
					
						
						$a1++;
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
 $OD=0; $DO=0; 
$tmpOD[]=0; $tmpDO[]=0;

$blokada[]=0;
for ($i=0; $i<($szeregowanie->ILE);$i++ )	
{
	$blokada[$i] = 0;
}
for ($i=0; $i<($szeregowanie->ILE);$i++ )	
{
	if ($i == 0)
	{
		$OD=0;
		$DO = $szeregowanie->czas_zadan_c[$szeregowanie->kolejnosc_c[$i]];
		echo " ['".$szeregowanie->nazwa_zadan_c[$szeregowanie->kolejnosc_c[$i]]."',".$OD."000,".$DO."000]";
		
		if ( $i != ($szeregowanie->ILE) ) {echo",";}
		$tmpOD[$szeregowanie->kolejnosc_c[$i]] = $szeregowanie->okres_zadan_c[ $szeregowanie->kolejnosc_c[$i] ];
		$blokada[ $szeregowanie->kolejnosc_c[$i] ]= $szeregowanie->okres_zadan_c[ $szeregowanie->kolejnosc_c[$i] ];
		
	}
	else
	{
			if ($blokada [ $szeregowanie->kolejnosc_c[$i] ] <= $DO )
				{
					$OD = $DO;
					$DO = $OD + $szeregowanie->czas_zadan_c[$szeregowanie->kolejnosc_c[$i]];
					$blokada[$szeregowanie->kolejnosc_c[$i]] += $szeregowanie->okres_zadan_c[ $szeregowanie->kolejnosc_c[$i] ];
					
				}
				else
				{
				$tmp = $blokada[$szeregowanie->kolejnosc_c[$i]] - $OD;
					$OD = $OD + $tmp;
					$DO = $OD + $szeregowanie->czas_zadan_c[$szeregowanie->kolejnosc_c[$i]];
					$blokada[$szeregowanie->kolejnosc_c[$i]] += $szeregowanie->okres_zadan_c[ $szeregowanie->kolejnosc_c[$i] ];
					
				}
			
				//$OD = $DO;
				//$DO = $OD + $szeregowanie->czas_zadan_c[$szeregowanie->kolejnosc_c[$i]];
			
			
			
			
	
	echo " ['".$szeregowanie->nazwa_zadan_c[$szeregowanie->kolejnosc_c[$i]]."',".$OD."000,".$DO."000]";
	if ( $i != ($szeregowanie->ILE) ) {echo",";}
	
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
	 
	 $wys = $szeregowanie->liczba_zadan_c * 70;
	 
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