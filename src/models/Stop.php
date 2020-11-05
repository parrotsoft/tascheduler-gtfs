<?php


namespace App\models;


class Stop
{
    /**
     * Obligatorio: Obligatorio
     * Tipo: ID
     * Descripcion: Identifica una parada, una estación o la entrada de una estación.
     * El término "entrada de una estación" hace referencia tanto a las entradas como a las salidas de la estación.
     * Las paradas, las estaciones y las entradas de las estaciones se denominan colectivamente "ubicaciones".
     * Es posible que varias rutas utilicen la misma parada.
     */
    public $stop_id = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Incluye un texto breve o un número que identifica la ubicación para los pasajeros. Estos códigos
     * suelen usarse en los sistemas de información de transporte público para teléfonos o se encuentran impresos en la
     * señalización a fin de que los pasajeros obtengan fácilmente información sobre una ubicación en especial.
     * El código stop_code puede ser igual a stop_id si es público. Este campo se debe dejar vacío para las ubicaciones
     * sin un código para los pasajeros.
     */
    public $stop_code = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: Texto
     * Descripcion: Indica el nombre de la ubicación. Usa un nombre que resulte comprensible para las personas, ya sean
     * locales o turistas. Si la ubicación es un área de embarque (location_type=4), stop_name debe contener el nombre
     * de dicha área tal como lo muestra la empresa. Puede ser simplemente una letra (como en algunas estaciones de tren
     * interurbanas europeas) o frases como "Área de embarque para sillas de ruedas" (como en el metro de Nueva York) o
     * "Frente de trenes cortos" (en el RER de París).
     * Condicionalmente obligatorio:
     * • Obligatorio para las ubicaciones que son paradas (location_type=0), estaciones (location_type=1) o
     * entradas/salidas de estaciones (location_type=2)
     * • Opcional para las ubicaciones que son nodos genéricos (location_type=3) o áreas de embarque (location_type=4)
     */
    public $stop_name = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Es una descripción de la ubicación que proporciona información útil y de buena calidad. No
     * reproduzcas simplemente el nombre de la ubicación.
     */
    public $stop_desc = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: Latitud
     * Descripcion: Indica la latitud de la ubicación.
     * Condicionalmente obligatorio:
     * • Obligatorio para ubicaciones que son paradas (location_type=0), estaciones (location_type=1) o entradas/salidas
     * (location_type=2)
     * • Opcional para ubicaciones que son nodos genéricos (location_type=3) o áreas de embarque (location_type=4)
     */
    public $stop_lat = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: Longitud
     * Descripcion: Indica la longitud de la ubicación.
     * Condicionalmente obligatorio:
     * • Obligatorio para las ubicaciones que son paradas (location_type=0), estaciones (location_type=1) o
     * entradas/salidas (location_type=2)
     * • Opcional para las ubicaciones que son nodos genéricos (location_type=3) o áreas de embarque (location_type=4)
     */
    public $stop_lon = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: ID
     * Descripcion: Identifica la zona tarifaria de una parada. Este campo es obligatorio si se proporciona información
     * de las tarifas mediante fare_rules.txt; de lo contrario, es opcional. Si este registro corresponde a una estación
     * o la entrada de una estación, zone_id se ignora.
     */
    public $zone_id = null;

    /**
     * Obligatorio: Opcional
     * Tipo: URL
     * Descripcion: Contiene la URL de una página web sobre la ubicación. Debe ser diferente de los valores de campo
     * agency.agency_url y routes.route_url.
     */
    public $stop_url = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Tipo de ubicación:
     * • 0 (o en blanco): Parada (o Plataforma). Una ubicación en la que los pasajeros suben a bordo o bajan de un
     * vehículo de transporte público. Se denomina plataforma cuando se define dentro de una parent_station.
     * • 1: Estación: Una estructura física o área que contiene una o varias plataformas.
     * • 2: Entrada/salida: Una ubicación en la que los pasajeros pueden entrar a la estación desde la calle o salir de
     * la estación hacia la calle. Si una entrada o salida pertenecen a varias estaciones, pueden vincularse a ambas
     * mediante recorridos, pero el proveedor de datos debe elegir una de ellas como la principal.
     * • 3: Nodo genérico: Es una ubicación dentro de una estación que no coincide con ningún otro location_type y que
     * se puede usar para vincular los recorridos que se definen en pathways.txt.
     * • 4: Área de embarque: Es una ubicación específica en una plataforma en la que los pasajeros pueden subir a
     * bordo o bajar de un vehículo.
     */
    public $location_type = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: ID de referencia de stops.stop_id
     * Descripcion: Establece la jerarquía entre las diferentes ubicaciones que se definen en stops.txt. Contiene el ID
     * de la ubicación principal, como se indica a continuación:
     * • Parada/plataforma (location_type=0): El campo parent_station contiene el ID de una estación.
     * • Estación (location_type=1): Este campo debe estar vacío.
     * • Entrada/salida (location_type=2) o nodo genérico (location_type=3 ): El campo parent_station contiene el ID de
     * una estación (location_type=1).
     * • Área de embarque (location_type=4): El campo parent_station contiene el ID de una plataforma.
     *
     * Condicionalmente obligatorio:
     * • Obligatorio para las ubicaciones que son entradas (location_type=2), nodos genéricos (location_type=3) o
     * áreas de embarque (location_type=4)
     * • Opcional para paradas/plataformas (location_type=0)
     * • Prohibido para las estaciones (location_type=1)
     */
    public $parent_station = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Zona horaria
     * Descripcion: Indica la zona horaria de la ubicación. Si la ubicación tiene una estación principal, hereda la
     * zona horaria de esta en lugar de aplicar la propia. Las estaciones y las paradas sin estación principal
     * stop_timezone heredan la zona horaria especificada por agency.agency_timezone. Si se proporcionan valores
     * stop_timezone, los horarios en stop_times.txt se deben ingresar en relación con la medianoche en la zona horaria
     * especificada por agency.agency_timezone. Esto garantiza que los valores de horarios en un viaje siempre aumenten
     * durante el transcurso de un viaje, independientemente de las zonas horarias que atraviese el viaje.
     */
    public $stop_timezone = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica si es posible acceder en silla de ruedas en esa ubicación. Las opciones válidas son las
     * siguientes:
     * Para las paradas sin estación principal:
     * 0 o en blanco (no hay información de accesibilidad para la parada).
     * 1: Algunos vehículos de esta parada permiten el embarque en silla de ruedas.
     * 2: Esta parada no permite el embarque en silla de ruedas.
     *
     * Para las paradas secundarias:
     * 0 o en blanco: La parada hereda el comportamiento de wheelchair_boarding de la estación principal si se especifica allí.
     * 1: Hay una ruta accesible desde el exterior de la estación a la parada o plataforma específica.
     * 2: No hay una ruta accesible desde el exterior de la estación hasta la parada o plataforma específica.
     *
     * Para las entradas o salidas de estaciones:
     * 0 o en blanco: La entrada a la estación hereda el comportamiento de wheelchair_boarding de la estación principal si se especifica allí.
     * 1: La entrada de la estación permite el acceso en silla de ruedas.
     * 2: No hay una ruta accesible desde la entrada de la estación hasta las paradas o plataformas.
     */
    public $wheelchair_boarding = null;

    /**
     * Obligatorio: Opcional
     * Tipo: ID de referencia de levels.level_id
     * Descripcion: Indica el nivel de la ubicación. Se puede usar el mismo nivel en varias estaciones no vinculadas.
     */
    public $level_id = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Es el identificador de plataforma correspondiente a la parada en una plataforma
     * (una parada que pertenece a una estación). Solo debe incluir el identificador de la plataforma (p. ej., "G" o "3").
     * No se deben incluir palabras como "plataforma" o "andén" (o el equivalente específico en el idioma del feed).
     * Esto permite que los consumidores del feed internacionalicen y localicen con mayor facilidad el identificador de
     * la plataforma en otros idiomas.
     */
    public $platform_code = null;

    public function __toArray()
    {
        return [
            'stop_id' => $this->stop_id,
            'stop_code' => $this->stop_code,
            'stop_name' => $this->stop_name,
            'stop_desc' => $this->stop_desc,
            'stop_lat' => $this->stop_lat,
            'stop_lon' => $this->stop_lon,
            'zone_id' => $this->zone_id,
            'stop_url' => $this->stop_url,
            'location_type' => $this->location_type,
            'parent_station' => $this->parent_station,
            'stop_timezone' => $this->stop_timezone,
            'wheelchair_boarding' => $this->wheelchair_boarding,
            'level_id' => $this->level_id,
            'platform_code' => $this->platform_code
        ];
    }
}