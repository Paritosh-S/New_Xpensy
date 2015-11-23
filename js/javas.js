 var counter=0;
 var arr = ["ID :"];
 function v($v_check)
{
 counter++;
 if(counter==counter)
	{
	 arr[counter]=$v_check;
	}
    document.getElementById('r_id_box').value= arr;
 }
 function showHint(str) 
 { if (str.length == 0) {  document.getElementById("txtHint").innerHTML = ""; return;}
   else {var xmlhttp = new XMLHttpRequest(); xmlhttp.onreadystatechange = function() {
	   if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	   {
		   document.getElementById("txtHint").innerHTML = xmlhttp.responseText; }} 
           xmlhttp.open("GET", "search_grup_ajax.php?q=" + str, true); xmlhttp.send();}
}