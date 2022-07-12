<?php

include_once("connection.php");
include_once("url.php");

$search = $_POST['search'];

$query = "SELECT * FROM agenda.contacts WHERE name like '%$search%'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $contacts = $stmt->fetch_assoc();

if ($contacts->num_rows > 0){
while($row = $contacts->fetch_assoc() ){
	echo $row["name"]."  ".$row["age"]."  ".$row["gender"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>