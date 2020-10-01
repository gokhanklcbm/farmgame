<?php
session_start();

include "pConnect.php";

global $conn;

if(isset($_GET["s"])){
    if($_GET["s"] == "")
        return;
    $conn->query("INSERT INTO chatMessages (userid, message, dateTime) VALUES ('".$_SESSION["id"]."', '".$_GET["s"]."', '".date("Y-m-d H:i:s")."')");
}else if(isset($_GET["r"])){
    $retVal = "";

    if(!is_numeric($_GET["r"]))
        $numRows = 20;
    else
        $numRows = $_GET["r"];
    if($numRows > 100)
        $numRows = 100;

    $retVal = "";
    $search = $conn->query("SELECT * FROM chatMessages ORDER BY dateTime DESC LIMIT ".$numRows);
    while($row = $search->fetch_assoc()){

        $userRow = $conn->query("SELECT * FROM users WHERE id=".$row[userid]." LIMIT 1")->fetch_assoc();
        $retUserRow = "<tr><td><i>".$row["dateTime"]."</i> <b>-</b> ";
        if($userRow["id"] == $_SESSION["id"])
            $retUserRow = $retUserRow."<font color='red'>";
        else
            $retUserRow = $retUserRow."<font color='blue'>";
        $retUserRow = $retUserRow.$userRow["username"]."</font> <b>---> </b>".$row["message"]."</td></tr></br>";
        $retVal = $retUserRow.$retVal;

    }
    echo $retVal;
}
