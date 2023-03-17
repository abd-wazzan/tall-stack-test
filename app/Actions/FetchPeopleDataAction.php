<?php

namespace App\Actions;

use App\DataTransferObjects\PeopleData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FetchPeopleDataAction
{
    public function handel(string $url = 'https://cspf-dev-challenge.herokuapp.com'): ?PeopleData
    {
        try {
            $response = Http::timeout(3)->get($url);
            if (isset($response)) {
                return PeopleData::fromResponse($response);
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
        return null;
    }
}