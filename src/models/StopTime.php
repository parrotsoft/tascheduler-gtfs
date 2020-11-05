<?php


namespace App\models;


class StopTime
{
    /**
     * Obligatorio: Obligatorio
     * Tipo: ID de referencia de trips.trip_id
     * Descripcion: Identifica un viaje.
     */
    private $trip_id = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: Hora
     * Descripcion: Indica la hora de llegada a una parada específica para un viaje en particular de una ruta.
     * Si no hay horarios diferentes para la llegada y la salida en una parada, ingresa el mismo valor para arrival_time
     * y departure_time. Para los horarios posteriores a la medianoche del día de servicio, ingresa la hora como un
     * valor superior a 24:00 en HH:MM:SS, hora local, del día en que comienza el programa de viajes.
     *
     * Las paradas programadas en las cuales un vehículo respeta exactamente los horarios de llegada y
     * salida especificados son puntos temporales. Si esta parada no es un punto temporal, te recomendamos proporcionar
     * un horario estimado o interpolado. Si no está disponible, el campo arrival_time puede quedar vacío. Luego, indica
     * que los horarios interpolados se proporcionan con timepoint=0. Si los horarios interpolados se indican con
     * timepoint=0, los puntos temporales deben indicarse con timepoint=1. Proporciona horas de llegada para todas las
     * paradas que sean puntos temporales. Debes especificar la hora de llegada correspondiente a la primera y la
     * última parada de un viaje.
     */
    private $arrival_time = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: Hora
     * Descripcion: Indica la hora de salida de una parada específica para un viaje en particular de una ruta.
     * En el caso de los horarios posteriores a la medianoche en el día de servicio, introduce la hora como un valor
     * mayor que 24:00:00 en HH:MM:SS, hora local, correspondiente al día en que empieza el horario del viaje.
     * Si no hay horarios diferentes para la llegada y la salida en una parada, ingresa el mismo valor para arrival_time
     * y departure_time. Consulta la descripción de arrival_time para obtener más detalles sobre el uso correcto de
     * los puntos temporales.
     *
     * El campo departure_time debe especificar valores de tiempo siempre que sea posible, incluidos los horarios
     * estimados o interpolados no vinculantes entre puntos temporales.
     */
    private $departure_time = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: 	ID de referencia de stops.stop_id
     * Descripcion: Identifica una parada de servicio. Todas las paradas de servicio durante un viaje deben registrarse
     * en stop_times.txt. Las ubicaciones especificadas deben ser paradas; no pueden ser estaciones ni entradas a
     * estaciones. Puede haber varias paradas de servicio en el mismo viaje, y diferentes viajes y rutas pueden tener
     * la misma parada de servicio.
     */
    private $stop_id = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Número entero no negativo
     * Descripcion: 	Identifica el orden de las paradas de un viaje determinado. Los valores deben aumentar a lo
     * largo del viaje, pero no es necesario que sean consecutivos.
     * Ejemplo: la primera ubicación del viaje podría tener un valor de stop_sequence = 1; la segunda, un valor de
     * stop_sequence = 23; la tercera, un valor de stop_sequence = 40, y así sucesivamente.
     */
    private $stop_sequence = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Contiene el texto que aparece en la señalización que identifica el destino del viaje para los pasajeros.
     * Este campo anula el valor predeterminado trips.trip_headsign cuando la señal de destino cambia entre las paradas.
     * Si la señal corresponde a un viaje completo, usa el valor trips.trip_headsign en su lugar.
     * Un valor stop_headsign especificado para un valor stop_time no se aplica a los siguientes valores stop_time en el
     * mismo viaje. Si deseas anular el valor trip_headsign para varios stop_time en el mismo viaje, el valor
     * stop_headsign debe repetirse en cada fila de stop_time.
     */
    private $stop_headsign = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica el método de recogida de pasajeros. Las opciones válidas son las siguientes:
     *
     * 0 o en blanco: Recogida programada con regularidad.
     * 1: No hay recogidas disponibles.
     * 2: Se debe llamar a la empresa para organizar una recogida.
     * 3: Se debe coordinar con el conductor para organizar una recogida de pasajeros.
     */
    private $pickup_type = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica el método para dejar pasajeros. Las opciones válidas son las siguientes:
     * 0 o en blanco: Parada habitual y programada para bajar pasajeros.
     * 1: No hay paradas para dejar pasajeros disponibles.
     * 2: Se debe llamar a la empresa para organizar una parada de bajada de pasajeros.
     * 3: Se debe coordinar la parada de bajada de pasajeros con el conductor.
     */
    private $drop_off_type = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica si un pasajero puede subir al vehículo de transporte público en cualquier punto del
     * recorrido del vehículo. shapes.txt describe el recorrido, desde esta stop_time hasta la siguiente stop_time en
     * la stop_sequence del viaje. Las opciones válidas son las siguientes:
     *
     * 0: Paradas continuas de recogida de pasajeros.
     * 1 o en blanco: No hay paradas continuas de recogida de pasajeros.
     * 2: Se debe llamar a una empresa para organizar paradas continuas de recogida de pasajeros.
     * 3: Se deben coordinar las paradas continuas de recogida de pasajeros con el conductor.
     *
     * El comportamiento de paradas continuas de recogida de pasajeros indicado en stop_times.txt
     * anula cualquier comportamiento definido en routes.txt.
     */
    private $continuous_pickup = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica si un pasajero puede descender del vehículo de transporte público en cualquier punto del
     * recorrido del vehículo, tal como se describe en shapes.txt, desde esta stop_time hasta la siguiente stop_time en
     * la stop_sequence del viaje.
     *
     * 0: Paradas continuas de bajada de pasajeros.
     * 1 o en blanco: No hay paradas continuas de bajada de pasajeros.
     * 2: Se debe llamar a una empresa para organizar paradas continuas de bajada de pasajeros.
     * 3: Se deben coordinar las paradas continuas de bajada de pasajeros con el conductor.
     *
     * El comportamiento de paradas continuas de bajada de pasajeros indicado en stop_times.txt anula cualquier
     * comportamiento definido en routes.txt.
     */
    private $continuous_drop_off = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Punto flotante no negativo
     * Descripcion: Indica la distancia real recorrida a lo largo de una forma asociada desde la primera parada hasta
     * la parada que se especifica en este registro. Este campo indica la porción de la forma que debe trazarse entre
     * dos paradas durante un viaje. Debe expresarse con las mismas unidades que se usan en shapes.txt. Los valores
     * utilizados para shape_dist_traveled deben aumentar junto con los de stop_sequence y no pueden usarse para
     * mostrar el recorrido inverso de una ruta.
     *
     * Ejemplo: Si un autobús recorre una distancia de 5.25 km desde el inicio de la forma hasta la parada,
     * shape_dist_traveled = 5.25.
     */
    private $shape_dist_traveled = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica si el vehículo de transporte público respeta estrictamente las horas de llegada y salida
     * especificadas para una parada o si, de lo contrario, se aproxima a esas horas o las interpola. Este campo
     * permite que un productor de GTFS proporcione horarios de parada interpolados, pero también le permite indicar
     * que los horarios son aproximados. Las opciones válidas son las siguientes:
     * 0: Los horarios se consideran como aproximados.
     * 1 o en blanco: Los horarios se consideran como exactos.
     */
    private $timepoint = null;

    public function __toArray()
    {
        return [
            'trip_id' => $this->trip_id,
            'arrival_time' => $this->arrival_time,
            'departure_time' => $this->departure_time,
            'stop_id' => $this->stop_id,
            'stop_sequence' => $this->stop_sequence,
            'stop_headsign' => $this->stop_headsign,
            'pickup_type' => $this->pickup_type,
            'drop_off_type' => $this->drop_off_type,
            'continuous_pickup' => $this->continuous_pickup,
            'continuous_drop_off' => $this->continuous_drop_off,
            'shape_dist_traveled' => $this->shape_dist_traveled,
            'timepoint' => $this->timepoint
        ];
    }

}