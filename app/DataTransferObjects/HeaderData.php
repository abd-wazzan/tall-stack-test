<?php

namespace App\DataTransferObjects;

use Spatie\LaravelData\Data;

class HeaderData extends Data
{
    public function __construct(
        public string $name,
    ) {
    }
}