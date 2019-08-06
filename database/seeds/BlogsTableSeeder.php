<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'id_user' => '1',
            'title' => 'Testing Blog',
            'content' => 'Lorem ipsum dolo sir amet',
        ]);
    }
}
