<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Speciality;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::create([
            "name" => "Weight loss specialty",
            "description" => "يهتم طب التخسيس بعلاج جميع الأمراض التي تصيب الوزن" ,
            "Speciality_img"=>"Weightloss.png",


        ]);

        Speciality::create([
            "name" => "Beauty and care specialty",
            "description" => "يهتم هذا التخصص بالعناية والتجميل ",
            "Speciality_img" => "Beautyandcare.jpeg",

        ]);

        Speciality::create([
            "name" => "Ophthalmology  specialty",
            "description" => "يهتم طب العيون بعلاج جميع الأمراض التي تصيب العين",
            "Speciality_img"=>"Ophthalmology.jpg",
           
        ]);

        Speciality::create([
            "name" => "Dermatology specialty",
            "description" => "يهتم طب الجلدية بعلاج جميع الأمراض التي تصيب الجلد",
            "Speciality_img"=>"Dermatology.jpeg",

        ]);
    }
}
