<?php

class Vagon{
    private $anio_instalacion;
    private $largo;
    private $ancho;
    private $peso_vacio;

    //contructor

    public function __construct( $anio_instalacion,  $largo,  $ancho,  $peso_vacio){
        $this->anio_instalacion = $anio_instalacion;
        $this->largo = $largo;
        $this->ancho = $ancho;
        $this->peso_vacio = $peso_vacio;
    }

    //gets

    public function getAnioInstalacion() {return $this->anio_instalacion;}

	public function getLargo() {return $this->largo;}

	public function getAncho() {return $this->ancho;}

	public function getPesoVacio() {return $this->peso_vacio;}

    //sets

	public function setAnioInstalacion( $anio_instalacion): void {$this->anio_instalacion = $anio_instalacion;}

	public function setLargo( $largo): void {$this->largo = $largo;}

	public function setAncho( $ancho): void {$this->ancho = $ancho;}

	public function setPesoVacio( $peso_vacio): void {$this->peso_vacio = $peso_vacio;}

	//calcularPesoVagon

   public function calcularPesoVagon($peso_adicional = 0) {
    $peso_vacio = $this->getPesoVacio();
    return $peso_vacio + $peso_adicional;
}


    //__toString

    public function __toString(): string {
    return "Vagón: Año de instalación = {$this->anio_instalacion}, Largo = {$this->largo} m, Ancho = {$this->ancho} m, Peso vacío = {$this->peso_vacio} kg";
}


	
}