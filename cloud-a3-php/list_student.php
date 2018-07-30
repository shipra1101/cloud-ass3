<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
<script>


function loadDoc() {
	var students = "";
	var url  = "https://cloud-a3-shipra1.azurewebsites.net/liststudents";
	var xhr  = new XMLHttpRequest()
	xhr.open('GET', url, true)
	xhr.onload = function () {
		students = JSON.parse(xhr.responseText);
		if (xhr.readyState == 4 && xhr.status == "200") {
			 $('#table').bootstrapTable({
		         //Assigning data to table
		         data: students
		     });			
		} else {
			console.error(users);
		}
	}
	xhr.send(null);

	}
</script>

<meta charset="ISO-8859-1">
<title>cloud-a3</title>
</head>
<body>
<h1><a href="index.php">Home</a></h1>
<table id="table">
           <thead>
               <tr>
                   <th data-field="id">ID</th>
                   <th data-field="name">Name</th>
				   <th data-field="picture">Picture</th>
               </tr>
           </thead>
       </table>
  <button type="button" onclick="loadDoc()">Click button to List Student</button>
</body>
</html>