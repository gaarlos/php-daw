<?php
  function addToXML ($compare, $newData, $table) {
    $xmlFile = @simplexml_load_file("../xml/".$table."s.xml");

    if (!$xmlFile) {
      $xml = new SimpleXMLElement("<".$table."s></".$table."s>");
    } else {
      $xml = new SimpleXMLElement($xmlFile->asXML());
    }

    $newEntry = $xml->addChild($table);
    $newEntry->addAttribute('id', $compare);

    foreach ($xml as $table) {
      var_dump(property_exists($table, 'id'));
    }


    if($table == 'book') {
      array_unshift($newData, $compare);
      $query = ['isbn', 'title', 'author', 'stock', 'price'];
    } else {
      $query = ['firstname', 'surname', 'email', 'tipo'];
    }

    for ($i = 0; $i < sizeof($query); $i++) {
      $newEntry->addChild($query[$i], $newData[$i]);
    }

    $xml->asXML("../xml/".$table."s.xml");
  }

  function compare ($xml) {
    if($table == 'book') {
      foreach ($xml as $table) {
        var_dump($table->isbn);
      }
    } else {
      foreach ($xml as $table) {
        var_dump($table->email);
      }
    }      

  }
?>