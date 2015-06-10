<?php
/**
 * PROBLEM SZEREGOWANIA ZADAN KLASA TESTOWA
 
 * @author      Patryk Kaczmarek & Szymon Marcinkowski
 * @copyright   Metody Optymalizacji 2015
 * @link        http://www.kaaczmar.pl/szeregowanie
 * @package		SZEREGOWANIE
 */
require"szeregowanie.php";

class ExampleTest extends PHPUnit_Framework_TestCase {
 
	
				/**					
				 * <b>Funkcja testujaca obliczanie NWW</b>:
				 *{@source
				$obiekt = new szeregowanie;
		
				$obiekt->liczba_zadan_c = 3;
				
				$obiekt->okres_zadan_c[0] = 5;
				$obiekt->okres_zadan_c[1] = 15;
				$obiekt->okres_zadan_c[2] = 30;
				
				
				$testNWW = $obiekt->NWW();
				
				$this->assertEquals(30, $testNWW);}
				 */	
	function testobliczNWW()
	{
		$obiekt = new szeregowanie;
		
		$obiekt->liczba_zadan_c = 3;
		
		$obiekt->okres_zadan_c[0] = 5;
		$obiekt->okres_zadan_c[1] = 15;
		$obiekt->okres_zadan_c[2] = 30;
		
		
		$testNWW = $obiekt->NWW();
		
		$this->assertEquals(30, $testNWW);
	}
	
	
	
	
	/**					
				 * <b>Funkcja testujaca obliczanie czestotliwosci</b>:
				 *{@source
				$obiekt = new szeregowanie;
		
				$obiekt->liczba_zadan_c = 2;
				
				$obiekt->okres_zadan_c[0] = 5;
				$obiekt->okres_zadan_c[1] = 2;
				
				$obiekt->czas_zadan_c[0] = 20;
				$obiekt->czas_zadan_c[1] = 15;

				
				
				$obiekt->czestotliwosc();
				
				$this->assertEquals(4, $obiekt->czestotliwosc_c[0]);
				$this->assertEquals(7.5, $obiekt->czestotliwosc_c[1]);}
				 */	
	function testczestotliwosc()
	{
		$obiekt = new szeregowanie;
		
		$obiekt->liczba_zadan_c = 2;
		
		$obiekt->okres_zadan_c[0] = 5;
		$obiekt->okres_zadan_c[1] = 2;
		
		$obiekt->czas_zadan_c[0] = 20;
		$obiekt->czas_zadan_c[1] = 15;

		
		
		$obiekt->czestotliwosc();
		
		$this->assertEquals(4, $obiekt->czestotliwosc_c[0]);
		$this->assertEquals(7.5, $obiekt->czestotliwosc_c[1]);
	}
	
	
	
	/**					
				 * <b>Funkcja testujaca ogolny przydzial zadan</b>:
				 *{@source
				$obiekt = new szeregowanie;
				//dane do testow
				$obiekt->liczba_zadan_c = 2;
				
				$obiekt->okres_zadan_c[0] = 20;
				$obiekt->okres_zadan_c[1] = 40;
				
				$obiekt->czas_zadan_c[0] = 2;
				$obiekt->czas_zadan_c[1] = 4;
				
				$obiekt->NWW_c = $obiekt->NWW();
				
				$obiekt->przygotuj();
				$obiekt->czestotliwosc();
				$obiekt->transformacja();

				
				
				for ($i=0; $i< $obiekt->NWW_c; $i++)
				{
					$obiekt->przydzial($i);
					
				}
				
				for ($d=0; $d < $obiekt->NWW_c; $d++)
				{
						$obiekt->T[$d]=-1;
				}
				
				$tmp=0;
				for ($s=0; $s < $obiekt->NWW_c ; $s++)
					{
						if ( $obiekt->kolejnosc_c[$s] != -1 )
						{
						$obiekt->T[$tmp] = $obiekt->kolejnosc_c[$s];
						$tmp++;
						}
					}
					
					$this->assertEquals( 1, $obiekt->T[0]+1);
					$this->assertEquals( 2, $obiekt->T[1]+1);
					$this->assertEquals( 1, $obiekt->T[2]+1);
					$this->assertEquals( 2, $obiekt->T[3]+1);
					$this->assertEquals( 2, $obiekt->T[4]+1);
					$this->assertEquals( 2, $obiekt->T[5]+1);
					$this->assertEquals( 1, $obiekt->T[6]+1);
					$this->assertEquals( 1, $obiekt->T[7]+1);}
				 */	
	function testPRZYDZIAL()
	{
				
		
		$obiekt = new szeregowanie;
		//dane do testow
		$obiekt->liczba_zadan_c = 2;
		
		$obiekt->okres_zadan_c[0] = 20;
		$obiekt->okres_zadan_c[1] = 40;
		
		$obiekt->czas_zadan_c[0] = 2;
		$obiekt->czas_zadan_c[1] = 4;
		
		$obiekt->NWW_c = $obiekt->NWW();
		
		$obiekt->przygotuj();
		$obiekt->czestotliwosc();
		$obiekt->transformacja();

		
		
		for ($i=0; $i< $obiekt->NWW_c; $i++)
		{
			$obiekt->przydzial($i);
			
		}
		
		for ($d=0; $d < $obiekt->NWW_c; $d++)
		{
				$obiekt->T[$d]=-1;
		}
		
		$tmp=0;
		for ($s=0; $s < $obiekt->NWW_c ; $s++)
			{
				if ( $obiekt->kolejnosc_c[$s] != -1 )
				{
				$obiekt->T[$tmp] = $obiekt->kolejnosc_c[$s];
				$tmp++;
				}
			}
			
			$this->assertEquals( 1, $obiekt->T[0]+1);
			$this->assertEquals( 2, $obiekt->T[1]+1);
			$this->assertEquals( 1, $obiekt->T[2]+1);
			$this->assertEquals( 2, $obiekt->T[3]+1);
			$this->assertEquals( 2, $obiekt->T[4]+1);
			$this->assertEquals( 2, $obiekt->T[5]+1);
			$this->assertEquals( 1, $obiekt->T[6]+1);
			$this->assertEquals( 1, $obiekt->T[7]+1);
		
		
		
	}
	
	
	
	
	
	
	
	
} 
?>
