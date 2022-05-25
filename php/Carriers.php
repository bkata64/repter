<?php

include_once('Application.php');

class Carriers extends Application {
    private $sql = array(
        'allCarriers' => "SELECT * FROM carriers",
        'carrier' => "SELECT name, code FROM carriers WHERE id = {id}",
        'sumJarat' => "SELECT SUM(f.arr_flights) AS osszesJarat        
                        FROM flights f
                    INNER JOIN airports_carriers ac
                        ON f.airport_carrier_id = ac.id
                    INNER JOIN carriers c
                        ON ac.carrier_id = c.id
                    WHERE c.id = {id};"
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
}

?>