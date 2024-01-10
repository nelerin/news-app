<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ArticleService
{
    protected $apiKey;
    protected $endPoint;

    public function __construct($apiKey, $endPoint)
    {
        $this->apiKey = $apiKey;
        $this->endPoint = $endPoint;
    }

    public function fetchArticles($search, $page)
    {
        $response = Http::get($this->endPoint, [
            'q' => $search,
            'api-key' => $this->apiKey,
            'page' => $page,
        ]);

        return $response->json();
    }
}
