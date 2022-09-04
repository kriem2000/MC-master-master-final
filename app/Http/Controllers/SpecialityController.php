<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\uUser;
use App\Models\Rate;
use Illuminate\Http\Request;

class SpecialityController extends Controller
{
    public function index($id) {
        $speciality_name = Speciality::find($id)->name;
        $doctors = Speciality::find($id)->doctors;
        $rates = $doctors->map->rates->map->sum('rate_namber')->map(function($item) {return $item/5; });
        return view('patients.patientSingleSpecialietePage', [
            'speciality_name' => $speciality_name,
            'speciality_id' => $id,
            'doctors' => $doctors,
            'rates' => $rates,
        ]);
    }

    public function SearchDoctor(Request $request, $speciality_id) {
        //case insensitive
        $speciality_name = Speciality::find($speciality_id)->name;
        $name = $request->doctor_name;
        $doctors = Speciality::find($speciality_id)->doctors->filter(function ($item) use ($name) {
            return strtolower($item['full_name']) == strtolower( $name);});
            $rates = $doctors->map->rates->map->sum('rate_namber')->map(function($item) {return $item/5; });
       
            return view('patients.patientSingleSpecialietePage', [
                'speciality_name' => $speciality_name,
                'doctors' => $doctors,
                'speciality_id' => $speciality_id,
                'rates' =>$rates]);
            
            
           
    
    }

}


