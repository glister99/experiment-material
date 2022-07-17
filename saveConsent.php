<?php
   header('Content-Type: application/plain');
   $json = $_POST['data'];
   $jencode = json_decode($json, true);
   
   $forcsv = '';

   foreach($jencode as $value)
   {
     $forcsv = $forcsv.'"'.$value['participant'].'","'.$value['sign'].'","'.$value['email'].'","'.$value['question'].'","'.$value['answer'].'"'.PHP_EOL;
   }

   if(file_exists('consent.csv')){
     $exist = 'consent.csv found!';
   }
   else{
    $exist = 'consent.csv not found.';
   }

   $file = fopen('consent.csv','a+') or die('Cannot open file');
   fwrite($file, $forcsv);
   fclose($file);

   echo $exist;
   
   exit();
?>
