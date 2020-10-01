<?php
session_start();
include_once "pConnect.php";
include_once "pAssetConfig.php";

if(!isset($_SESSION["login"]))
	header("Location:pLogin.php");
?>

<!-- page content -->
<div class="right_col" role="main">

    <?php
        include "pOwns.php";
    ?>

    <div class="x_panel">
        <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <table class="table">
                    <tbody>
                    <messages id="messageList"></messages>
                    <tr>
                        <td>

                            <form onsubmit="return false"><input id="message" type="text" class="form-control" placeholder="Mesajınız... Göndermek İçin Enter'a Basın."><button id="sendB" onclick="sendButton()" style="display:none;">Gönder</button></form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row"> </div>
</div>
<!-- /page content -->

<script>
    document.getElementById("message").autofocus = true;

    var xhttp = new XMLHttpRequest();
    setInterval(listenAndUpdate, 1750);

    var input = document.getElementById("messageList");
    input.addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.keyCode == 13) {
            alert("het");
        }
    });

    function sendButton() {
        send(document.getElementById("message").value);
        listenAndUpdate();
    }

    function send(message){
        document.getElementById("message").value = "";
        xhttp.open("GET", "pChatAjax.php?s=" + message, false);
        xhttp.send();
    }

    function listenAndUpdate(){
        xhttp.open("GET", "pChatAjax.php?r=20", false);
        xhttp.send();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                input.innerHTML = xhttp.responseText;
            }
        };
    }
</script>