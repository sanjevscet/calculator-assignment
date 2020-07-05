<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Services\StoreService;


class StoreController extends Controller
{
    private $storeService;

    public function __construct()
    {
        $this->storeService = app(StoreService::class);
    }

    /**
     *  Store user value in DB
     *
     * @param StoreRequest $request
     *
     * @return JsonResponse
     */
    public function save(StoreRequest $request): JsonResponse
    {
        $value = $request->input('value');
        try {
            $response = $this->storeService->save($value);

            return response()->json([
                'save' => $response
            ]);
        } catch(\Exception $error) {
            throw new \Exception($error->getMessage);
        }
    }

    public function retrieve(): JsonResponse
    {
        $response = $this->storeService->retrieve();

        return response()->json([
            'value' => $response
        ]);
    }


    /**
     * Clear the stored value
     *
     * @return JsonResponse
     */
    public function clear(): JsonResponse
    {
        try {
            $this->storeService->clear();

            return response()->json([
                'value' => null
            ]);
        } catch(\Exception $error) {
            throw new \Exception($error->getMessage);
        }

    }
}
