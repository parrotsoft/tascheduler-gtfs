<?php


namespace App\models;


class Agency
{
    /**
     * Obligatorio: Condicionalmente obligatorio
     * Tipo: ID
     * Descripción: Identifica una marca de transporte público, que suele ser lo mismo que una empresa de transporte público.
     * Ten en cuenta que, en algunos casos, como cuando una empresa opera diversos servicios diferentes,
     * las empresas y las marcas no coinciden. En este documento, se usa el término "empresa" en lugar de "marca".
     * Un conjunto de datos puede contener datos de varias empresas.
     * Este campo es obligatorio cuando el conjunto de datos contiene datos de varias empresas de transporte público;
     * de lo contrario, es opcional.
     */
    public $agency_id = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Texto
     * Descripcion: Contiene el nombre completo de la empresa de transporte público.
     */
    public $agency_name = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: URL
     * Descripcion: URL de la empresa de transporte público.
     */
    public $agency_url = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Zona horaria
     * Descripcion: Contiene la zona horaria del lugar en que se encuentra la empresa de transporte público.
     * Si se especifican varias empresas en el conjunto de datos, cada una de ellas debe tener el mismo
     * valor agency_timezone.
     */
    public $agency_timezone = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Código de idioma
     * Descripcion: Especifica el idioma principal que usa la empresa de transporte público. Este campo ayuda a los usuarios de
     * GTFS a elegir las reglas sobre el uso de mayúsculas y otros parámetros específicos de la configuración de
     * idioma para el conjunto de datos.
     */
    public $agency_lang = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Número de teléfono
     * Descripcion: Indica un número de teléfono de la empresa especificada. Este campo es un valor de string que presenta el número
     * de teléfono correspondiente al área de servicio de la empresa. Puede y debe incluir signos de puntuación para
     * agrupar los dígitos del número. Se permite el uso de texto de marcación (por ejemplo, "503-238-RIDE" de TriMet),
     * pero el campo no debe incluir ningún otro texto descriptivo.
     */
    public $agency_phone = null;

    /**
     * Obligatorio: Opcional
     * Tipo: URL
     * Descripcion: Especifica la URL de una página web que permite que un pasajero compre boletos o cualquier otro instrumento de
     * pasaje en esa empresa en línea.
     */
    public $agency_fare_url = null;

    /**
     * Obligatorio: Opcional
     * Tipo: Correo electrónico
     * Descripcion: Incluye una dirección de correo electrónico que el Departamento de Atención al Cliente de la empresa revisa
     * activamente. Esta dirección de correo electrónico debe ser un punto de contacto directo mediante el cual los
     * pasajeros de transporte público puedan comunicarse con un representante del servicio de atención al cliente
     * de la empresa.
     */
    public $agency_email = null;

    public function __toArray() {
        return [
            'agency_id' => $this->agency_id,
            'agency_name' => $this->agency_name,
            'agency_url' => $this->agency_url,
            'agency_timezone' => $this->agency_timezone,
            'agency_lang' => $this->agency_lang,
            'agency_phone' => $this->agency_phone,
            'agency_fare_url' => $this->agency_fare_url,
            'agency_email' => $this->agency_email
        ];
    }

}