function submitLogin() 
{
	// Ultimate form validation that checks for whitespaces and special characters and more...
	var usernames = document.getElementsByName("username");
	var passwords = document.getElementsByName("password");
						
	var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
	
	if (pattern.test(usernames[0].value) || /\s/g.test(usernames[0].value) == true)
	{
		alert("The entry: " + usernames[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}		
	else if (pattern.test(passwords[0].value) || /\s/g.test(passwords[0].value) == true)
	{
		alert("The entry: " + passwords[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}				
	else
	{
		document.loginform.submit();
	}						
				
}

function submitCreateAccount() 
{
	// Ultimate form validation that checks for whitespaces and special characters and more...
	var usernames = document.getElementsByName("username");
	var firstnames = document.getElementsByName("firstname");
	var lastnames = document.getElementsByName("lastname");
	var passwords = document.getElementsByName("password");
	var emails = document.getElementsByName("email");
	var phonenumbers = document.getElementsByName("phonenum");					
	var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars

	if (pattern.test(usernames[0].value) || /\s/g.test(usernames[0].value) == true)
	{
		alert("The entry: " + usernames[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}
	else if (pattern.test(firstnames[0].value) || /\s/g.test(firstnames[0].value) == true)
	{
		alert("The entry: " + firstnames[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}
	else if (pattern.test(lastnames[0].value) || /\s/g.test(lastnames[0].value) == true)
	{
		alert("The entry: " + lastnames[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}
	else if (pattern.test(passwords[0].value) || /\s/g.test(passwords[0].value) == true)
	{
		alert("The entry: " + passwords[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}	
	else if (/\s/g.test(emails[0].value) == true)
	{
		alert("The entry: " + emails[0].value + " contains some white spaces please remove them to continue!");
	}	
	else if (pattern.test(phonenumbers[0].value) || /\s/g.test(phonenumbers[0].value) == true || phonenumbers[0].value.length != 10)
	{
		alert("The entry: " + phonenumbers[0].value + " either does not have 10 digits, contains some special characters, or has white spaces. Fix errors to continue!");
	}			
	else
	{
		document.createaccountform.submit();
	}					
			
}

function submitEditProfile()
{
	
	// Ultimate form validation that checks for whitespaces and special characters and more...
	var firstnames = document.getElementsByName("firstname");
	var lastnames = document.getElementsByName("lastname");
	var emails = document.getElementsByName("email");
	var phonenumbers = document.getElementsByName("phonenumber");					
	var pattern = new RegExp(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/); //unacceptable chars
						
	if (pattern.test(firstnames[0].value) || /\s/g.test(firstnames[0].value) == true)
	{
		alert("The entry: " + firstnames[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}	
	else if (pattern.test(lastnames[0].value) || /\s/g.test(lastnames[0].value) == true)
	{
		alert("The entry: " + lastnames[0].value + " contains some special characters or has white spaces please remove them to continue!");
	}
	else if (/\s/g.test(emails[0].value) == true)
	{
		alert("The entry: " + emails[0].value + " contains some white spaces please remove them to continue!");
	}	
	else if (pattern.test(phonenumbers[0].value) || /\s/g.test(phonenumbers[0].value) == true || phonenumbers[0].value.length != 10)
	{
		alert("The entry: " + phonenumbers[0].value + " either does not have 10 digits, contains some special characters, or has white spaces. Fix errors to continue!");
	}		
	else
	{
		alert("Changes have been submitted!");
		document.editprofileform.submit();
	}							
}	

function submitApplyForm()
{
	alert("Email has been submitted");
	document.emailform.submit();
}

function submitCreatePostForm()
{
	alert("Post has been submitted");
}

function submitUploadPictureForm()
{
	alert("Upload Successful");
	//document.getElementById("uploadpictureform").submit();
	document.uploadpictureform.submit();
}