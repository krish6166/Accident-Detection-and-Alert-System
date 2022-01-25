<?php

    $val1 = 21.1458;
    $val2 = 79.0882;

    $ch = curl_init();
    $url = "https://api.opencagedata.com/geocode/v1/json?q={$val1}+{$val2}&key=654142a1a22b44bfb0bd34abedd48c80&pretty=1";
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($data, $assoc=TRUE);
    $adress = "";
    if ($result && $result['total_results'] > 0) {
        $first = $result['results'][0];
        $adress = $first['formatted'];
    }

    $district_name = explode("," , $adress)[2];
    $district_name = explode("-" , $district_name)[0];
    $district_name = strtolower($district_name);
    $district_name = trim($district_name);

?>

https://api.opencagedata.com/geocode/v1/json?q=18.4658+73.6952&key=654142a1a22b44bfb0bd34abedd48c80&pretty=1