<?php

include_once 'vagon.php';
include_once 'vagonCarga.php';
include_once 'vagonPasajeros.php';
include_once 'locomotora.php';

class Formacion{
    private object $referencia_objeto_locomotora;
    private array $coleccion_vagones;
    private int $cantidad_maxima_vagones;

    //constructor

    public function __construct( $referencia_objeto_locomotora,  $coleccion_vagones,  $cantidad_maxima_vagones){
        $this->referencia_objeto_locomotora = $referencia_objeto_locomotora;
        $this->coleccion_vagones = $coleccion_vagones;
        $this->cantidad_maxima_vagones = $cantidad_maxima_vagones;
    }

    //gets

    public function getReferenciaObjetoLocomotora() {return $this->referencia_objeto_locomotora;}

	public function getColeccionVagones() {return $this->coleccion_vagones;}

	public function getCantidadMaximaVagones() {return $this->cantidad_maxima_vagones;}

	//sets

    public function setReferenciaObjetoLocomotora( $referencia_objeto_locomotora): void {$this->referencia_objeto_locomotora = $referencia_objeto_locomotora;}

	public function setColeccionVagones( $coleccion_vagones): void {$this->coleccion_vagones = $coleccion_vagones;}

	public function setCantidadMaximaVagones( $cantidad_maxima_vagones): void {$this->cantidad_maxima_vagones = $cantidad_maxima_vagones;}

	//incorporarPasajeroFormacion

    public function incorporarPasajeroFormacion($cantidad_pasajeros_abordar) {
    $encontrado = false;
    $vagones = $this->getColeccionVagones();
    $i = 0;
    $elementos = count($vagones);

    while (!$encontrado && $i < $elementos) {
        $vagon = $vagones[$i];

        if (is_a($vagon, 'VagonPasajeros')) {
            // Intentamos incorporar los pasajeros al vagón
            if ($vagon->incorporarPasajeroVagon($cantidad_pasajeros_abordar)) {
                $encontrado = true;
            }
        }

        $i++;
    }

    return $encontrado;

    }

    //incorporarVagonFormacion

    public function incorporarVagonFormacion($unVagon) {
    $exito = false;
    $vagones = $this->getColeccionVagones();
    if (is_a($unVagon, 'Vagon')) {
        $vagones[] = $unVagon;
        $exito = true;
    }

    return $exito;
}

    //promedioPasajeroFormacion

    public function promedioPasajeroFormacion(){
        $vagones = $this->getColeccionVagones();
        $elementos = count($vagones);
        $pasajeros_por_vagon = 0;
        $pasajeros_totales = 0;
        $promedio = 0;
        $vagones_pasajero = 0;
        for ($i=0; $i < $elementos; $i++) { 
            $vagon = $vagones[$i];
            if (is_a($vagon, 'VagonPasajero')) {
                $pasajeros_por_vagon = $vagon->getPasajerosTransportados();
                $pasajeros_totales = $pasajeros_totales + $pasajeros_por_vagon;
                $vagones_pasajero++;
            }
        }
        if ($vagones_pasajero > 0) {
            $promedio = ($pasajeros_totales/$vagones_pasajero);
        }

        return $promedio;
    }

    //pesoFormacion

    public function pesoFormacion() {
    
        $vagones = $this->getColeccionVagones();
        $elementos = count($vagones);
        $peso_vagones_carga = 0;
        $peso_vagones_pasajeros = 0;
        $peso_total = 0;
        for ($i=0; $i < $elementos; $i++) { 
            if (is_a($vagones[$i], 'VagonCarga')) {
                $peso_vagones_carga = $peso_vagones_carga + $vagones[$i]->calcularPesoVagon();
            }
            elseif (is_a($vagones[$i], 'VagonPasajeros')) {
                $peso_vagones_pasajeros = $peso_vagones_pasajeros + $vagones[$i]->calcularPesoVagon();
            }
        }
        $peso_total = $peso_vagones_carga + $peso_vagones_pasajeros;

        return $peso_total;

    }

    //retornarVagonSinCompletar

    public function retornarVagonSinCompletar(){
        $vagones = $this->getColeccionVagones();
        $elementos = count($vagones);
        $encontrado = false;
        $encontrado_vagon = null;
        $i = 0;
        while (!$encontrado && $i < $elementos) { 
            if (is_a($vagones[$i], 'VagonCarga')) {
                if ($vagones[$i]->getPesoCargaTransportada() < $vagones[$i]->getPesoMaximo()) {
                    $encontrado_vagon = $vagones[$i];
                    $encontrado = true;
                }
            }
            elseif (is_a($vagones[$i], 'VagonPasajeros')) {
                if ($vagones[$i]->getPasajerosTransportados() < $vagones[$i]->getCantidadMaximaPasajeros()) {
                    $encontrado_vagon = $vagones[$i];
                    $encontrado = true;
                }
            }
            $i++;
        }
        return $encontrado_vagon;
    }

    //__toString

    public function __toString() {
    $cadena = "🚂 FORMACION DE TREN\n";
    $cadena .= "--------------------------------\n";
    $cadena .= "Locomotora: \n" . $this->getReferenciaObjetoLocomotora() . "\n";
    $cadena .= "Cantidad máxima de vagones: " . $this->getCantidadMaximaVagones() . "\n\n";

    $vagones = $this->getColeccionVagones();
    $cadena .= "🛤️ VAGONES (" . count($vagones) . "):\n";

    foreach ($vagones as $indice => $vagon) {
        $tipo = is_a($vagon, 'VagonPasajeros') ? "Pasajeros" : (is_a($vagon, 'VagonCarga') ? "Carga" : "Desconocido");
        $cadena .= "\n[Vagón " . ($indice + 1) . " - Tipo: $tipo]\n";
        $cadena .= $vagon . "\n";
    }

    $cadena .= "\n📊 Promedio de pasajeros por vagón de pasajeros: " . $this->promedioPasajeroFormacion() . "\n";
    $cadena .= "⚖️ Peso total de la formación: " . $this->pesoFormacion() . " kg\n";

    return $cadena;
}

	
}
