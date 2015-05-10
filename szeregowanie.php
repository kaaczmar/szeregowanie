<?php
/**
 * PROBLEM PRZYDZIALU MIEJSC W PARLEMENCIE METODA HAMILTONA
 
 * @author      Patryk Kaczmarek & Szymon Marcinkowski
 * @copyright   Metody Optymalizacji 2015
 * @link        http://www.kaaczmar.pl/hamilton
 * @package		HAMILTON
 */
 
 
 /**
 * Klasa szeregowanie
 *
 * <p><b>Klasa szeregowanie zawiera wszystkie metody i zmienne potrzebne do rozwiazania PROBLEMU PRZYDZIALU MIEJSC W PARLAMENCIE METODA HAMILTONA</b></p>.
 */
 class szeregowanie
 {
	public $er;
				
				/**
				 * <b>LICZBA ZADAN</b>
				 *
				 * <p><b>$liczba_zadan</b> - Zmienna przechowujaca a liczbe zadan.</p>
				 * @var number
				 */
	public $liczba_zadan_c;
	
	
				/**
				 * <b>LICZBA ZADAN</b>
				 *
				 * <p><b>$liczba_zadan</b> - Zmienna przechowujaca a liczbe zadan.</p>
				 * @var number
				 */
	public $czas_zadan_c;
	
	
	
				/**
				 * <b>LICZBA ZADAN</b>
				 *
				 * <p><b>$liczba_zadan</b> - Zmienna przechowujaca a liczbe zadan.</p>
				 * @var number
				 */
	public $okres_zadan_c;
	
	
	
				/**
				 * <b>LICZBA ZADAN</b>
				 *
				 * <p><b>$liczba_zadan</b> - Zmienna przechowujaca a liczbe zadan.</p>
				 * @var number
				 */
	public $nazwa_zadan_c;
	
	
	
	


				/**					
				 * <b>Funkcja sluzaca do wczytywania instancji problemu</b>:
				 
				 * @param  string $error - zmienna zawierajaca komunikat o błedzie				 
				 * @param  number $test_plik - zmienna decydujaca o tym czy instancja problemu wczytywana jest z pliku czy z formularza				 

				 
				 */	
	function wczytywanie()
 {
																
						$this->er="brak";
						
						$this->populacja_kraju_c = 0;
							
						/////////////////////////////////////////////////////////////////////////////////////////////////////////////
						
								
								//pobranie rozmiaru szeregowanieu
								$this->liczba_zadan_c = htmlspecialchars(trim($_POST['liczbaZ']));		

																

								//wczytanie zmiennych ( nazwa stanu, liczba populacji) z formularza
								for($zz=0; $zz < $this->liczba_zadan_c; $zz++)
									{
										$this->nazwa_zadan_c[$zz] = trim($_POST["nazwa_zadania$zz"]);    
										$this->czas_zadan_c[$zz] = trim($_POST["czas_zadania$zz"]);
										$this->okres_zadan_c[$zz] = trim($_POST["okres_zadania$zz"]);
											
									}
									
								
							
						
	
 }
	
}
