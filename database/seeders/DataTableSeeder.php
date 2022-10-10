<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

          $faker = Faker::create('id_ID');
        for($i = 1; $i <= 10; $i++){

            
                        db::table('barangs')->insert([
                            'kode' => $faker->randomDigit,
                            'nama' => $faker->name,
                           'jumlah' => $faker->randomDigitNot(0),
                           'kondisi' => $faker->word,
                           'ruang_id' => $faker->randomDigitNot(0),
                        ]);


                        db::table('barang_masuks')->insert([
                            'jumlah' => $faker->randomDigit,
                            'barang_id' => $faker->randomDigitNot(0),
                            'sumber_id' => $faker->randomDigitNot(0),
                           'catatan' => $faker->word,
                        ]);

                        db::table('sumbers')->insert([
                            'nama' => $faker->name,
                            'alamat' => $faker->address(),
                            'telepon' => $faker->phoneNumber(),
                           'catatan' => $faker->word,
                        ]);
    }
}
}