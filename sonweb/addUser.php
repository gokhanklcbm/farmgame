<?php

include "pConnect.php";
global $conn;

if(isset($_GET["count"])){
	
	$count = $_GET["count"];
	for($i = 0 ; $i < $count ; $i++){
		$randUsername = generateRandomString(7);
		$sqlQ = "INSERT INTO users (username, email, password, secretToken, points) VALUES ('".$randUsername."', 'None', 'None', 'None', 0)";
		$conn->query($sqlQ);
		$userRow = $conn->query("SELECT * FROM users WHERE username='".$randUsername."' LIMIT 1")->fetch_assoc();
		$sqlQ = "INSERT INTO assets (userid,gold,food,foodTimer,kartopu,kartopuDetails,dudu,duduDetails) VALUES ('".$userRow["id"]."', '0', '0', '0', '0', '', '0', '')";
		$conn->query($sqlQ);
		echo "Adding ".$i."th user...\n";
	}
	
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


?>