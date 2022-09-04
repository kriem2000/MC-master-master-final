<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Consultation;
use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index() {
        if (auth()->user()->role->first()->id == 2) {
            $specialities = Speciality::all();
            return view("patients.PatientHome", [
                "specialities" => $specialities,
            ]);

        } else

         if(auth()->user()->role->first()->id == 3 ) {
            $consultations = Consultation::all();
            return view("doctors.DoctorHome", [
                "consultations" => $consultations,
            ]);


        } else

            if(auth()->user()->role->first()->id == 1){
            $doctors = Role::find(3)->doctors;
            return view("Admen.AdmenHome",[
                "doctors"=> $doctors,
           ]);

        }
        }


      public function MyProfile() {
        if (auth()->user()->role->first()->id == 2) {
            $patient =User::where('id', auth()->user()->id)->first();
            return view("patients.ProfilePatient", [
                "patient" => $patient,
            ]);

        } else

         if(auth()->user()->role->first()->id == 3 ) {
            $doctor =User::where('id', auth()->user()->id)->first();
            return view("doctors.ProfileDoctor", [
                "doctor" => $doctor,
            ]);

        } else

         if(auth()->user()->role->first()->id == 1){
                $Admen =User::where('id', auth()->user()->id)->first();
            return view("Admen.ProfileAdmen",[
                "Admen"=> $Admen,
           ]);

        }
    }

    public function SaveChangeProfile(Request $request, $id) {
        $user= User::find($id);
        
        $user->full_name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->password = $request->input('password') != null ? bcrypt($request->input('password')) : $user->password;

            if ($request->hasFile('profile_img')) {
            
                $upload_path_img = public_path('profile_img');
                 $file_img = $request->file('profile_img');
                 $extension_img = $file_img->getClientOriginalExtension(); // getting image extension
                 $filename_img = $user->full_name.'.'.$extension_img;
                  $file_img->move($upload_path_img, $filename_img);
                 $user->profile_img = $filename_img;

                  }else{
                    $user->profile_img;
                    } 
                    $user->save();
       
        return redirect()->back()->with('success_message', "user update");
    }
}
