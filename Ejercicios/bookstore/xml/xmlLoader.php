<?php
  function addToXML ($compare, $newData, $table) {
    $route = "../xml/files/$table"."s.xml";
    $xmlFile = @simplexml_load_file($route);

    if (!$xmlFile) {
      $xml = new SimpleXMLElement("<".$table."s></".$table."s>");
    } else {
      $xml = new SimpleXMLElement($xmlFile->asXML());
      if (sizeof(getXQuery($xmlFile, $table, $compare)) > 0) { return; }
    }

    $newEntry = $xml->addChild($table);
    $newEntry->addAttribute('id', str_replace('.', 'DOT', str_replace('@', 'AT', $compare)));

    $table == 'book' ? array_unshift($newData, $compare) : null;
    $query = getQuery($table);

    for ($i = 0; $i < sizeof($query); $i++) {
      $newEntry->addChild($query[$i], $newData[$i]);
    }

    $xml->asXML($route);
  }

  function modifyXML ($compare, $newData, $table) {
    $route = "../xml/files/$table"."s.xml";
    $xmlFile = @simplexml_load_file($route);

    if (!$xmlFile) { return; }
    $table == 'book' ? array_unshift($newData, $compare) : null;    
    $query = getQuery($table);
    $xml = getXQuery($xmlFile, $table, $compare);

    if (sizeof($xml) == 0) { return; }

    for ($i = 0; $i < sizeof($query); $i++) {
      $str = $query[$i];
      $xml[0]->$str = $newData[$i];
    }

    $xmlFile->asXML($route);
  }

  function deleteFromXML ($compare, $table) {
    $route = "../xml/files/$table"."s.xml";
    $xmlFile = @simplexml_load_file($route);

    if (!$xmlFile) { return; }
    $table == 'book' ? array_unshift($newData, $compare) : null;
    $query = getQuery($table);
    $xml = getXQuery($xmlFile, $table, $compare);

    for ($i = 0; $i < sizeof($query); $i++) {
      $str = $query[$i];
      $xml[0]->$str = $newData[$i];
    }

    $xmlFile->asXML($route);
  }

  function getXQuery ($xmlFile, $table, $compare) {
    $compare = str_replace('.', 'DOT', str_replace('@', 'AT', $compare));
    $xquery = $table == 'book' ? "//book[@id=$compare]" : "//customer[@id='$compare']";
    return $xmlFile->xpath($xquery);
  }

  function getQuery ($table) {
    return $table == 'book' ? ['isbn', 'title', 'author', 'stock', 'price'] : ['firstname', 'surname', 'email', 'tipo'];
  }
?>