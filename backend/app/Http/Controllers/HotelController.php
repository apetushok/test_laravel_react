<?php

namespace App\Http\Controllers;

use App\Services\HotelService;
use Illuminate\Http\Request;
use Throwable;

class HotelController extends Controller
{
    private $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    /**
     * @param Throwable $e
     * @return \Illuminate\Http\JsonResponse
     */
    private function response(Throwable $e)
    {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|string
     */
    public function index()
    {
        try {
            return $this->hotelService->list();
        } catch (Throwable $e) {
            return $this->response($e);
        }
    }

    /**
     * @param Request $request
     * @return \App\Models\Hotel|\Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            // validate $request
            return $this->hotelService->create($request->all());
        } catch (Throwable $e) {
            return $this->response($e);
        }
    }

    /**
     * @param int $id
     * @return \App\Models\Hotel|\Illuminate\Http\JsonResponse|null
     */
    public function show(int $id)
    {
        try {
            return $this->hotelService->getOne($id);
        } catch (Throwable $e) {
            return $this->response($e);
        }
    }

    /**
     * @param Request $request
     * @param int $id
     * @return bool
     */
    public function update(Request $request, int $id)
    {
        // validate $request
        return $this->hotelService->update($id, $request->all());
    }

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id)
    {
        return $this->hotelService->delete($id);
    }
}
