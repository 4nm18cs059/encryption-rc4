<?php
session_start();
    $key=$_POST['key'];
    $str=$_POST['decr'];
    $plahert=rc4decrypt($key,$str);
        $S = array();

    
        function swap(&$v1, &$v2)
        {
            $v1 = $v1 ^ $v2;
            $v2 = $v1 ^ $v2;
            $v1 = $v1 ^ $v2;
        }

        function fromHex($sa){
            $buf = "";
            $len = strlen($sa) ;
            for($i = 0; $i < $len; $i += 2){
                $val = chr(hexdec(substr($sa, $i, 2)));
                $buf .= $val;
            }
            return $buf;
        }

        
function rc4decrypt($key,$str){
    $str = fromHex($str);
    return decrypt($key,$str);
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
        
$_SESSION['deci']=$plahert;
header("Location: encr2.php");
?>