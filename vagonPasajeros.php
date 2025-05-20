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

    public function cal



    //incorporarPasajeroVagon

    public function incorporarPasajeroVagon($cantidad_pasajeros_nuevos){

    }
	

}