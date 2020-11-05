<?php


namespace App\models;


class Trip
{
    /**
     * Obligatorio: Obligatorio
     * Tipo: ID de referencia de routes.route_id
     * Descripcion: Identifica una ruta.
     */
    public $route_id = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: ID de referencia de calendar.service_id o calendar_dates.service_id
     * Descripcion: Identifica un conjunto de fechas en las que el servicio está disponible para una o más rutas.
     */
    public $service_id = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Contiene el texto que aparece en la señalización que identifica el destino del viaje para los
     * pasajeros. Utiliza este campo para distinguir diferentes patrones de servicio en la misma ruta. Si la señal de
     * destino cambia durante un viaje, trip_headsign puede anularse mediante la especificación de valores
     * para stop_times.stop_headsign.
     */
    public $trip_id = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Contiene el texto que aparece en la señalización que identifica el destino del viaje para los pasajeros.
     * Utiliza este campo para distinguir diferentes patrones de servicio en la misma ruta. Si la señal de destino cambia
     * durante un viaje, trip_headsign puede anularse mediante la especificación de valores para stop_times.stop_headsign.
     */
    public $trip_headsign = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Contiene texto público que se utiliza para que los pasajeros identifiquen el viaje, por ejemplo,
     * para que identifiquen los números de tren en los viajes diarios. Si los pasajeros no suelen utilizar los nombres
     * de los viajes, deja este campo vacío. Si se proporciona un valor trip_short_name, este debe identificar de forma
     * exclusiva un viaje en un día de servicio. No lo uses para nombres de destino o designaciones limitadas o expresas.
     */
    public $trip_short_name = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: 	Indica la dirección de un viaje. Este campo no se debe utilizar en la elaboración de rutas, sino
     * que proporciona una manera de diferenciar viajes en función de su sentido al publicar los horarios. Las opciones
     * válidas son las siguientes:
     * 0 - Viaje en una dirección (p. ej., viaje de ida)
     * 1 - Viaje en la dirección opuesta (p. ej., viaje de vuelta)
     * Ejemplo: Los campos trip_headsign y direction_id se pueden utilizar juntos a fin de asignar un nombre a cada
     * sentido del viaje para un conjunto de destinos. Un archivo trips.txt puede contener estos registros para
     * utilizarlos en los horarios:
     * trip_id,...,trip_headsign,direction_id
     * 1234,...,Airport,0
     * 1505,...,Downtown,1
     */
    public $direction_id = null;

    /**
     * Obligatorio: Opcional
     * Tipo: ID
     * Descripcion: Identifica el bloque al que pertenece un viaje. Un bloque se compone de un viaje o de varios viajes
     * secuenciales realizados con el mismo vehículo y se define en función de los valores compartidos de día de
     * servicio y block_id. Un block_id puede incluir viajes con diferentes días de servicio, lo cual genera distintos
     * bloques. Consulta el siguiente ejemplo.
     */
    public $block_id = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: ID de referencia de shapes.shape_id
     * Descripcion: Identifica una forma geoespacial que describe el recorrido del vehículo para un viaje.
     *
     * Condicionalmente obligatorio:
     * Este campo es obligatorio si el viaje tiene un comportamiento continuo definido, a nivel de la ruta o del horario
     * de la parada.
     * De lo contrario, es opcional.
     */
    public $shape_id = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica si existe acceso para sillas de ruedas. Las opciones válidas son las siguientes:
     *
     * 0 o en blanco: No hay información de accesibilidad para el viaje.
     * 1: El vehículo que se utiliza en este viaje en particular puede transportar a, al menos, un pasajero en silla de ruedas.
     * 2: Ningún pasajero en silla de ruedas puede acceder a este viaje.
     */
    public $wheelchair_accessible = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica si se permite el acceso con bicicletas. Las opciones válidas son las siguientes:
     *
     * 0 o en blanco: No hay información sobre el acceso con bicicletas para este viaje.
     * 1: El vehículo que se usa en este viaje en particular puede transportar a, al menos, una bicicleta.
     * 2: No se permite el acceso con bicicleta en este viaje.
     */
    public $bikes_allowed = null;


    public function __toArray()
    {
        return [
            'route_id' => $this->route_id,
            'service_id' => $this->service_id,
            'trip_id' => $this->trip_id,
            'trip_headsign' => $this->trip_headsign,
            'trip_short_name' => $this->trip_short_name,
            'direction_id' => $this->direction_id,
            'block_id' => $this->block_id,
            'shape_id' => $this->shape_id,
            'wheelchair_accessible' => $this->wheelchair_accessible,
            'bikes_allowed' => $this->bikes_allowed,
        ];
    }


}