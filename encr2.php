<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ext.css" <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encrypt Using RC4</title>
</head>

<body>

    <h1 id="main1">Encrypt/Decrypt Text </h1>
    <div id="cont">
        <h1>Your Decrypted Text: <?php echo($_SESSION['deci']);?></h1>
    </div>
    <div>
        <h3> It worked</h3><br>
    </div>
    <button class="btn" id="bttn"><a href="goback.php">Log Off</a></button>

</body>

</html>