<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index() {
        $districts = District::orderBy('kecamatan', "ASC")->get();
        $kecamatans = Kecamatan::orderBy('name', "ASC")->get();

        $districtCount = $districts->count(); // 10000
        $kecamatanCount = $kecamatans->count(); // 10100
        $maxCount = $districtCount > $kecamatanCount ? $districtCount : $kecamatanCount;

        return view('test', [
            'districts' => $districts,
            'kecamatans' => $kecamatans,
            'maxCount' => $maxCount,
        ]);
    }
}
