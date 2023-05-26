<?php

namespace App\Enums;

enum Prefix: int
{
    case ADMIN = 1;
    case SITES = 2;

    public function name() : string
    {
        return match ($this) {
            self::ADMIN   => 'admin',
            self::SITES   => 'sites',
        };
    }

}
