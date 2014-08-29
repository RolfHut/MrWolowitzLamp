<?php

  //This php scirpt first switches the lamp by doing an API call to spark.io and than adds the name of the user to a MySQL database

  //The spark core part first:

  // Set your access token here. Make sure this token is never stored client side, ie. in Javascript files for example.
  define('ACCESS_TOKEN', 'YOUR ACCES TOKEN');

// All responses should be JSON
header('Content-type: application/json');


// Build the URL.  Since it's possible to accidentally have an
// extra / or two in $_SERVER['QUERY_STRING], replace "//" with "/"
// using str_replace().  This also appends the access token to the URL.
$url = 'https://'.str_replace('//', '/', 'api.spark.io/v1/devices/'.$_SERVER['QUERY_STRING'].'?access_token='.ACCESS_TOKEN);


// HTTP GET requests are easy!
if(strtoupper($_SERVER['REQUEST_METHOD'])=='GET')
        echo file_get_contents($url);
// HTTP POST requires the use of cURL
elseif (strtoupper($_SERVER['REQUEST_METHOD'])=='POST') {

  $c = curl_init();
  
  curl_setopt_array($c, array(
  // Set the URL to access
                CURLOPT_URL => $url,
                // Tell cURL it's an HTTP POST request
                CURLOPT_POST => TRUE,
                // Include the POST data
                // $HTTP_RAW_POST_DATA may work on some servers, but it's deprecated in favor of php://input
                CURLOPT_POSTFIELDS => file_get_contents('php://input'),
                // Return the output to a variable instead of automagically echoing it (probably a little redundant)
                CURLOPT_RETURNTRANSFER => TRUE
  ));


  // Make the cURL call and echo the response
  echo curl_exec($c);

  // Close the cURL resource
  curl_close($c);
  

}

//Now the MySQL part. I assume there is a table called "Lamp_Name_List" that has a field called "name" and also an auto-incrementing field called "ID" 
// and an automatic timestamp field called "timestamp"

//add your database username, password and database name below
$con=mysqli_connect("localhost","USER NAME","PASSWORD","DATABASE NAME");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$name = $_POST['params'];
echo $name;

$sql="INSERT INTO lamp_Name_List (name)
VALUES ('$name')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);
?>
