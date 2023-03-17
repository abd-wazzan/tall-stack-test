<?php

namespace App\DataTransferObjects;

use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class PeopleData extends Data
{
    public function __construct(
        public string         $title,
        #[DataCollectionOf(HeaderData::class)]
        public DataCollection $headers,
        #[DataCollectionOf(PersonData::class)]
        public DataCollection $rows,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $responseContent = $response->json();
        return self::from([
            'title' => $responseContent['title'],
            'headers' => collect($responseContent['data']['headers'])->map(function ($item) {
                return ['name' => $item];
            })->toArray(),
            'rows' => collect($responseContent['data']['rows'])->map(function ($item) {
                $item['date'] = Carbon::createFromTimestamp($item['date']);
                return $item;
            })->toArray()
        ]);
    }
}