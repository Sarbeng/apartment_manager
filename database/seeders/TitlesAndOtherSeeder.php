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
        //inserting titles into title table
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
        // insert data into research field table
        DB::table('research_field')->insert([
            ['name'=>'Agricultural Sciences'],
            ['name'=>'Clinical Trials'],
            ['name'=>'Engineering and Technology'],
            ['name'=>'Humanities'],
            ['name'=>'Medical Sciences'],
            ['name'=>'Social Sciences'],
        ]);
        
        // insert data into research sub field table
        DB::table('research_subfield')->insert([
            ['name'=> 'Agricultural Biotechnology'],
            ['name'=> 'Agriculture, Forestry and Fishery'],
            ['name'=> 'Animal and Diary Science'],
            ['name'=> 'Art'],
            ['name'=> 'Basic Medicine'],
            ['name'=> 'Biological Sciences'],
            ['name'=> 'Chemical Engineering'],
            ['name'=> 'Chemical Sciences'],
            ['name'=> 'Civil Engineering'],
            ['name'=> 'Clinical Medicine'],
            ['name'=> 'Computer and Information Sciences'],
            ['name'=> 'Earth and Related Evironmental Sciences'],
            ['name'=> 'Economics and Business'],
            ['name'=> 'Educational Sciences'],
            ['name'=> 'Environmental Biotechnology'],
            ['name'=> 'Environmental engineering '],
            ['name'=> 'Health Biotechnology'],
            ['name'=> 'Health sciences'],
            ['name'=> 'History and archaeology'],
            ['name'=> 'Industrial Biotechnology'],
            ['name'=> 'Languages and literature'],
            ['name'=> 'Law'],
            ['name'=> 'Materials engineering'],
            ['name'=> 'Mathematics'],
            ['name'=> 'Mechanical engineering'],
            ['name'=> 'Media and communications'],
            ['name'=> 'Medical engineering'],
            ['name'=> 'Nano-technology'],
            ['name'=> 'Other agricultural sciences'],
            ['name'=> 'Other engineering and tech'],
            ['name'=> 'Other humanities'],
            ['name'=> 'Other medical sciences'],
            ['name'=> 'Other natural sciences'],
            ['name'=> 'Other social sciences'],
            ['name'=> 'Philosophy, ethics and religion'],
            ['name'=> 'Physical sciences'],
            ['name'=> 'Political Science'],
            ['name'=> 'Psychology'],
            ['name'=> 'Social and economic geography'],
            ['name'=> 'Sociology'],
            ['name'=> 'Veterinary sciences'],
            ['name'=> 'Psychology'],


        ]);
    }
}
