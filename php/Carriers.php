<?php

include_once('Application.php');

class Carriers extends Application {
    private $sql = array(
        'allCarriers' => "SELECT * FROM carriers",
        'carrier' => "SELECT name, code FROM carriers WHERE id = {id}",
        'sumJarat' => "SELECT SUM(f.arr_flights) AS osszesJarat        
                        FROM flights f
                    INNER JOIN airports_carrier ac
                        ON f.airport_carriers_id = ac.id
                    INNER JOIN carriers c
                        ON ac.carrier_id = c.id
                    WHERE c.id = {id};",
        'countAirport' => "SELECT COUNT(ac.airport_id) AS latogatottRepterekSzama
                    FROM airports_carrier ac
                    INNER JOIN carriers c
                        ON ac.carrier_id = c.id
                    WHERE c.id = {id};",
        'cancelledJarat' => "SELECT ROUND((SUM(f.arr_cancelled) / SUM(f.arr_flights)) * 100, 1)  AS cancelledArr
                    FROM flights f
                    INNER JOIN airports_carrier ac
                        ON f.airport_carriers_id = ac.id
                    INNER JOIN carriers c
                        ON ac.carrier_id = c.id
                    WHERE c.id = {id};",
        'avgDelay' => "SELECT ROUND((SUM(f.arr_delay) / SUM(f.arr_flights)), 1)  AS avgDelay
                    FROM flights f
                    INNER JOIN airports_carrier ac
                        ON f.airport_carriers_id = ac.id
                    INNER JOIN carriers c
                        ON ac.carrier_id = c.id
                    WHERE c.id = {id};",
        'forgalmasAir' => "SELECT a.code  
                    FROM airports_carrier ac
                    INNER JOIN airports a
                        ON ac.airport_id = a.id
                    INNER JOIN flights f
                        ON f.airport_carriers_id = ac.id
                    WHERE ac.carrier_id = {id}
                    GROUP BY a.code
                    ORDER BY SUM(f.arr_flights) DESC
                    LIMIT 1;"
    );
    public function __construct(){
        parent:: __construct();           
    }

    public function getCarriers() {
        $carriers = $this->getResultList($this->sql['allCarriers']);
        return $carriers;
    }

    public function getCarrierById($carrierId){
        if(!$this->isValid($carrierId)) {
            return '';
        }
        $params = array("{id}" => $carrierId);
        $carrier = $this->getResultList(strtr($this->sql['carrier'], $params));
        return $carrier[0];
    }

    public function getSumJarat($carrierId){
        if(!$this->isValid($carrierId)) {
            return '';
        }
        $params = array("{id}" => $carrierId);
        $carrier = $this->getResultList(strtr($this->sql['sumJarat'], $params));
        return $carrier[0];
    }

    public function getCountAirport($carrierId){
        if(!$this->isValid($carrierId)) {
            return '';
        }
        $params = array("{id}" => $carrierId);        
        $airportCount = $this->getResultList(strtr($this->sql['countAirport'], $params));
        return $airportCount[0];
    }

    public function getCancelledJarat($carrierId){
        if(!$this->isValid($carrierId)) {
            return '';
        }
        $params = array("{id}" => $carrierId);        
        $cancelledPercent = $this->getResultList(strtr($this->sql['cancelledJarat'], $params));
        return $cancelledPercent[0];
    }

    public function getAvgDelay($carrierId){
        if(!$this->isValid($carrierId)) {
            return '';
        }
        $params = array("{id}" => $carrierId);        
        $avgDelay = $this->getResultList(strtr($this->sql['avgDelay'], $params));
        return $avgDelay[0];
    }

    public function getForgalmasAir($carrierId){
        if(!$this->isValid($carrierId)) {
            return '';
        }
        $params = array("{id}" => $carrierId);        
        $forgAir = $this->getResultList(strtr($this->sql['forgalmasAir'], $params));
        return $forgAir[0];
    }
}

?>