<?php
    $startPage = $_GET['page'];
    $perPage = 10;
    $currentRecord = 0;
    $xml = new SimpleXMLElement('xmlfile.xml', 0, true);

      foreach($xml->product as $key => $value)
        {
         $currentRecord += 1;
         if($currentRecord > ($startPage * $perPage) && $currentRecord < ($startPage * $perPage + $perPage)){

        echo "<a href=\"http://www.example.org/test/test1.php?sku={$value->sku}\">$value->name</a>";    

        //echo $value->name;

        echo "<br>";

        }
        }
//and the pagination:
        for ($i = 1; $i <= ($currentRecord / $perPage); $i++) {
           echo("<a href='thispage.php?page=".$i."'>".$i."</a>");
        } ?>