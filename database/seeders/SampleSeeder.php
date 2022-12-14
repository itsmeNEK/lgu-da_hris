<?php

namespace Database\Seeders;

use App\Models\hr\Publication;
use App\Models\User;
use App\Models\users\application;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Crypt;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 200) as $index) {
            $gender = $faker->randomElement(['male', 'female']);
            $civil = $faker->randomElement(['single', 'married']);
            $blood = $faker->randomElement(['a', 'ab', 'b', 'o']);
            $CS_title = $faker->randomElement(['CS Professional', 'CS Subprofessional', 'PD 907']);

            $user_id = DB::table('users')->insertGetId([
                'first_name' => $faker->firstName($gender),
                'last_name' => $faker->lastName($gender),
                'email' => $faker->email,
                'email_verified_at' => now(),
                'password' => Hash::make("kenken"),
                'role' => rand(1, 5),
                'avatar' => "avatar.png",
            ]);
            $user = User::findOrFail($user_id);
            DB::table('personals')->insert([
                'user_id' =>  $user_id,
                'first_name' => $faker->firstName($gender),
                'last_name' => $faker->lastName($gender),
                'middle_name' => $faker->lastName($gender),
                'ext_name' => $faker->suffix(),
               'date_birth'=> $faker->date(),
               'place_birth'=> $faker->city,
               'sex'=> $gender,
               'civil_service'=> $civil,
               'height'=> rand(1, 5),
               'weight'=> rand(40, 10),
               'blood_type'=> $blood,
               'gsis_id'=> Crypt::encrypt("N/A"),
               'pag_ibig_id'=> Crypt::encrypt("N/A"),
               'ph_id'=> Crypt::encrypt("N/A"),
               'sss_id'=> Crypt::encrypt("N/A"),
               'tin_id'=> Crypt::encrypt("N/A"),
               'a_e_n'=> "N/A",
               'citizenship'=> "Filipino",
               'country'=> "Philippines",
               'h_b_l_no'=> $faker->buildingNumber,
               'street'=> $faker->streetName,
               'village'=> $faker->streetName,
               'barangay'=> $faker->city,
               'city'=> $faker->city,
               'province'=> $faker->state,
               'zipcode'=> rand(3320, 3330),
               'h_b_l_no_2'=>  $faker->buildingNumber,
               'street_2'=> $faker->streetName,
               'village_2'=> $faker->streetName,
               'barangay_2'=> $faker->city,
               'city_2'=> $faker->city,
               'province_2'=> $faker->state,
               'zipcode_2'=> rand(3320, 3330),
               'tel_no'=> $faker->phoneNumber,
               'mobile_no'=> $faker->phoneNumber,
               'email'=> $user->email,

            ]);
            DB::table('families')->insert([
                'user_id' =>  $user_id,
                'Slname'=>$faker->lastName($gender),
                'Sfname'=> $faker->firstName($gender),
                'Smnane'=> $faker->lastName($gender),
                'Ssuffix'=>$faker->suffix(),
                'Soccupation'=> $faker->jobTitle,
                'SempBus'=> $faker->company,
                'SBusAdd'=> $faker->bs,
                'STelNo'=> $faker->phoneNumber,
                'Flname'=> $faker->lastName($gender),
                'Ffname'=> $faker->firstName($gender),
                'Fmname'=> $faker->lastName($gender),
                'Fsuffix'=> $faker->suffix(),
                'Mlname'=> $faker->lastName($gender),
                'Mfname'=> $faker->firstName($gender),
                'Mmname'=> $faker->lastName($gender),
            ]);
            DB::table('family_c_s')->insert([
                'user_id' =>  $user_id,
                'Cfullname'=>$faker->name($gender),
                'Cbirthday'=> $faker->date($max = 'now'),
            ]);
            foreach (range(1, 3) as $index) {
                $school_level = $faker->randomElement(['Secondary', 'College']);
                $school_name = $faker->randomElement(['ISU', 'USL', 'UP']);
                $school_from = $faker->date();
                $school_to = date('Y-m-d', strtotime($school_from. ' + 4 years'));
                DB::table('educationals')->insert([
                    'user_id' =>  $user_id,
                    'EDlevel'=> $school_level,
                    'EDNameSchool'=> $school_name,
                    'EDpoaFROM'=> date($school_from),
                    'EDpoaTO'=> date($school_to),
                    'EDyeargrad'=> date($school_to),
                ]);
            }
            DB::table('civilservices')->insert([
                'user_id' =>  $user_id,
                'CSCareer' => $CS_title,
                'CSnumber' => rand(45656, 640432),
                'CSDateValid' => $faker->date(),
            ]);

            foreach (range(1, 3) as $index) {
                $we_from = $faker->date();
                $we_diff = rand(1, 10);
                $we_to = date('Y-m-d', strtotime($we_from. ' + '. $we_diff.' years'));
                $we_status = $faker->randomElement(['Permanent', 'Contractual','Intern']);
                DB::table('workexperiences')->insert([
                    'user_id' =>  $user_id,
                    'WEidfrom'=> date($we_from),
                    'WEidto'=> date($we_to),
                    'WEpostit'=> $faker->jobTitle,
                    'WEdepagen'=>  $faker->company,
                    'WEmonthsal'=> rand(5000, 40000),
                    'WEsalaryjob'=> rand(5, 15),
                    'WEstatus'=>  $we_status,
                    'WEgovser'=> $faker->randomElement(['Y','N']),
                ]);
            }
        }
        foreach (range(1, 8) as $index) {
            DB::table('publications')->insert([
                'title' => $faker->jobTitle,
                'itemno' => rand(1.0, 15.9),
                'salarygrade'=> rand(5, 18),
                'monthly'=> rand(5000, 40000),
                'education'=>  $faker->randomElement(['None Required',"Completion of ".rand(1, 4)." years studies in college"]),
                'trainig'=> $faker->randomElement(['None Required',"At least ".rand(1, 16)." hours of training"]),
                'experience'=> $faker->randomElement(['None Required'," At least ".rand(1, 4)." Year/s Experience"]),
                'eligibility'=> $faker->randomElement(['CS (Professional) Second Level',"CS (SubProfessional) First Level","None Required"]),
                'assignment'=> $faker->randomElement(["Office of the Municipal Mayoe","HR Office","Treasury Office"]),
                'created_at'=> $faker->date(),
                'updated_at'=>  $faker->date(),


            ]);
        }
        foreach (range(1, 100) as $index) {
            $app_id = DB::table('applications')->insertGetId([
                'user_id' =>  User::all()->where('role', '1')->random()->id,
                'pub_id' =>  Publication::all()->random()->id,
                'tor' => "Bill Zhedrick A. Gaspar-1670316289-4.pdf",
            ]);
            $app = application::findOrFail($app_id);
            DB::table('interview_exams')->insert([
                'user_id' => $app->user_id,
                'app_id' =>  $app->id,
                'pub_id' =>  $app->pub_id,
            ]);
        }
    }
}
