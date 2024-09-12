<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TitlesAndOtherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('title')->insert([
            ['short_name'=>'Mr.', 'long_name' => 'Mister'],
            ['short_name'=>'Mrs.', 'long_name' => 'Mistress'],
            ['short_name'=>'Ms.', 'long_name' => 'Miss'],
            ['short_name'=>'Prof.', 'long_name' => 'Professor'],
            ['short_name'=>'Engr.', 'long_name' => 'Engineer'],
            ['short_name'=>'Arch.', 'long_name' => 'Architect'],
            ['short_name'=>'Rev.', 'long_name' => 'Reverend'],
            ['short_name'=>'Fr.', 'long_name' => 'Father'],
            ['short_name'=>'Sr.', 'long_name' => 'Sister'],
            ['short_name'=>'Alhaji.', 'long_name' => 'Alhaji'],
            ['short_name'=>'Hajia.', 'long_name' => 'Hajia'],
            
        ]);

        DB::table('research_field')->insert([]);
    }
}
