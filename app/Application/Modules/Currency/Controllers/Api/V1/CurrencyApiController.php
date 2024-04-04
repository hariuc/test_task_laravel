<?php

namespace App\Application\Modules\Currency\Controllers\Api\V1;

use App\Application\Modules\Currency\Resources\CurrencyCollectionResource;
use App\Application\Modules\Currency\Resources\CurrencyResource;
use App\Application\Modules\Currency\Services\CurrencyService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class CurrencyApiController extends Controller
{
    public function __construct(private readonly CurrencyService $service)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResource
    {
        return CurrencyCollectionResource::collection($this->service->index($request));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): bool|string|JsonResource
    {
        try {
            return new CurrencyResource($this->service->show($id));
        } catch (ModelNotFoundException $exception) {
            $errorMessage = $exception->getMessage();
            Log::error(__METHOD__ . " ERROR " . $errorMessage);
            return json_encode([
                "status" => false,
                "message" => $errorMessage,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
