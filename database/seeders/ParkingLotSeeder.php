<?php

namespace Database\Seeders;

use App\Models\parking_facilities;
use App\Models\parking_lot;
use Illuminate\Database\Seeder;

class ParkingLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert parking lot data into database
        // data 1
        parking_lot::create([
            'name' => 'Parkir Abu Baka Ali',
            'location' => 'Jl. Abu Bakar Ali No.75, 001, Suryatmajan, Kec. Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55213',
            'latitude' => '-7.789.348.030.626.600',
            'longitude' => '1.103.673.615.571.460',
            'car_price' => 5000,
            'bike_price' => 2000,
            'car_slot' => 10,
            'bike_slot' => 22,
            'operational' => 'Monday - Sunday  open 24 hours',
            'status' => 1
        ]);
        parking_facilities::create([
            'park_id' => 1,
            'fac_name' => 'cctv',
            'desc' => 'pemantauan cctv 24 jam'
        ]);
        parking_facilities::create([
            'park_id' => 1,
            'fac_name' => 'satpam',
            'desc' => 'pengawasan satpam 24 jam'
        ]);
        parking_facilities::create([
            'park_id' => 1,
            'fac_name' => 'tempat sampah',
            'desc' => 'pembuangan sampah bagi pengguna parkir'
        ]);
        parking_facilities::create([
            'park_id' => 1,
            'fac_name' => 'pipa exhauss',
            'desc' => 'saluran pembuangan CO ditempat parkir indoor'
        ]);
        // data 2
        parking_lot::create([
            'name' => 'Beskalan Parking Lot',
            'location' => 'Jl. Beskalan No.28, RW.08, Ngupasan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55122',
            'latitude' => '-7.742.950.516.534.770',
            'longitude' => '1.103.608.340.991.100',
            'car_price' => 4000,
            'bike_price' => 2000,
            'car_slot' => 6,
            'bike_slot' => 12,
            'operational' => 'Monday - Sunday  open 06.00 - 00.00 WIB',
            'status' => 1
        ]);
        parking_facilities::create([
            'park_id' => 2,
            'fac_name' => 'cctv',
            'desc' => 'pemantauan cctv 24 jam'
        ]);
        parking_facilities::create([
            'park_id' => 2,
            'fac_name' => 'satpam',
            'desc' => 'pengawasan satpam 24 jam'
        ]);
        parking_facilities::create([
            'park_id' => 2,
            'fac_name' => 'tempat sampah',
            'desc' => 'pembuangan sampah bagi pengguna parkir'
        ]);
        parking_facilities::create([
            'park_id' => 2,
            'fac_name' => 'pipa exhauss',
            'desc' => 'saluran pembuangan CO ditempat parkir indoor'
        ]);
    }
}
