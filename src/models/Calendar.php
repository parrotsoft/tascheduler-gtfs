<?php


namespace App\models;


class Calendar
{
    /**
     * Obligatorio: Obligatorio
     * Tipo: ID
     * Descripcion: Identifica de forma exclusiva un conjunto de fechas en las que el servicio está disponible en una
     * o más rutas. Cada valor service_id puede aparecer como máximo una vez en un archivo calendar.txt.
     */
    private $service_id = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Indica si el servicio funciona todos los lunes del período especificado por los campos start_date y
     * end_date. Ten en cuenta que las excepciones para fechas específicas pueden aparecer en calendar_dates.txt.
     * Las opciones válidas son las siguientes:
     *
     * 1: El servicio está disponible todos los lunes incluidos en el período.
     * 0: El servicio no está disponible los lunes incluidos en el período.
     */
    private $monday = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Funciona de la misma manera que monday, pero se aplica a los martes.
     */
    private $tuesday = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Funciona de la misma manera que monday, pero se aplica a los miércoles.
     */
    private $wednesday = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Funciona de la misma manera que monday, pero se aplica a los jueves.
     */
    private $thursday = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Funciona de la misma manera que monday, pero se aplica a los viernes.
     */
    private $friday = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Funciona de la misma manera que monday, pero se aplica a los sábados.
     */
    private $saturday = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Funciona de la misma manera que monday, pero se aplica a los domingos.
     */
    private $sunday = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Indica el día de comienzo del servicio para el intervalo de servicio.
     */
    private $start_date = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Indica el día de finalización del servicio para el intervalo de servicio. Este día se incluye en
     * el intervalo.
     */
    private $end_date = null;

    public function __toArray()
    {
        return [
            'service_id' => $this->service_id,
            'monday' => $this->monday,
            'tuesday' => $this->tuesday,
            'wednesday' => $this->wednesday,
            'thursday' => $this->thursday,
            'friday' => $this->friday,
            'saturday' => $this->saturday,
            'sunday' => $this->sunday,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date
        ];
    }


}