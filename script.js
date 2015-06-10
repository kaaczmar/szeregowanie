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
	
	
	
	
	
}

function przeladowanie()
{
	document.getElementById("contactform_B").onsubmit = function()
	{
		
		for (var i = 0; i < document.getElementById("liczbaZ").value ; i++)
		{
			document.contactform_B.elements["nazwa_zadania_B"+i+""].value = document.getElementById("nazwa_zadania"+i+"").value;
			document.contactform_B.elements["okres_zadania_B"+i+""].value = document.getElementById("okres_zadania"+i+"").value;
			document.contactform_B.elements["czas_zadania_B"+i+""].value = document.getElementById("czas_zadania"+i+"").value;
			//document.forms['contactform_B']."nazwa_zadania_B0".value = document.getElementById("nazwa_zadania"+i+"").value;
			//document.forms['contactform_B']."okres_zadania_B0".value = document.getElementById("okres_zadania"+i+"").value;
			//document.forms['contactform_B']."czas_zadania_B0".value = document.getElementById("czas_zadania"+i+"").value;
		}
		return true;
						
	}
	
}



window.onload = function()
{
	sprawdzOkresy();
	przeladowanie();

}