<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

function displayBox($entry){
  arrayAsList(
    array(
      $entry
    )
  );
}
function arrayAsList($values){
  ?>
  <ul class="collection">
  <?php
      foreach($values as $value){
        ?><li class="collection-item"><?php
         echo $value;
        ?></li><?php
      }
  ?>
  </ul>
  <?php
}
function explodeOut($seperator, $data){
  $values = explode($seperator, $data);
  arrayAsList($values);
}
function explodeUserAgent($agent){
  $v1 = explode('(', $agent);
  for ($i = 1; $i < count($v1); $i++){
    $v1[$i] = '('.$v1[$i];
  }
  $v3 = Array();
  foreach ($v1 as $v2){
    $v22 = explode(')', $v2);
    for ($i = 1; $i < count($v22); $i++){
      $v22[$i-1] = $v22[$i-1].')';
    }
    $v3 = array_merge(
      $v3, 
      $v22
    );
  }
  arrayAsList($v3);
}
function getDataSet(){
  $keys = Array(
    "tells me this is your ip adress: " => Array(
      "key" => "REMOTE_ADDR", 
      "action" => function($data){
        include_once 'f_whois.php';
        displayBox($_SERVER[$data]);
      }
    ), 
    "About your ip adress: " => Array(
      "key" => "REMOTE_ADDR", 
      "action" => function($data){
        include_once 'f_whois.php';
        $ip = $_SERVER[$data];
        $whois = whois($ip);
        arrayAsList(
          Array(
            $whois->city.', '.$whois->regionName.', '.$whois->country, 
            $whois->isp, 
            $whois->org
          )
        );
      }
    ), 
    "reports this preferred language: " => Array(
      "key" => "HTTP_ACCEPT_LANGUAGE", 
      "action" => function($data){
        $value = $_SERVER[$data];
        explodeOut(',', $value);
      }
    ), 
    "supports file formats: " => Array(
      "key" => "HTTP_ACCEPT", 
      "action" => function($data){
        $value = $_SERVER[$data];
        explodeOut(',', $value);
      }
    ), 
    "supports compression: " => Array(
      "key" => "HTTP_ACCEPT_ENCODING", 
      "action" => function($data){
        $value = $_SERVER[$data];
        explodeOut(',', $value);
      }
    ), 
    "tells me this about itself: " => Array(
      "key" => "HTTP_USER_AGENT", 
      "action" => function($data){
        $value = $_SERVER[$data];
        explodeUserAgent($value);
      }
    ), 
    "tells me the time is: " => Array(
      "key" => "REQUEST_TIME", 
      "action" => function($data){
        //  Y-m-d\TH:i:s\Z
        displayBox(
            gmdate("T h:i:s | D M Y", $_SERVER[$data])
        );
      }
    )
  );
  return $keys;
}
function template(){
  $keys = Array(
      "template" => Array(
        "key" => "something", 
        "action" => function($data){
          echo "pizza";
        }
      )
    );
  return $keys;
}

?>