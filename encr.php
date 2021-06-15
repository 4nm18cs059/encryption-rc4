<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ext.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypt Using RC4</title>
</head>

<body>
    <h1 id="main1">Encrypt/Decrypt Text </h1>
    <div>
        <h1>Hello <?php echo( $_SESSION["username"]);?></h1><br>
        <h3>The encrypted message is <?php echo( $_SESSION["res"]);?> </h3>
        <button class="btn" id="bttn"><a href="goback.php">Log Off</a></button>




    </div>
</body>

</html>