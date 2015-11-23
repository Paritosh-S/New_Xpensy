function validate_login()
			{
				var email_id = document.forms["LoginForm"]["username"].value;
				var pass = document.forms["LoginForm"]["password"].value;
				
				var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var len = pass.length;
				
				if(email_id!="" && pass!="")
				{
    				if (re.test(email_id))
					{
						document.getElementById("lble").innerHTML = "";
						if(len >= 8)
							document.getElementById("lblp").innerHTML = "";
						else{
							document.getElementById("lblp").innerHTML = "*";
							document.getElementById("password").focus();
							}
					}
					else{
						document.getElementById("lble").innerHTML = "*";
						document.getElementById("username").focus();
						}
				}
				else
				{
						document.getElementById("lble").innerHTML = "*";
						document.getElementById("lblp").innerHTML = "*";
				}
				return true;	
			}