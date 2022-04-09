<?php

namespace Database\Seeders;

use App\Models\Money;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('money')->insert([
            [
              'title' => 'توافقی',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'title' => 'تا 1 میلیون تومان',
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'title' => 'از 1 میلیون تا 2/5 میلیون تومان',
               'created_at' => Carbon::now(),
               'updated_at' => Carbon::now(),
            ],
            [
              'title' => 'از 2/5 میلیون تا 3/5 میلیون تومان',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
              'title' => 'از 5 میلیون تا 8 میلیون تومان',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
              'title' => 'از 8 میلیون تومان به بالا',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
