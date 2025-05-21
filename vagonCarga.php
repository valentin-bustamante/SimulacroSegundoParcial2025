<?php

include_once 'vagon.php';

class VagonCarga extends Vagon{
    private $peso_maximo;
    private $peso_carga_transportada;
    private $indice_adicional;

    //constructor de la clase VagonCarga

    public function __construct( $anio_instalacion,  $largo,  $ancho,  $peso_vacio, $peso_maximo,  $peso_carga_transportada){

        //invocaion del constructor de la clase padre vagon

        parent::__construct($anio_instalacion,  $largo,  $ancho,  $peso_vacio);

        $this->peso_maximo = $peso_maximo;
        $this->peso_carga_transportada = $peso_carga_transportada;
        $this->indice_adicional = 0;
    }
	
    //gets

   public function getPesoMaximo() {return $this->peso_maximo;}

	public function getPesoCargaTransportada() {return $this->peso_carga_transportada;}

	public function getIndiceAdicional() {return $this->indice_adicional;}

	//sets

    public function setPesoMaximo( $peso_maximo): void {$this->peso_maximo = $peso_maximo;}

	public function setPesoCargaTransportada( $peso_carga_transportada): void {$this->peso_carga_transportada = $peso_carga_transportada;}

	public function setIndiceAdicional( $indice_adicional): void {$this->indice_adicional = $indice_adicional;}

	
	//calcularPesoVagon

    public function calcularPesoVagon($peso_adicional = null){
        $peso_carga = $this->getPesoCargaTransportada();
        $indice_extra = ($peso_carga * 20) / 100;
        $this->setIndiceAdicional($indice_extra);
        $peso_adicional = $peso_carga + $indice_extra;
        $peso_total = parent::calcularPesoVagon($peso_adicional);
        return $peso_total;
    }

    //incorporarCargaVagon

    public function incorporarCargaVagon($cantidad_carga_nueva){
        $exito = false;
        $carga_actual = $this->getPesoCargaTransportada();
        $peso_soportado = $this->getPesoMaximo();
        $nuevo_peso = $carga_actual + $cantidad_carga_nueva;
        if ($nuevo_peso <= $peso_soportado) {
            $this->setPesoCargaTransportada($nuevo_peso);
            $exito = true;
        }
        return $exito;
    }

    //__toString

    public function __toString(){
    return "Vagón de Carga:\n" .
           parent::__toString() .
           "Peso máximo permitido: " . $this->getPesoMaximo() . " kg\n" .
           "Carga transportada: " . $this->getPesoCargaTransportada() . " kg\n" .
           "Índice adicional (20% de la carga): " . $this->getIndiceAdicional() . " kg\n" .
           "Peso total del vagón: " . $this->calcularPesoVagon() . " kg\n";
    }


}