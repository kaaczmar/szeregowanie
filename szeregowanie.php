<?php
/**
 * PROBLEM SZEREGOWANIA ZADAN
 
 * @author      Patryk Kaczmarek & Szymon Marcinkowski
 * @copyright   Metody Optymalizacji 2015
 * @link        http://www.kaaczmar.pl/szeregowanie
 * @package		SZEREGOWANIE
 */
 
 
 /**
 * Klasa szeregowanie
 *
 * <p><b>Klasa szeregowanie zawiera wszystkie metody i zmienne potrzebne do rozwiazania PROBLEMU SZEREGOWANIA ZADAN</b></p>.
 */
 class szeregowanie
 {
	public $er;
	public $T;
				
				/**
				 * <b>LICZBA ZADAN</b>
				 *
				 * <p><b>$liczba_zadan</b> - Zmienna przechowujaca a liczbe zadan.</p>
				 * @var number
				 */
	public $liczba_zadan_c;
	
	
				/**
				 * <b>CZAS ZADAN</b>
				 *
				 * <p><b>$czas_zadan_c</b> - Zmienna przechowujaca a czasy zadan.</p>
				 * @var number
				 */
	public $czas_zadan_c;
	
	
	
				/**
				 * <b>OKRES ZADAN</b>
				 *
				 * <p><b>$okres_zadan</b> - Zmienna przechowujaca a okres zadan.</p>
				 * @var number
				 */
	public $okres_zadan_c;
	
	
	
				/**
				 * <b>NAZWA ZADAN</b>
				 *
				 * <p><b>$nazwa_zadan</b> - Zmienna przechowujaca a nazwe zadan.</p>
				 * @var number
				 */
	public $nazwa_zadan_c;
	
				/**
				 * <b>NWW problemu</b>
				 *
				 * <p><b>$NWW_c</b> - Zmienna przechowujaca NWW.</p>
				 * @var number
				 */
	public $NWW_c;
	
				/**
				 * <b>CZESTOTLIWOSC ZADAN</b>
				 *
				 * <p><b>$czestotliwosc_c</b> - Zmienna przechowujaca czestotliwosc szeregowania zadan.</p>
				 * @var number
				 */
	public $czestotliwosc_c;
	
	
				/**
				 * <b>TRANSFORMACJA ZADAN</b>
				 *
				 * <p><b>$transformacja_c</b> - Zmienna przechowujaca wynik transformacja.</p>
				 * @var number
				 */
	public $transformacja_c;
	

				/**
				 * <b>PRIORYTET ZADAN</b>
				 *
				 * <p><b>$priorytet_c</b> - Zmienna przechowujaca priorytet zadania.</p>
				 * @var number
				 */
	public $priorytet_c;	
	

				/**
				 * <b>ILOSC WYKONANIA ZADANIA</b>
				 *
				 * <p><b>$przydzial_c</b> - Zmienna przechowujaca ile zadan danego typu musimy wykonac.</p>
				 * @var number
				 */
	public $przydzial_c;


				/**
				 * <b>KOLEJNOSC WYKONYWANYCH ZADAN</b>
				 *
				 * <p><b>$kolejnosc_c</b> - Zmienna przechowujaca kolejnosc zadan do wykonania.</p>
				 * @var number
				 */
	public $kolejnosc_c;

				/**
				 * <b>CZY WYKONANO ZADANIE</b>
				 *
				 * <p><b>$postep_c</b> - Zmienna przechowujaca postep zadania.</p>
				 * @var number
				 */
	public $postep_c;
	
				/**
				 * <b>CZY DOSTPENE ZADANIA</b>
				 *
				 * <p><b>$czy_dostepne_c</b> - Zmienna przechowujaca dane czy zadanie mozemy brac pod uwage w danej chwili.</p>
				 * @var bool
				 */
	public $czy_dostepne_c;
	
				/**
				 * <b>ILE ZADAN WYKONAC</b>
				 *
				 * <p><b>$ileWykonac_c</b> - Zmienna przechowujaca dane ile zadan danego typu nalezy wykonac.</p>
				 * @var number
				 */
	public $ileWykonac_c;
	
				/**
				 * <b>BLOKADA ZADAN</b>
				 *
				 * <p><b>$blokada_c</b> - Zmienna przechowujaca dane jak dlugo nalezy blokowac dane zadanie.</p>
				 * @var number
				 */
	public $blokada_c;
	
				/**
				 * <b>CALKOWITY POSTEP WYKONANIA ZADANIE</b>
				 *
				 * <p><b>$blokada_c</b> - Zmienna przechowujaca calkowity postep wykonania zadania.</p>
				 * @var number
				 */
	public $wykonane_c;


	


				/**					
				 * <b>Funkcja sluzaca do wczytywania instancji problemu</b>:
				 */	
	function wczytywanie()
		 {
																		
								$this->er="brak";
								
														
								/////////////////////////////////////////////////////////////////////////////////////////////////////////////
								
										
										//pobranie rozmiaru szeregowania zadan
										$this->liczba_zadan_c = htmlspecialchars(trim($_POST['liczbaZ']));		

																		

										//wczytanie zmiennych ( nazwa zadania, czas zadania, okres zadania) z formularza
										for($zz=0; $zz < $this->liczba_zadan_c; $zz++)
											{
												$this->nazwa_zadan_c[$zz] = trim($_POST["nazwa_zadania$zz"]);    
												$this->czas_zadan_c[$zz] = trim($_POST["czas_zadania$zz"]);
												$this->okres_zadan_c[$zz] = trim($_POST["okres_zadania$zz"]);
												$this->przydzial_c[$zz] = 0;
																								
													
											}
										
		 }
	

				/**					
				 * <b>Funkcja obliczajaca NWW- Najmniejsza Wspolna Wielokrotnosc</b>:
				 */		
	function NWW()
	{
		$poprzednie = $this->okres_zadan_c[0];
		 for ($i=1; $i < $this->liczba_zadan_c; $i++)
		 {
			$a=$poprzednie;
			$b=$this->okres_zadan_c[$i];
			
			while($a!=$b){
			if($a>$b) $a=$a-$b;
			else $b=$b-$a;
			} 
			$NWD = $a;
			$poprzednie = ($poprzednie * $this->okres_zadan_c[$i]) / $NWD;
		 }
			 
			return $poprzednie; 
	}
	
	
				/**					
				 * <b>Funkcja obliczajaca czestotliwosc zadan</b>:
				 */		
	function czestotliwosc()
	{
		
		 for ($i=0; $i < $this->liczba_zadan_c; $i++)
		 {
			$this->czestotliwosc_c[$i] = round( ($this->czas_zadan_c[$i] / $this->okres_zadan_c[$i]),2) ;
			
		 }
			 
			
	}
	


				/**					
				 * <b>Funkcja transformujaca problem Liu - Laylanda do problemu przydzialu</b>:
				 */		
	function transformacja()
	{
		
		 for ($i=0; $i < $this->liczba_zadan_c; $i++)
		 {
			$this->transformacja_c[$i] = round( $this->czestotliwosc_c[$i] * $this->NWW_c,0) ;
		 }
			 
			
	}


				/**					
				 * <b>Funkcja przygotowujaca problem ro rozwiazania</b>:
				 */	
	
	function przygotuj()
	{
		
		 for ($i=0; $i < $this->liczba_zadan_c; $i++)
		 {
			$this->ileWykonac_c[$i] = ($this->NWW_c / $this->okres_zadan_c[$i]);
			$this->postep_c[$i] = 0;
			$this->wykonane_c[$i] = 0;
			$this->blokada_c[$i] = -1;
			$this->czy_dostepne_c[$i]= true;
			$this->przydzial_c[$i] = 0;
		
		 }
		 
			 
			
	}
	
	
				/**					
				 * <b>Funkcja obliczajaca dolna kwote</b>:
				 */		
function testDolnejKwoty($miejsca,$zadanie)
	{		
		return round($this->transformacja_c[($zadanie)]*$miejsca,2,PHP_ROUND_HALF_DOWN);					
	}

	

				/**					
				 * <b>Funkcja obliczajaca priorytet, ktore zadanie wybrac w danej jednostce czasu</b>:
				 */		
function priorytet($zadanie)
	{		
		$this->priorytet_c[($zadanie)] = round( $this->transformacja_c[($zadanie)] /	( $this->przydzial_c[($zadanie)] + 1) ,2);		
	}
	
	
				/**					
				 * <b>Funkcja obliczajaca przydzial kolejnego zadania do wykonania</b>:
				 */		
function przydzial($iteracja)
	{	
		
		$dolna_kwota[] = 0;
				for($zz=0; $zz < $this->liczba_zadan_c; $zz++)
					{
						$this->priorytet($zz);			
																		
					}
				
				$max=0; $nrZAD=-1;
				
				for($z=0; $z < $this->liczba_zadan_c; $z++)
					{						
						$dolna_kwota[$z] = $this->testDolnejKwoty($this->przydzial_c[$z],$z);
						if ( $this->blokada_c[$z] == $iteracja-1 ) {$this->czy_dostepne_c[$z] = true;}
						
						if(  ($max < $this->priorytet_c[$z] )&& $this->czy_dostepne_c[$z] == true ) { $max = $this->priorytet_c[$z]; $nrZAD=$z; }
																	
					}
					
					if ($nrZAD != -1)
					{
							if ($this->postep_c[$nrZAD] < $this->ileWykonac_c[$nrZAD]*$this->czas_zadan_c[$nrZAD] )
							{	
								$this->przydzial_c[$nrZAD] = $this->przydzial_c[$nrZAD] + 1;
								$this->kolejnosc_c[$iteracja] = $nrZAD;
								$this->postep_c[$nrZAD] = $this->postep_c[$nrZAD] + 1;
								$this->wykonane_c[$nrZAD] = $this->wykonane_c[$nrZAD] + 1;
								
								
								if ( $this->postep_c[$nrZAD] >= $this->czas_zadan_c[$nrZAD] )
									{
										$this->czy_dostepne_c[$nrZAD] = false;
										$this->postep_c[$nrZAD] = 0;
										$this->blokada_c[$nrZAD] = $this->blokada_c[$nrZAD] + $this->okres_zadan_c[$nrZAD];	
									}
							
							}
							else
							{
								$this->kolejnosc_c[$iteracja] = -1;
							}
						
					}
					else
					{
						$this->kolejnosc_c[$iteracja] = -1;
					}
					
				
				
										
	}



				/**					
				 * <b>Funkcja sprawdzajaca czy algorytm znalazl popawne rozwiazanie</b>:
				 */			
	function sprawdzROZW()
	{
	$test=0;
		for($z=0; $z < $this->liczba_zadan_c; $z++)
			{						
			
				if ( $this->wykonane_c[$z] == $this->ileWykonac_c[$z]*$this->czas_zadan_c[$z] ) {$test++;}
																
			}
		if ($test == $this->liczba_zadan_c) {return true;} else {return false;}
	}


	
	
	
	
	
}
