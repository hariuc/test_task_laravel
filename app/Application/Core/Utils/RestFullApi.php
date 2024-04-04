<?php

namespace App\Application\Core\Utils;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class RestFullApi
{
    public function get(string $path, ?array $args = null): Response
    {
        return Http::get($path);
    }
}
