<?php

namespace App\Service;

use Illuminate\Http\Request;

interface BaseServiceInterface
{
    public function get(Request $request);

    public function save(array $data);

    public function jsonResponse($data, int $statusCode);
}
