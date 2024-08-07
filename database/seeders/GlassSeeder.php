<?php

namespace Database\Seeders;

use App\Models\Glass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class GlassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Glass::truncate();

        $glasses =  [
                'Tumbler',
                'Highball Glass',
                'Lowball Glass',
                'Coppa Martini',
                'Bicchiere Margarita',
                'Flûte da champagne',
                'Coupè'
        ];

        foreach ($glasses as $glass){

            $new_glass = new Glass();

            $new_glass->name = $glass;

            $new_glass->save();
        }

        Schema::enableForeignKeyConstraints();
    }
}
