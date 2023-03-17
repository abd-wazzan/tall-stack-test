<?php

namespace App\Models;

use App\DataTransferObjects\PeopleData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class People extends Model
{
    protected $table = 'people';
    protected $fillable = [
        'title',
        'headers',
        'rows',
    ];

    protected $casts = [
        'headers' => 'array',
        'rows' => 'array',
    ];

    public function fetchFromApi($url = 'https://cspf-dev-challenge.herokuapp.com'): ?PeopleData
    {
        try {
            $response = Http::timeout(3)->get($url);
            if (isset($response)) {
                return PeopleData::fromResponse($response);
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $this->error($exception->getMessage());
            return null;
        }
    }
}
