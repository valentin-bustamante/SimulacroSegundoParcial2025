<?php

include_once 'vagon.php';
include_once 'vagonCarga.php';
include_once 'vagonPasajeros.php';
include_once 'locomotora.php';
include_once 'formacion.php';

// 1. Crear locomotora
$locomotora = new Locomotora(188, 140); // peso en toneladas, velocidad en km/h

// 2. Crear los vagones
// VagonPasajeros(anio_instalacion, largo, ancho, peso_vacio, cant_max_pasajeros, cant_actual_pasajeros)
$vagon1 = new VagonPasajeros(2010, 20, 3, 15000, 30, 25, 50);
$vagon2 = new VagonPasajeros(2012, 22, 3, 15000, 50, 50, 50);

// VagonCarga(anio_instalacion, largo, ancho, peso_vacio, peso_carga_transportada, peso_maximo)
$vagonCarga = new VagonCarga(2011, 25, 3.5, 15000, 55000, 60000);

// 3. Crear formación e incorporar los vagones
$formacion = new Formacion($locomotora, [], 10); // capacidad de hasta 10 vagones
$formacion->incorporarVagonFormacion($vagon1);
$formacion->incorporarVagonFormacion($vagonCarga);
$formacion->incorporarVagonFormacion($vagon2);

// 4. Invocar incorporarPasajeroFormacion con 6 pasajeros
echo "🧍‍♂️ Intentando incorporar 6 pasajeros:\n";
$resultado = $formacion->incorporarPasajeroFormacion(6);
echo $resultado ? "Pasajeros incorporados con éxito.\n" : "No se pudieron incorporar los pasajeros.\n";

// 5. Mostrar los vagones
echo "\n🛤️ Estado actual de los vagones:\n";
echo $vagon1 . "\n";
echo $vagonCarga . "\n";
echo $vagon2 . "\n";

// 6. Invocar incorporarPasajeroFormacion con 14 pasajeros
echo "\n🧍‍♂️ Intentando incorporar 14 pasajeros:\n";
$resultado = $formacion->incorporarPasajeroFormacion(14);
echo $resultado ? "Pasajeros incorporados con éxito.\n" : "No se pudieron incorporar los pasajeros.\n";

// 7. Mostrar locomotora
echo "\n🚂 Datos de la locomotora:\n";
echo $locomotora . "\n";

// 8. Mostrar promedio de pasajeros
echo "\n📊 Promedio de pasajeros por vagón de pasajeros: ";
echo $formacion->promedioPasajeroFormacion() . "\n";

// 9. Mostrar peso total de la formación
echo "\n⚖️ Peso total de la formación: ";
echo $formacion->pesoFormacion() . " kg\n";

// 10. Volver a mostrar el estado de los vagones
echo "\n🛤️ Estado final de los vagones:\n";
echo $vagon1 . "\n";
echo $vagonCarga . "\n";
echo $vagon2 . "\n";
