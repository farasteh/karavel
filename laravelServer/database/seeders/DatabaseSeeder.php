<?php

namespace Database\Seeders;

use App\Models\ActivityCompany;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MoneySeeder::class,
            CooperationTypeSeeder::class,
            DocumentSeeder::class,
            FildStudySeeder::class,
            GenderSeeder::class,
            HistoryJobSeeder::class,
            SoldierSeeder::class,
//            ProvincSeeder::class,
//            CitySeeder::class,
            ACtivityCompanySeeder::class,
            InstiutesSeeder::class,
            JobCenterSeeder::class,
            GroupLevelSeeder::class,
            LanguageSeeder::class,
            CertificateSeeder::class,
            EffectSeeder::class,
            SocailNetworkSeeder:: class ,
            pdfThemeSeeder:: class ,
            PossibilitySeeder:: class ,
            resumeStatusSeeder:: class ,
            behavioralSeeder::class ,
            jobSeeder::class,
            categoryJobSeeder::class ,
            categoryWorkSeeder::class,
            UserSeeder::class
        ]);
    }
}
