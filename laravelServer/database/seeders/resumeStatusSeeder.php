<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class resumeStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resume_statuses')->insert([
            [
                'title' => 'بررسی نشده',
                'comment' => 'درخواست شما برای کارفرما ارسال‌شده ولی آن‌را مشاهده نکرده است.' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'در انتظار تعین وضعیت',
                'comment' => ' درخواست شما توسط کارفرما مشاهده شده و در انتظار تعیین وضعیت توسط کارفرما می‌باشد. رزومه شما پس از تعیین وضعیت در یکی از حالت‌های زیر قرار می‌گیرد:
                               <ul>
                                    <li> «تایید برای مصاحبه» </li>
                                    <li>«رد شده (نامناسب)» </li>
                                    <li> «مصاحبه‌شده و استخدام شده»</li>
                                <ul>
                            ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'تایید برای مصاحبه',
                'comment' => 'درخواست همکاری شما توسط کارفرما در وضعیت تایید شده برای مصاحبه قرار گرفته ‌است، منتظر تماس این شرکت برای هماهنگی‌های بیشتر در روزهای آینده باشید. ' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'استخدام شد',
                'comment'  => ' درخواست همکاری شما توسط کافرما در وضعیت استخدام شده قرار گرفته است. ' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ] ,
            [
                'title' => 'رد شد',
                'comment'  => 'وضعیت درخواست همکاری شما برای این فرصت شغلی توسط مسئول این شرکت رد شده (نامناسب) اعلام شده است. ' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ] ,
            [
                'title' => 'بررسی مجدد',
                'comment'  => 'این رزومه در روزهای آینده نیاز به بررسی مجدد دارد' ,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
