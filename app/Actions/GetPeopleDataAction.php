<?php

namespace App\Actions;

use App\DataTransferObjects\PeopleData;
use App\Models\People;

class GetPeopleDataAction
{
    public function __construct(
        protected People                 $person,
        protected InsertPeopleDataAction $insertPeopleDataAction
    ) {
    }

    public function handel(): ?PeopleData
    {
        /* @var ?\Carbon\Carbon $peopleDataExpiredAt */
        $peopleDataExpiredAt = cache()->get('people_data_expired_at');
        if (!$peopleDataExpiredAt || $peopleDataExpiredAt->lt(now())) {
            return $this->insertPeopleDataAction->handel();
        }
        return PeopleData::from($this->person->newQuery()->latest()->first()?->toArray());
    }
}