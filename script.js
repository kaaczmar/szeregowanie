function sprawdzOkresy()
{
	document.getElementById("contactform").onsubmit = function()
	{
		var tmp = 0;
		var zadania = "";
		
		for (var i = 0; i < document.getElementById("liczbaZ").value ; i++)
		{
			if( (document.getElementById("okres_zadania"+i+"").value - document.getElementById("czas_zadania"+i+"").value) < 0 )
			{
				tmp = 1;
				zadania = zadania + "ZADANIE "+ (i+1) +" <br>";
								
			}
			
		}
		
		if (tmp == 0) {return true;} 
		else 
			{ 
				document.getElementById("blad").innerHTML = "BŁĄD - czas zadania nie może być dłuższy od jego okresu !! <br> "+ zadania +"";
				return false; 
			}
	}
	
	
	
	document.getElementById("back").onclick = function()
	{
		
		//zapamiętanie zmiennyh formularza
		var zmienne = [];
		for (var i = 0; i < document.getElementById("liczbaZ").value ; i++)
		{
			
			zmienne[i] = [ document.getElementById("nazwa_zadania"+i+"").value, document.getElementById("czas_zadania"+i+"").value ,document.getElementById("okres_zadania"+i+"").value];
						
		}
		
		
		
		
				document.getElementById("blad").innerHTML = "BŁĄD" +zmienne[0][0]+"";
				
	}
	
	
	
}



window.onload = function()
{
	sprawdzOkresy();

}