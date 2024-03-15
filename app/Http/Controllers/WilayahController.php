<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Subdistrict;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function kecamatan() {
        $kecamatans = Kecamatan::orderBy('name', "ASC")->get();
        $districts = District::orderBy('kecamatan', "ASC")->get();

        $district_maps = $districts->mapWithKeys(function ($district) {
            $kecamatan = strtolower($district->kecamatan);
            $kecamatan = str_replace('  ', ' ', $kecamatan);

            $kecamatanFlat = str_replace(' ', '', $kecamatan);
            $kecamatanArr = explode(' ', $kecamatan);

            if (strlen($kecamatanFlat) === count($kecamatanArr)) {
                $kecamatan = $kecamatanFlat;
            }

            return [trim($kecamatan) => $district->kecamatan];
        });

        $districtCount = $districts->count(); // 10000
        $kecamatanCount = $kecamatans->count(); // 10100
        $maxCount = $districtCount > $kecamatanCount ? $districtCount : $kecamatanCount;

        return view('kecamatan', [
            'districts' => $districts,
            'district_maps' => $district_maps,
            'kecamatans' => $kecamatans,
            'maxCount' => $maxCount,
            'districtCount' => $districtCount,
            'kecamatanCount' => $kecamatanCount,
        ]);
    }

    public function kelurahan() {
        $kelurahans = Kelurahan::orderBy('name', "ASC")->get();
        $subdistricts = Subdistrict::orderBy('kelurahan', "ASC")->get();

        $subdistrict_maps = $subdistricts->mapWithKeys(function ($subdistrict) {
            $kelurahan = strtolower($subdistrict->kelurahan);
            $kelurahan = str_replace('  ', ' ', $kelurahan);

            $kelurahanFlat = str_replace(' ', '', $kelurahan);
            $kelurahanArr = explode(' ', $kelurahan);

            if (strlen($kelurahanFlat) === count($kelurahanArr)) {
                $kelurahan = $kelurahanFlat;
            }

            return [trim($kelurahan) => $subdistrict->kelurahan];
        });

        $subdistrictCount = $subdistricts->count(); // 10000
        $kelurahanCount = $kelurahans->count(); // 10100
        $maxCount = $subdistrictCount > $kelurahanCount
            ? $subdistrictCount
            : $kelurahanCount;

        return view('kelurahan', [
            'subdistricts' => $subdistricts,
            'subdistrict_maps' => $subdistrict_maps,
            'kelurahans' => $kelurahans,
            'maxCount' => $maxCount,
            'subdistrictCount' => $subdistrictCount,
            'kelurahanCount' => $kelurahanCount,
        ]);
    }
}
