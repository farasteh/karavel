<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoryJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_jobs')->insert([
            [
                'id_job' => '1' ,
                'title'     => 'برنامه نویسی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '1' ,
                'title'     => ' هوش مصنوعی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '1' ,
                'title'     => 'شبکه' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '2' ,
                'title'     => 'صندوق دار' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '2' ,
                'title'     => 'کارشناس حسابدار' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '2' ,
                'title'     => 'سرپرست مالی اداری' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '3' ,
                'title'     => ' کارشناس تولید محتوا' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '3' ,
                'title'     => 'مدیر دیجیتال مارکتینگ' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '3' ,
                'title'     => 'ادمین اینستاگرام' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '4' ,
                'title'     => ' گرافیست و تدوینگر' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '4' ,
                'title'     => ' عکاس صنعتی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '4' ,
                'title'     => 'طراح UI/UX' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '5' ,
                'title'     => 'کارشناس فروش' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '5' ,
                'title'     => 'کارمند فروش' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_job' => '5' ,
                'title'     => 'منشی' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
