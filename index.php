<?php

$table=null;

if(isset($_POST['submitted'])) {
    // we hebben gepost
    //include "includes/sql_functions.php";
    include "classes/sql.php";
    include "classes/html_helper.php";
    $database = new sql();

    // hier controleren we of de user reeds bestaat in de db..
    $username = htmlspecialchars($_POST["uname"]);
    $password = $_POST["psw"];
    if($database->user_exists($username)) {
        // user bestaat
        if($database->user_check($username,$password)) {
            echo "user bestaat en password correct";
        } else {
            echo "user bestaat en password NIET correct";
        }

    } else {
        // user bestaat niet - > toevoegen aan db
        if($database->user_create($username,$password)) {
            echo "user aangemaakt";
        }

    }

    // Zo nee, toevoegen
    // Zo ja, controleren of username / password

    $users = $database->get_users();
    //var_dump($users);
    $table = html_helper::create_usertable($users);
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bijles - Inloggen</title>

    <style>
        body {font-family: Arial, Helvetica, sans-serif;}

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the image and position the close button */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 10%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button (x) */
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {-webkit-transform: scale(0)}
            to {-webkit-transform: scale(1)}
        }

        @keyframes animatezoom {
            from {transform: scale(0)}
            to {transform: scale(1)}
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }

        .tabel {
            border: 1px solid black;
        }

        .tabel .row {
            display: flex;
            border-bottom: 1px solid;
        }

        .tabel .row.header {
            font-weight: bold;
            display: flex;
            border-bottom: 5px solid;
        }

        .tabel .row:nth-child(odd) {
            background-color: #cccccc;
        }

        .tabel .row:nth-child(even) {
            background-color: #f1f1f1;
        }

        .tabel .cell {
            width: 33%;
            padding: 1%;
        }



    </style>

</head>
<body>

<div class="tabel" id="usertable">
    <?=$table?>

   <!-- <div class="row header">
        <div class="cell">kop 1</div>
        <div class="cell">kop 2</div>
        <div class="cell">kop 3</div>
    </div>

    <div class="row">
        <div class="cell">id</div>
        <div class="cell">user</div>
        <div class="cell">password</div>
    </div>-->


</div>


<h2>Modal Login Form</h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
<div id="id01" class="modal">
    <form class="modal-content animate" action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <img src="/images/geslaagd.jpg" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" name="submit">Login</button>

            <input type="hidden" name="submitted" value="yes">
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</div>




<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</body>
</html>