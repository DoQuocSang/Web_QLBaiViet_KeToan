<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SupportLink;


class SupportLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_supportlink')->insert([
            'title' => 'Facebook*',
            'url' => 'https://www.facebook.com/PhanMemKeToanAMnote',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('tbl_supportlink')->insert([
            'title' => 'Gọi hỗ trợ*',
            'url' => '090-613-6161(korean) / 08-5555-9000(vn)',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tbl_supportlink')->insert([
            'title' => 'Youtube*',
            'url' => 'https://www.youtube.com/@amgroup8156',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('tbl_supportlink')->insert([
            'title' => 'Zoom*',
            'url' => 'http://www.amgroup.com.vn/',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
