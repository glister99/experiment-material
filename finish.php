<?php
   header('Content-Type: application/plain');
   $json = $_POST['data'];
   $jencode = json_decode($json, true);
   
   $forcsv = '';

   foreach($jencode as $value)
   {
     $forcsv = $forcsv.'"'.$value['participant'].'","'.$value['condition'].'","'.$value['switchNo'].'","'.$value['switchStarted'].'","'.$value['duration'].'","'.$value['question'].'","'.$value['answer'].'"'.PHP_EOL;
   }

   /*
   if(file_exists('master.csv')){
     $exist = 'master.csv found!';
   }
   else{
    $exist = 'File not found';
   }
   */

   $file = fopen('master.csv','a+') or die('cannot open file');
   fwrite($file, $forcsv);

   echo fread($file, filesize("master.csv"));

   fclose($file);
   
   
   exit();
?>
