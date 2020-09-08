<?php
function whois($ip){
  return json_decode(
    file_get_contents(
      "http://ip-api.com/json/".$ip
    )
  );
}
?>