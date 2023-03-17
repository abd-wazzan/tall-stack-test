<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;
use Spatie\LaravelData\Data;

class PersonData extends Data
{
    public function __construct(
        public int $id,
        public string $fname,
        public string $lname,
        public string $email,
        public Carbon $date,
    ) {
    }
}