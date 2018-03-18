<?php

use Illuminate\Database\Seeder;

class BantenprovAnggaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovAnggaranSeederAnggaran::class);
    }
}
