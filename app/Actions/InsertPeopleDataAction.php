<?php

namespace App\Actions;

use App\DataTransferObjects\PeopleData;
use App\Models\People;

class InsertPeopleDataAction
{
    public function __construct(
        protected FetchPeopleDataAction $fetchPeopleDataAction,
        protected People $person
    ) {
    }

    public function handel(): ?PeopleData
    {
        $data = $this->fetchPeopleDataAction->handel();
        if ($data) {
            $person = PeopleData::from($this->person->create($data->toArray())?->toArray());
            if ($person) {
                cache()->rememberForever('people_data_expired_at', fn() => now()->addHour());
                return $person;
            }
        }
        return null;
    }
}