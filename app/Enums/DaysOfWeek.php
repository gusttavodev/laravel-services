<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class DaysOfWeek extends Enum
{
    public const monday =   [
        'day'              => 'monday',
        'label'            => 'Segunda',
        'start_time'       => null,
        'end_time'         => null,
        'not_open'         => false,
        'start_time_error' => false,
        'end_time_error'   => false,
    ];
    public const tuesday =   [
        'day'              => 'tuesday',
        'label'            => 'Terça',
        'start_time'       => null,
        'end_time'         => null,
        'not_open'         => false,
        'start_time_error' => false,
        'end_time_error'   => false,
    ];
    public const wednesday =   [
        'day'              => 'wednesday',
        'label'            => 'Quarta',
        'start_time'       => null,
        'end_time'         => null,
        'not_open'         => false,
        'start_time_error' => false,
        'end_time_error'   => false,
    ];
    public const thursday =   [
        'day'              => 'thursday',
        'label'            => 'Quinta',
        'start_time'       => null,
        'end_time'         => null,
        'not_open'         => false,
        'start_time_error' => false,
        'end_time_error'   => false,
    ];
    public const friday =   [
        'day'              => 'friday',
        'label'            => 'Sexta',
        'start_time'       => null,
        'end_time'         => null,
        'not_open'         => false,
        'start_time_error' => false,
        'end_time_error'   => false,
    ];
    public const saturday =   [
        'day'              => 'saturday',
        'label'            => 'Sabado',
        'start_time'       => null,
        'end_time'         => null,
        'not_open'         => false,
        'start_time_error' => false,
        'end_time_error'   => false,
    ];
    public const sunday =   [
        'day'              => 'sunday',
        'label'            => 'Domingo',
        'start_time'       => null,
        'end_time'         => null,
        'not_open'         => false,
        'start_time_error' => false,
        'end_time_error'   => false,
    ];

    public const List =   [
        self::monday,
        self::tuesday,
        self::wednesday,
        self::thursday,
        self::friday,
        self::saturday,
        self::sunday,
    ];
}
