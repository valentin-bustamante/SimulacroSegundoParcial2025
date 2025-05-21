<?php

include_once 'vagon.php';

class VagonPasajeros extends Vagon{
    private $cantidad_maxima_pasajeros;
    private $pasajeros_transportados;
    private $peso_pasajeros_promedio;

    //constructor de vagonPasajeros

    public function __construct($anio_instalacion,  $largo,  $ancho,  $peso_vacio, $cantidad_maxima_pasajeros,  $pasajeros_transportados,  $peso_pasajeros_promedio){

        //invocaion del constructor de la clase padre vagon

        parent::__construct($anio_instalacion,  $largo,  $ancho,  $peso_vacio);

        //inicializacion de los atributos propios de la clase hija

        $this->cantidad_maxima_pasajeros = $cantidad_maxima_pasajeros;
        $this->pasajeros_transportados = $pasajeros_transportados;
        $this->peso_pasajeros_promedio = $peso_pasajeros_promedio;
    }

    //gets

    public function getCantidadMaximaPasajeros() {return $this->cantidad_maxima_pasajeros;}

	public function getPasajerosTransportados() {return $this->pasajeros_transportados;}

	public function getPesoPasajerosPromedio() {return $this->peso_pasajeros_promedio;}

	//sets

    public function setCantidadMaximaPasajeros( $cantidad_maxima_pasajeros): void {$this->cantidad_maxima_pasajeros = $cantidad_maxima_pasajeros;}

	public function setPasajerosTransportados( $pasajeros_transportados): void {$this->pasajeros_transportados = $pasajeros_transportados;}

	public function setPesoPasajerosPromedio( $peso_pasajeros_promedio): void {$this->peso_pasajeros_promedio = $peso_pasajeros_promedio;}

    //calcularPesoVagon

    public function calcularPesoVagon($peso_adicional=null): float {
    $peso_pasajeros = $this->getPesoPasajerosPromedio();
    $cantidad_pasajeros = $this->getPasajerosTransportados();
    $peso_adicional = $cantidad_pasajeros * $peso_pasajeros;
    
    return parent::calcularPesoVagon($peso_adicional);
}
    //incorporarPasajeroVagon

    public function incorporarPasajeroVagon($cantidad_pasajeros_nuevos){
        $exito = false;
        $capacidad = $this->getCantidadMaximaPasajeros();
        $pasajeros_abordo = $this->getPasajerosTransportados();
        $pasajeros_totales = $pasajeros_abordo + $cantidad_pasajeros_nuevos;
        if ($pasajeros_totales <= $capacidad) {
            $exito = true;
            $this-> setPasajerosTransportados($pasajeros_totales);
        }
        return $exito;
    }

    //__toString

    public function __toString(){
    return "Vagón de Pasajeros:\n" .
           parent::__toString() .
           "Capacidad máxima de pasajeros: " . $this->getCantidadMaximaPasajeros() . "\n" .
           "Pasajeros transportados: " . $this->getPasajerosTransportados() . "\n" .
           "Peso promedio por pasajero: " . $this->getPesoPasajerosPromedio() . " kg\n" .
           "Peso total del vagón: " . $this->calcularPesoVagon() . " kg\n";
    }


}