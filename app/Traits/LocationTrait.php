<?php
namespace App\Traits;

trait LocationTrait{

    public function distance($lon,$lat,$lonToilet, $latToilet){
        $latRad = $lat * pi()/180;
        $latRadToilet = $latToilet * pi()/180;
        $diffLat = ($latToilet - $lat) * pi()/180;
        $diffLon = ($lonToilet - $lon) * pi()/180;
        $r = 6371000;
        $a = sin($diffLat/2) * sin($diffLat/2) + cos($latRad) * cos($latRadToilet) * sin($diffLon/2) * sin($diffLon/2);
        $c = 2 * atan2(sqrt($a),sqrt(1-$a));
        return round(($r * $c)/1000,3);
    }

    public function toilets(){
        $jsonUrl = 'http://opendata.visitflanders.org/accessibility/services-facilities/public_toilet_v2.json';
        $json = file_get_contents($jsonUrl);
        $toilets = json_decode($json);
        return $toilets;
    }
}
