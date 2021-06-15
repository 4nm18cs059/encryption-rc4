<?php
session_start();
    $username=$_POST['username'];
    $key=$_POST['key'];
    $str=$_POST['encr'];
    $link = mysqli_connect('localhost', 'root', '', 'rc4');
    $sql = "SELECT * FROM encryptdec WHERE username = '".$username."';";
$resultw = mysqli_query($link,$sql);

if(mysqli_fetch_row($resultw)!=null)
{
    echo('<script>alert("The username already exists. Try another one!"); 
    window.location.href="index.html";</script>');
}
else
{
   $ciphert=rc4encrypt($key,$str);
    $plahert=decrypt($key,$ciphert);
    $S = array();
       
        
        $sql = "INSERT INTO encryptdec (username, enckeys, encr) VALUES ('".$username."', '".$key."', '".$ciphert."');";
        echo $sql;
        // excecute SQL statement
        $result = mysqli_query($link,$sql);
        $_SESSION['username']=$username;
      $_SESSION['res']=$ciphert;
  header("Location: encr.php");
    }

    function rc4encrypt($key,$data)
    {
        $res = encrypt($key,$data);
        return toHex($res);
    }
    
    function swap(&$v1, &$v2)
    {
        $v1 = $v1 ^ $v2;
        $v2 = $v1 ^ $v2;
        $v1 = $v1 ^ $v2;
    }

    function KSA($key)
    {
        $idx = crc32($key);
        if (!isset($S[$idx])) {
            $S   = range(0, 255);
            $j   = 0;
            $n   = strlen($key);

            for ($i = 0; $i < 256; $i++) {
                $char  = ord($key{$i % $n});
                $j     = ($j + $S[$i] + $char) % 256;
                swap($S[$i], $S[$j]);
            }
            $S[$idx] = $S;
        }
        return $S[$idx];
    }
    function toHex($sa , $len = 0){
        $buf = "";
        if( $len == 0 )
            $len = strlen($sa) ;
        for ($i = 0; $i < $len; $i++)
        {
            $val = dechex(ord($sa{$i}));  
            if(strlen($val)< 2) 
                $val = "0".$val;
                $buf .= $val;
        }
        return $buf;
    }
  
    function encrypt($key, $data)
    {
        $S    = KSA($key);
        $n    = strlen($data);
        $i    = $j = 0;
        $data = str_split($data, 1);

        for ($m = 0; $m < $n; $m++) {
            $i        = ($i + 1) % 256;
            $j        = ($j + $S[$i]) % 256;
            swap($S[$i], $S[$j]);
            $char     = ord($data{$m});
            $char     = $S[($S[$i] + $S[$j]) % 256] ^ $char;
            $data[$m] = chr($char);
        }
        $data = implode('', $data);
        return $data;
    }
 
     function decrypt($key, $data)
    {
        $data = encrypt($key, $data);
        return $data;
    }
    
?>