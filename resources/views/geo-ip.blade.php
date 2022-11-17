<html>
<head>
 <title>IP地址檢測，我的IP地址是多少？</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    if (getenv(HTTP_X_FORWARDED_FOR)) {
        $pipaddress = getenv(HTTP_X_FORWARDED_FOR);
        $ipaddress = getenv(REMOTE_ADDR);
        echo "<br>您的代理IP地址是: ".$pipaddress. " (via $ipaddress) " ;
    } else {
        $ipaddress = getenv(REMOTE_ADDR);
        echo "<br>您的IP地址是 : $ipaddress";
    }
  $geoip_city_country_code = getenv(GEOIP_CITY_COUNTRY_CODE);
  $geoip_city_country_code3 = getenv(GEOIP_CITY_COUNTRY_CODE3);
  $geoip_city_country_name = getenv(GEOIP_CITY_COUNTRY_NAME);
  $geoip_region = getenv(GEOIP_REGION);
  $geoip_city = getenv(GEOIP_CITY);
  $geoip_postal_code = getenv(GEOIP_POSTAL_CODE);
  $geoip_city_continent_code = getenv(GEOIP_CITY_CONTINENT_CODE);
  $geoip_latitude = getenv(GEOIP_LATITUDE);
  $geoip_longitude = getenv(GEOIP_LONGITUDE);
  echo "<br>國家 : $geoip_city_country_name ( $geoip_city_country_code3 , $geoip_city_country_code ) ";
  echo "<br>地區 :  $geoip_region";
  echo "<br>程式 :  $geoip_city ";
  echo "<br>郵政編號 :  $geoip_postal_code";
  echo "<br>所在州 :  $geoip_city_continent_code";
  echo "<br>緯度 :  $geoip_latitude ";
  echo "<br>經度 :   $geoip_longitude ";

?>
</body>
</html>
