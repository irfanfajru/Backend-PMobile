<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\parking_lot;
use Validator;
use App\Http\Resources\ParkingLot as ParkingLotResource;

class ParkinglotController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = parking_lot::all();

        return $this->sendResponse($data, 'data retrieved successfully.');
    }
}
