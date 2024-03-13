<?php

namespace Database\Seeders;
use App\Models\Register;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Customer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create();
        for($i=1;$i<=100;$i++){
       $customers= new Register();
       $customers->name=$faker->name;
       $customers->email=$faker->email;
       $customers->dob=$faker->date;
       $customers->password=$faker->password;
       $customers->password_confirmation=$faker->password;
       $customers->status="Active";
       $customers->save();
        }
    }
}
