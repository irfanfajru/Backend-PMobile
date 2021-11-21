<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\parking_lot;
use App\Models\rating;
use App\Models\user_parking;
use Validator;

class UserParkingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // mengambil semua data tempat parkir
    public function sendRating(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'park_id' => 'required',
            'rate' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = rating::create([
            'park_id' => $request->park_id,
            'user_id' => Auth::user()->id,
            'rate' => $request->rate
        ]);
        return $this->sendResponse($input, 'Rating sudah ditambahkan.');
    }
}
