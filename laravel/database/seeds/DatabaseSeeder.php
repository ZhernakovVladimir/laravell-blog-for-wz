<?php

use Illuminate\Database\Seeder;
use App\StaticPage;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         $this->call(StaticPagesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}

class StaticPagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('StaticPages')->delete();
        StaticPage::create(['name'=>'about','published'=>true]);
        StaticPage::create(['name'=>'contact','published'=>false]);
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('Users')->delete();
        User::create([
            'name'=>'admin',
            'email'=>'zhernakov-vladimir@ukr.net',
            'password'=>bcrypt('paroll'),
            ]);
        User::create([
            'name'=>'user1',
            'email'=>'aaa@bbb.ccc',
            'password'=>bcrypt('bbbbbb'),
            ]);
        
    }
}

