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
    // sending rating ke tempat parkir
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

    // function pesan parkir
    public function pesan_parkir(Request $request)
    {
        if (user_parking::where('user_id', Auth::user()->id)->firstOrFail()) {
            return $this->sendError('User sudah memesan parkir sebelumnya');
        }

        $validator = Validator::make($request->all(), [
            'park_id' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $park = parking_lot::find($request->park_id);
        if ($request->type == 'car') {
            $cost = $park->car_price;
        } else {
            $cost = $park->bike_price;
        }
        $input = user_parking::create([
            'park_id' => $request->park_id,
            'user_id' => Auth::user()->id,
            'type' => $request->type,
            'cost' => $cost,
            'status' => 'otw'
        ]);
        return $this->sendResponse($input, 'silahkan datang pada lokasi dalam 1 jam');
    }

    // detail pesan parkir
    public function detail_pesanan()
    {
        if ($data = user_parking::where('user_id', Auth::user()->id)->firstOrFail()) {
            return $this->sendResponse($data, 'data berhasil ditampilkan');
        } else {
            return $this->sendError('User belum memesan parkir');
        }
    }

    // sudah sampai tempat parkir 
    public function sudahSampai()
    {
        if ($data = user_parking::where('user_id', Auth::user()->id)->firstOrFail()) {
            if ($data->status == 'otw') {
                $data->checkin_time = date('Y-m-d H:i:s');
                $data->status = 'sampai';
                $data->save();
                return $this->sendResponse($data, 'User sudah sampai pada ' . $data->checkin_time);
            } else {
                return $this->sendError('User sudah sampai tempat parkir');
            }
        } else {
            return $this->sendError('User belum memesan parkir');
        }
    }

    // Pembatalan pesanan
    public function batalPesanan()
    {
        if ($data = user_parking::where('user_id', Auth::user()->id)->firstOrFail()) {
            if ($data->status == 'otw') {
                $data->delete();
                return $this->sendResponse($data, 'Pesanan dibatalkan');
            } else {
                return $this->sendError('Tidak bisa membatalkan,karena sudah sampai');
            }
        } else {
            return $this->sendError('User belum memesan parkir');
        }
    }

    // function return durasi checkin dan checkout
    public function getCost($checkin, $checkout, $cost)
    {
        $time1 = strtotime($checkin);
        $time2 = strtotime($checkout);

        $durasi = $time2 - $time1;
        $durasi = date("H", $durasi);
        $durasi++;
        $costTotal = $cost * $durasi;
        return $costTotal;
    }

    // Selesai parkir
    public function selesaiParkir()
    {
        if ($data = user_parking::where('user_id', Auth::user()->id)->firstOrFail()) {
            if ($data->status == 'sampai') {
                $data->checkout_time = date('Y-m-d H:i:s');
                $data->status = 'selesai';
                $data->cost = $this->getCost($data->checkintime, $data->checkout_time, $data->cost);
                $data->delete();
                return $this->sendResponse($data, 'Parkir telah selesai');
            } else {
                return $this->sendError('User belum sampai ke tempat parkir');
            }
        } else {
            return $this->sendError('User belum memesan parkir');
        }
    }
}
