<?php


namespace App\models;


class FeedInfo
{
    /**
     * Obligatorio: Obligatorio
     * Tipo: Texto
     * Descripcion: Incluye el nombre completo de la organización que publica el conjunto de datos. Puede coincidir
     * con uno de los valores de agency.agency_name.
     */
    private $feed_publisher_name = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: URL
     * Descripcion: Incluye la URL del sitio web de la organización que publica el conjunto de datos. Puede coincidir
     * con uno de los valores de agency.agency_url.
     */
    private $feed_publisher_url = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Código de idioma
     * Descripcion: Especifica el idioma predeterminado para el texto de este conjunto de datos. Esta configuración
     * ayuda a los usuarios de GTFS a elegir las reglas sobre el uso de mayúsculas y otros parámetros específicos de la
     * configuración de idioma para el conjunto de datos.
     */
    private $feed_lang = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Código de idioma
     * Descripcion: Define el idioma que se utiliza cuando el consumidor de datos no sabe qué idioma habla el pasajero.
     * Se suele definir con el valor en, inglés.
     */
    private $default_lang = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Fecha
     * Descripcion: El conjunto de datos brinda información completa y confiable sobre los horarios del servicio en el
     * período que se extiende desde el comienzo del día de feed_start_date y el final del día de feed_end_date.
     * Ambos días pueden quedar en blanco si no están disponibles. La fecha de feed_end_date no debe ser anterior a la
     * fecha de feed_start_date si ambas están disponibles.
     */
    private $feed_start_date = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Fecha
     * Descripcion: Consulta la fila de feed_start_date en esta tabla.
     */
    private $feed_end_date = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Texto
     * Descripcion: Es una string que indica cuál es la versión actual del conjunto de datos GTFS. Es posible que las
     * aplicaciones consumidoras de la especificación GTFS muestren este valor para ayudar a los publicadores de
     * conjuntos de datos a determinar si se incorporó la versión más reciente de su conjunto de datos.
     */
    private $feed_version = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Correo electrónico
     * Descripcion: Proporciona una dirección de correo electrónico para las comunicaciones acerca del conjunto de
     * datos de GTFS y las prácticas relacionadas con la publicación de datos. feed_contact_email es un contacto
     * técnico para las aplicaciones que usan la especificación GTFS. Utiliza el archivo agency.txt para brindar
     * información de contacto del servicio de atención al cliente.
     */
    private $feed_contact_email = null;

    /**
     * Obligatorio: Opcional
     * Tipo: URL
     * Descripcion: Proporciona una URL para la información de contacto, un formulario web, el servicio de asistencia,
     * o bien otras herramientas diseñadas para facilitar la comunicación acerca del conjunto de datos GTFS y las
     * prácticas de publicación de datos. feed_contact_url es un contacto técnico para las aplicaciones que usan la
     * especificación GTFS. Utiliza el archivo agency.txt para brindar información de contacto del servicio de
     * atención al cliente.
     */
    private $feed_contact_url = null;

    public function __toArray()
    {
        return [
            'feed_publisher_name' => $this->feed_publisher_name,
            'feed_publisher_url' => $this->feed_publisher_url,
            'feed_lang' => $this->feed_lang,
            'default_lang' => $this->default_lang,
            'feed_start_date' => $this->feed_start_date,
            'feed_end_date' => $this->feed_end_date,
            'feed_version' => $this->feed_version,
            'feed_contact_email' => $this->feed_contact_email,
            'feed_contact_url' => $this->feed_contact_url
        ];
    }

}