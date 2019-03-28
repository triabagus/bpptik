<?php
include "fungsi.php";
   $funct   = new LinkedList();
   $funct->insertFirst('tria');
   $funct->insertAfter('tria','bagus');
   $funct->insertLast('nur');
   $funct->insertBefore('bagus','taufik');

   $funct->reverse();

//    $funct->deleteFirst();
//    $funct->deleteLast();
//    $funct->delete("bagus");
//    $funct->deleteAll("nur");

   $hasil = $funct->getNthElement(0);

   echo "<pre>";
    print_r($hasil);
   echo"</pre>";
?>