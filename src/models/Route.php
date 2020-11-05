<?php


namespace App\models;


class Route
{
    /**
     * Obligatorio: Obligatorio
     * Tipo: ID
     * Descripcion: Identifica una ruta.
     */
    public $route_id = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: ID de referencia de agency.agency_id
     * Descripcion: Define una empresa para la ruta especificada. Este campo es obligatorio cuando el conjunto de
     * datos proporciona datos de rutas correspondientes a más de una empresa en agency.txt; de lo contrario, es opcional.
     */
    public $agency_id = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: Texto
     * Descripcion: Indica el nombre corto de una ruta. Por lo general, es un identificador corto y abstracto,
     * como "32", "100X" o "Verde", que los pasajeros utilizan para identificar una ruta, pero no proporciona ninguna
     * indicación sobre los lugares que atraviesa. Se debe especificar, al menos, uno de los valores route_short_name y
     * route_long_name, o bien ambos, si corresponde.
     */
    public $route_short_name = null;

    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: Texto
     * Descripcion: Indica el nombre completo de una ruta. Este nombre suele ser más descriptivo que el nombre que se
     * indica en route_short_name y suele incluir el destino o la parada de la ruta. Se debe especificar, al menos, uno
     * de los valores route_short_name y route_long_name, o bien ambos, si corresponde.
     */
    public $route_long_name = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Es una descripción de una ruta que proporciona información útil y de buena calidad. No repitas
     * simplemente el nombre de la ruta.
     */
    public $route_desc = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Indica el tipo de transporte que se usa en una ruta. Las opciones válidas son las siguientes:
     * 0 - Tranvía, trolebús o tren ligero: Cualquier tren ligero o sistema ferroviario a nivel de la calle dentro de un
     * área metropolitana.
     * 1 - Subterráneo o metro: Cualquier sistema ferroviario subterráneo dentro de un área metropolitana.
     * 2 - Tren: Se utiliza para viajes interurbanos o de larga distancia.
     * 3 - Autobús: Se utiliza para rutas en autobús de corta y larga distancia.
     * 4 - Transbordador: Se utiliza para el servicio de transporte por agua de corta y larga distancia.
     * 5 - Tranvía de cable: Se utiliza para todo vehículo ferroviario en el nivel de la calle donde el cable pasa por
     * debajo del vehículo, p. ej., el tranvía en San Francisco.
     * 6 - Servicio de teleférico, vehículo suspendido de cables (p. ej., teleférico, tranvía aéreo): Es un transporte
     * por cable en el que cabinas, vehículos vagones o aerosillas se suspenden mediante uno o más cables.
     * 7 - Funicular: Es un sistema ferroviario diseñado para recorridos con una gran inclinación.
     * 11 - Trolebús: Son autobuses eléctricos que obtienen energía de cables aéreos mediante polos.
     * 12 - Monorriel: Es un transporte ferroviario con vía de un solo riel o una viga.
     */
    public $route_type = null;

    /**
     * Obligatorio: Opcional
     * Tipo: URL
     * Descripcion: Contiene la URL de una página web sobre una ruta específica. Debe ser diferente del valor agency.
     * agency_url.
     */
    public $route_url = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Color
     * Descripcion: Indica la designación de color de la ruta en función del material disponible para el público. Si se
     * omite o se deja vacío, se configura como blanco (FFFFFF) de forma predeterminada. La diferencia de color entre
     * route_color y route_text_color debe proporcionar suficiente contraste cuando se visualiza en una pantalla en
     * blanco y negro.
     */
    public $route_color = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Color
     * Descripcion: Especifica un color legible para el texto superpuesto sobre un fondo del valor route_color.
     * El valor predeterminado es el negro (000000) cuando se omite o se deja vacío. La diferencia de color entre
     * route_color y route_text_color debe proporcionar suficiente contraste cuando se visualiza en una pantalla en
     * blanco y negro.
     */
    public $route_text_color = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Número entero no negativo
     * Descripcion: Ordena las rutas de un modo que resulte ideal para la presentación a los clientes. Las rutas con
     * valores route_sort_order más pequeños se muestran primero.
     */
    public $route_sort_order = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: Indica si un pasajero puede subir al vehículo de transporte público en cualquier punto del
     * recorrido del vehículo. shapes.txt describe el recorrido en cada viaje de la ruta. Las opciones válidas son
     * las siguientes:
     *
     * 0: Paradas continuas de recogida de pasajeros.
     * 1 o en blanco: No hay paradas continuas de recogida de pasajeros.
     * 2: Se debe llamar a una empresa para organizar paradas continuas de recogida de pasajeros.
     * 3: Se deben coordinar las paradas continuas de recogida de pasajeros con el conductor.
     *
     * El comportamiento predeterminado de paradas continuas de recogida de pasajeros definido en routes.txt se
     * puede anular en stop_times.txt.
     */
    public $continuous_pickup = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Enumeración
     * Descripcion: 	Indica si un pasajero puede descender del vehículo de transporte público en cualquier punto del
     * recorrido del vehículo. shapes.txt describe el recorrido en cada viaje de la ruta. Las opciones válidas son las
     * siguientes:
     * 0: Paradas continuas de bajada de pasajeros.
     * 1 o en blanco: No hay paradas continuas de bajada de pasajeros.
     * 2: Se debe llamar a una empresa para organizar paradas continuas de bajada de pasajeros.
     * 3: Se deben coordinar las paradas continuas de bajada de pasajeros con el conductor.
     * El comportamiento predeterminado de paradas continuas de bajada de pasajeros definido en routes.txt se puede anular
     * en stop_times.txt.
     */
    public $continuous_drop_off = null;


    public function __toArray()
    {
        return [
            'route_id' => $this->route_id,
            'agency_id' => $this->agency_id,
            'route_short_name' => $this->route_short_name,
            'route_long_name' => $this->route_long_name,
            'route_desc' => $this->route_desc,
            'route_type' => $this->route_type,
            'route_url' => $this->route_url,
            'route_color' => $this->route_color,
            'route_text_color' => $this->route_text_color,
            'route_sort_order' => $this->route_sort_order,
            'continuous_pickup' => $this->continuous_pickup,
            'continuous_drop_off' => $this->continuous_drop_off
        ];
    }



}