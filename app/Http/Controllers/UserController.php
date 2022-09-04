<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\User;
use App\Models\Offer;
use App\Models\Payment;
use App\Models\SpecialityUser;
use App\Models\UserRole;
use App\Models\Role;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signUpView() {
        $Offers = Offer::all();
        $Payment = Payment::all();


        return view('patients.signUp', [
            "Offers" => Offer::all(),
            "Payment" => Payment::all(),
        ]);

    }

    public function createPacient(Request $request) {
        $data = $request->validate([
            "first-name" => "required|string|min:3|max:50",
            "last-name" => "nullable|string|min:3|max:50",
            "profile_img"=>"required|file|max:5000|mimes:jpg,jpeg,png,bmp,gif,svg, webp",
            "offer"=>"required|exists:Offers,id",
            "payment"=>"required|exists:Payment,id",
            "phone-number" => "required|min:10|max:10|alpha_num",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:10|max:20|confirmed",
        ]);

        $upload_path = public_path('profile_img');
        $file = $request->file('profile_img');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = $data["email"].'.'.$extension;
        $file->move($upload_path, $filename);

                // create a user (patient)
                $user = User::create([
                    "full_name" => $data["first-name"] . " " . $data["last-name"],
                    "email" => $data["email"],
                    "password" => bcrypt($data["password"]),
                    "phone_number" => $data["phone-number"],
                    "profile_img" => $filename,
                    ]);

         // give this user role
        UserRole::create([
            "role_id" => 2,
            "user_id" =>$user->id,
        ]);

         $offer = Offer::find($data["offer"]);

        Subscription::create([
            "patient_id" =>$user->id,
            "offer_id" => $data["offer"],
            "start_data"=> Carbon::now(),
            "end_data"=> Carbon::now()->addMonth(),
            "consultation_number"=> $offer->consultation_number,
            "payment_id"=> $data["payment"],
        ]);


        return redirect()->route("signIn")->with('success_message', "Successfully subscribed");
    }

    public function signUpDoctorView() {
        $specialities = Speciality::all();

        return view('doctors.signUpDoctor', [
            "specialities"=> Speciality::all(),
        ]);
    }

    public function createDoctor(Request $request) {
        $data = $request->validate([
            "first-name" => "required|string|min:3|max:50",
            "last-name" => "nullable|string|min:3|max:50",
            "speciality" => "required|exists:specialities,id" ,
            "profile_description" => "required|string|min:5|max:50",
            "email" => "required|email|unique:users,email",
            "profile_img"=>"required|file|max:5000|mimes:jpg,jpeg,png,bmp,gif,svg, webp",
            "CV" => "required|file|max:5000|mimes:jpg,png,docx,pdf|filled",
            "password" => "required|min:10|max:20|confirmed",
            "phone-number" => "required|min:10|max:10|alpha_num",
        ]);


        //for the cv
        $upload_path = public_path('cv');
        $file = $request->file('CV');
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = $data["email"].'.'.$extension;
        $file->move($upload_path, $filename);

        //for the img
        $upload_path_img = public_path('profile_img');
        $file_img = $request->file('profile_img');
        $extension_img = $file_img->getClientOriginalExtension(); // getting image extension
        $filename_img = $data["email"].'.'.$extension_img;
        $file_img->move($upload_path_img, $filename_img);


        // create a user (doctor)
       $user = User::create([
            "full_name" => $data["first-name"] . " " . $data["last-name"],
            "email" => $data["email"],
            "password" => Hash::make($data["password"]),
            "phone_number" => $data["phone-number"],
            "profile_description"=> $data["profile_description"],
            'CV' => $filename,
            'profile_img' => $filename_img,


        ]);

        // give this user a docotr role
        UserRole::create([
            "role_id" => 3,
            "user_id" =>$user->id,
        ]);


        // asign the dotctor to a speciality

        SpecialityUser::create([
            "speciality_id" => $data["speciality"],
            "user_id" => $user->id,
        ]);

            return redirect()->route("signIn")->with('success_message', 'Your account has been created.');
       }

       public function login(Request $request) {
        $doctor = User::where('email', $request->email)->first();
        if (isset($doctor) ? ($doctor->role->first()->id == 3) : false) {
            if (!$doctor->is_approved){
                return redirect()->back()->with('error_message', "the admin must approve you to enter to the system");
             }
        }

            if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
                return redirect()->route('home');
            }else {
                return redirect()->back()->with('error_message', "invalid password or email");
            }
       }


       public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
        }

        public function welcome() {

            $specialities = Speciality::all();
            $doctors = Role::find(3)->doctors;
            $offers = Offer::all();


            return view('welcome', [
            "specialities"=> $specialities,
            "doctors"=> $doctors,
            "offers"=> $offers ]);

    }


}
