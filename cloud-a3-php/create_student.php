<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>


function loadDoc() {
	
	var url = "https://cloud-a3-shipra1.azurewebsites.net/createstudent";

	var data = {};
	data.id = document.getElementById("id").value;
	data.name  = document.getElementById("name").value;
	var json = JSON.stringify(data);

	var xhr = new XMLHttpRequest();
	xhr.open("POST", url, true);
	xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
	xhr.onload = function () {
		var student = JSON.parse(xhr.responseText);
		if (xhr.readyState == 4 && xhr.status == "200") {
			document.getElementById('message').innerHTML = student.msg;
		} else {
			console.error(users);
		}
	}
	xhr.send(json);
}
</script>

<meta charset="ISO-8859-1">
<title>cloud-a3</title>
</head>
<body>
<h1><a href="index.php">Home</a></h1>
<p> <b id='message'></b> </p> 
Student ID:<br>
  <input type="text" name="id" id="id" value="" required><br>
  Nick Name:<br>
  <input type="text" name="name" id="name" value="" required><br><br>
  <button type="button" onclick="loadDoc()">Insert</button>
</body>
</html>