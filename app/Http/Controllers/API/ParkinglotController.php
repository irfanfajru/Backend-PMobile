<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\parking_lot;
use App\Http\Resources\ParkingLot;

class ParkinglotController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // mengambil semua data tempat parkir
    public function index()
    {
        $data = parking_lot::with(['facilities', 'rating'])->get();
        if (count($data) == 0) return $this->sendError('data not found');
        return $this->sendResponse(ParkingLot::collection($data), 'data retrieved successfully.');
    }
    // mencari tempat parkir berdasarkan lokasi
    public function findParking($request)
    {
        $keyword = $request;
        $data = parking_lot::with(['facilities', 'rating'])->where('location', 'like', '%' . $keyword . '%')->get();
        if (count($data) == 0) return $this->sendError('data not found');
        return $this->sendResponse(ParkingLot::collection($data), 'data retrieved successfully.');
    }
}
