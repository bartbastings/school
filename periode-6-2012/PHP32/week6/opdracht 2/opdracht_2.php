<?php
$oefening = 2;

include('html_kop.inc.php');

echo "\n<h1>Opdracht $oefening</h1>\n";

echo "\n<h3>XML schrijven</h3>\n";

function csv2xml($file, $container = 'data', $rows = 'row')
{
        $r = "&lt;$container&gt;<br/><br/>";
        $row = 0;
        $cols = 0;
        $titles = array();
       
        $handle = @fopen($file, 'r');
        if (!$handle) return $handle;
       
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
        {
             if ($row > 0) $r .= "&lt;$rows&gt;<br/>";
             if (!$cols) $cols = count($data);
             for ($i = 0; $i < $cols; $i++)
             {
                  if ($row == 0)
                  {
                       $titles[$i] = $data[$i];
                       continue;
                  }
                  
                  $r .= "&lt;$titles[$i]&gt;";
                  $r .= $data[$i];
                  $r .= "&lt;$titles[$i]&gt;<br/>";
             }
             if ($row > 0) $r .= "&lt;$rows&gt;<br/><br/>";
             $row++;
        }
        fclose($handle);
        $r .= "&lt;$container&gt;";
       
        return $r;
}
$xml = csv2xml('http://datasets.flowingdata.com/tv-earners/top-tv-earners.csv','top-tv-earners' ,'Series');

echo $xml;


include('html_staart.inc.php');
?>
