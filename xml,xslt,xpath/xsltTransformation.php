<?php

class xsltTransformation {
  
  public function __construct($xmlfilename, $xslfilename) {
    $xml = new DOMDocument();
    $xml->load($xmlfilename);
    
    $xsl = new DOMDocument();
    $xsl->load($xslfilename);
    
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);
    
    echo $proc->transformToXml($xml);
  }
}

$worker = new XSLTTransformation("user.xml", "userDisplay1.xsl");
$worker = new XSLTTransformation("user.xml", "userDisplay2.xsl");
$worker = new XSLTTransformation("user.xml", "userDisplay3.xsl");
?>
