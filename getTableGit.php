<?php
  //This php script gets the 10 latest entries from a MySQL database. It shows the fields "timestamp" and "name" in a table.

//add your database username, password and database name below
$con=mysqli_connect("localhost","USER NAME","PASSWORD","DATABASE NAME");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM  `lamp_Name_List` ORDER BY  `ID` DESC LIMIT 0 , 10");


echo "<table border='1'>
<tr>
<th>Tijd</th>
<th>Naam</th>
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['timestamp'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "</tr>";
}

echo "</table>";

mysqli_close($con);
?>