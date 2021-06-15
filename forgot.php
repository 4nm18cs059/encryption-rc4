<?php
session_start();
$username=$_POST['username'];
$link = mysqli_connect('localhost', 'root', '', 'rc4');

$sqlr = "SELECT * FROM encryptdec WHERE username = '".$username."';";
$result = mysqli_query($link,$sqlr);


if(mysqli_fetch_row($result)==null)
{
echo('<script>
alert("The username does not exist. Try another one!");
window.location.href = "index3.php";
</script>');
}


$sql = "SELECT enckeys FROM encryptdec WHERE username = '".$username."';";
$resultw = mysqli_query($link,$sql);
$kk= mysqli_fetch_array($resultw);

$sql1 = "SELECT encr FROM encryptdec WHERE username = '".$username."';";
$resultw1 = mysqli_query($link,$sql1);
$dd= mysqli_fetch_array($resultw1);
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
        <h1>Hello <?php  echo($username);?></h1>
    </div>
    <div>
        <h3>Your Key: <?php  echo($kk['enckeys']);?></h3><br>
    </div>
    <div>
        <h3>Your Text: <?php  echo($dd['encr']);?></h3><br>
    </div>
    <button class="btn" id="bttn"><a href="goback.php">Log Off</a></button>

</body>

</html>