<?php
    //internal error
   header('Content-Type: application/plain');
   $array = $_POST['data'];
   $header = array("aLeft","bLeft","cLeft","dLeft");
   
   $list = array(
       $header,
       $array
    );

   $file = fopen('left.csv','w') or die('cannot open file');

    /*
   if(file_exists('left.csv')){
    $exist = 'left.csv found!';
    }
    else{
    $exist = 'File not found';
    }
    */

   foreach ($list as $fields) {
        fputcsv($file, $fields);
    }

    echo $array[0] . "\n";
    echo $array[1] . "\n";
    echo $array[2] . "\n";
    echo $array[3] . "<br>";
    echo $file;

   fclose($file);
   
   exit();
?>
