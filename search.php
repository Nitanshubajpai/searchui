<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "vehicle_list";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
 $conn = OpenCon();  

?>
<!DOCTYPE html>
<html>
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="search.css" rel="stylesheet" type="text/css">
</head>
<body>
  <h1>Search Results...</h1>
<?php
    $sql = "SELECT * FROM vehicle";
    $result = $conn->query($sql);
    $city = $_POST["city"];
    $type = $_POST["type"];

    if ($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        if ($row["City"] == $city && $row["Type"] == $type) {
          $imglink = $row["imagelink"];
          echo "<img src='$imglink' width=300px height=auto> ";

      }
        if ($row["City"] == $city && $row["Type"] == $type){
          echo  "<h2 class = 'searchrs'>"." Name: " . $row["Name"]."<br>". " Rent/day: " . $row["RentperDay"]."<br>". " Deposit: " . $row["Deposit"]."<br>". " Vehicle Type: " . $row["VehicleType"]. "</h2>"."<br>";
      }
        
    }
    } else {
      echo "0 results";
    }
?>
</body>
</html>