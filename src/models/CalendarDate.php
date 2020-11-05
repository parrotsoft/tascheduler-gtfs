<?php


namespace App\models;


class CalendarDate
{
    /**
     * Obligatorio: Obligatorio
     * Tipo: ID de referencia de calendar.service_id o ID
     * Descripcion: Identifica un conjunto de fechas en el que haya una excepción del servicio para una o más rutas.
     * Cada par (service_id, date) puede aparecer solo una vez en calendar_dates.txt si usas calendar.txt y
     * calendar_dates.txt en conjunto. Si aparece un valor service_id en calendar.txt y calendar_dates.txt,
     * la información de calendar_dates.txt modifica la información de servicio especificada en calendar.txt.
     */
    private $service_id = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Fecha
     * Descripcion: Indica la fecha en la que ocurre la excepción del servicio.
     */
    private $date = null;

    /**
     * Obligatorio: Obligatorio
     * Tipo: Enumeración
     * Descripcion: Indica si el servicio está disponible en la fecha especificada en el campo de fecha.
     * Las opciones válidas son las siguientes:
     *
     * 1: Se agregó el servicio para la fecha especificada.
     * 2: Se quitó el servicio para la fecha especificada.
     */
    private $exception_type = null;

    public function __toArray()
    {
        return [
            'service_id' => $this->service_id,
            'date' => $this->date ,
            'exception_type' => $this->exception_type
        ];
    }


}