<!DOCTYPE html>
<html>
<head>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

</head>
<body>

<script>


function loadDoc() {
	
	var url = "https://cloud-a3-shipra1.azurewebsites.net/displaypic";

	var data = {};
	data.id = document.getElementById("id").value;
	var json = JSON.stringify(data);

	var xhr = new XMLHttpRequest();
	xhr.open("PUT", url, true);
	xhr.setRequestHeader('Content-type','application/json; charset=utf-8');
	xhr.onload = function () {
		var student = JSON.parse(xhr.responseText);
		if (xhr.readyState == 4 && xhr.status == "200") {
			document.getElementById('message').innerHTML = student.picture;
		} else {
			console.error(users);
		}
	}
	xhr.send(json);
}
</script>

<script type="text/javascript">
    $('#upload_widget_opener').cloudinary_upload_widget(
        {
        	cloud_name: 'doglg2zdi', upload_preset: 'q7is59pk', sources: ['local','url'], resource_type: 'image',tags:['a'],
        },
        function(error, result)
        {
            console.log(error, result);
        });
    </script>
    

<?php
require ('Cloudinary.php');
require ('Uploader.php');
require ('Api.php');

require('Api/Response.php');

$api = new \Cloudinary\Api();


\Cloudinary::config(array( 
  "cloud_name" => "doglg2zdi", 
  "api_key" => "472373387592392", 
  "api_secret" => "T4pFusa2rA8i7jZGTlszz_brbD4" 
));

$response_resources = $api->resources_by_tag("a");

$resource_array = (array) $response_resources;

foreach ($resource_array as $value){
	$no_of_images = count($value);
	$counter = 0;
	//echo($value[$counter]['public_id']);
	//echo($value[$counter]['url']);
	$public_id = $value[$counter]['public_id'];
	$url = $value[$counter]['url'];
	//while($counter < $no_of_images){
	//echo(cl_image_tag($value[$counter]['url'],array("width"=>200, "height"=>200, "gravity"=>"faces", "crop"=>"fill")));
	//echo "<br>";
	//echo($value[$counter]['public_id']);
	//echo "<br>";
	//echo "<br>";
	//$counter ++;
	//}	
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$delete_text = $_POST["delete_text"];
	$api->delete_resources(array($delete_text));
	
	
	
}

?>

<body>


<h1><a href="index.php">Home</a></h1>
<p> Dispplay the image public ID<b id='message'></b> </p> 
Student ID:<br>
  <input type="text" name="id" id="id" value="" required><br>
  <button type="button" onclick="loadDoc()">Display Picture</button>
  <input type="text" id="picture" hidden="true" value="<?PHP echo $public_id; ?>" />
  <input type="text" id="url" hidden="true" value="<?PHP echo $url; ?>" />
</body>

</body>
</html>