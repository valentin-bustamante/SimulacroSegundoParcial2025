<?php

class Locomotora{
    private $peso;
    private $velocidad;

    //constructor

    public function __construct( $peso,  $velocidad){
        $this->peso = $peso;
        $this->velocidad = $velocidad;
    }

    //gets

    public function getPeso() {return $this->peso;}

	public function getVelocidad() {return $this->velocidad;}

	//sets

    public function setPeso( $peso): void {$this->peso = $peso;}

	public function setVelocidad( $velocidad): void {$this->velocidad = $velocidad;}

	//__toString

    public function __toString(){
    return "Locomotora:\n" .
           "Peso: " . $this->getPeso() . " kg\n" .
           "Velocidad máxima: " . $this->getVelocidad() . " km/h\n";
    }


	
}