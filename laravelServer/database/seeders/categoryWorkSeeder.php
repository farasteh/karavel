<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoryWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_works')->insert([
            [
                'categry_job_id' => '1' ,
                'title'     => 'بک اند' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id ' => '2' ,
                'title'     => ' فرانت اند' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id' => '4' ,
                'title'     => ' منشی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id' => '5' ,
                'title'     => ' امور مالی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id' => '7' ,
                'title'     => '  فروش' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id' => '8' ,
                'title'     => 'بازاریابی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id' => '9' ,
                'title'     => 'بازاریابی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id' => '9' ,
                'title'     => 'بازاریابی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'categry_job_id' => '10' ,
                'title'     => 'بازاریابی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
