<?php

namespace App\Http\Livewire;

use App\Actions\GetPeopleDataAction;
use Livewire\Component;

class PeopleTable extends Component
{
    public string $title;
    public array $headers;
    public array $rows;

    public function mount(GetPeopleDataAction $getPeopleDataAction)
    {
        $peopleData = $getPeopleDataAction->handel();
        $this->title = $peopleData?->title;
        $this->headers = $peopleData?->headers->toArray();
        $this->rows = $peopleData?->rows->toArray();
    }

    public function render()
    {

        return view('livewire.people-table')->extends('layouts.app');
    }
}