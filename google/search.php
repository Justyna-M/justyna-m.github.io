<?php
$fraza =htmlspecialchars($_GET["name"]);
if($fraza)
{
$json = file_get_contents('cities.json');
$miasta =json_decode($json);
echo "[";
$ile=0;
foreach ($miasta as $v) {
$miasto=json_encode($v);
if(stripos($miasto, $fraza)!=false){
   if($ile!=0) {
   echo ", ";
   echo $miasto;
} else {
   echo $miasto;
   $ile=1;
}
}
}
echo "]";
}

?>