<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            'id'=>'1',
            'menuParent'=>'root',
            'Description'=>'System Admin',
            'icon'=>'basket',
            'slug'=>'0', 
        ]);

        DB::table('menus')->insert([
            'id'=>'2',
            'menuParent'=>'root',
            'Description'=>'Customers',
            'icon'=>'clipboard',
            'slug'=>'/customer', 
        ]);

        DB::table('menus')->insert([
            'id'=>'3',
            'menuParent'=>'root',
            'Description'=>'Inventory',
            'icon'=>'clipboard',
            'slug'=>'0', 
        ]);

        
        DB::table('menus')->insert([
            'id'=>'4',
            'menuParent'=>'3',
            'Description'=>'Receiving',
            'icon'=>'clipboard',
            'slug'=>'/inventory', 
        ]);

        DB::table('menus')->insert([
            'id'=>'8',
            'menuParent'=>'3',
            'Description'=>'Issuance',
            'icon'=>'clipboard',
            'slug'=>'/encashment', 
        ]);

        DB::table('menus')->insert([
            'id'=>'9',
            'menuParent'=>'root',
            'Description'=>'Job Order',
            'icon'=>'clipboard',
            'slug'=>'/joborder', 
        ]);

        DB::table('menus')->insert([
            'id'=>'5',
            'menuParent'=>'root',
            'Description'=>'Report',
            'icon'=>'clipboard',
            'slug'=>'0', 
        ]);

        DB::table('menus')->insert([
            'id'=>'10', 
            'menuParent'=>'5',
            'Description'=>'Cash Flow',
            'icon'=>'clipboard',
            'slug'=>'/cashflow', 
        ]);

        DB::table('menus')->insert([
            'id'=>'6',
            'menuParent'=>'1',
            'Description'=>'Users',
            'icon'=>'clipboard',
            'slug'=>'/user',
        ]);

        DB::table('menus')->insert([
            'id'=>'7',
            'menuParent'=>'1',
            'Description'=>'Permissions',
            'icon'=>'clipboard',
            'slug'=>'/permission', 
        ]);

        DB::table('menus')->insert([
            'id'=>'11',
            'menuParent'=>'1',
            'Description'=>'Menu',
            'icon'=>'clipboard',
            'slug'=>'/menu', 
        ]);
    }
}
