<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie')->insert([
            [
                'imDB' => 111555,
                'title' => 'Kuyang: Sekutu Iblis yang Mengintai',
                'year' => 2024,
                'genre' => 'Horor',
                'poster' => 'https://images.unsplash.com/photo-1509198397868-475647b2a1e5?auto=format&fit=crop&w=400&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'imDB' => 123456,
                'title' => 'Interstellar',
                'year' => 2014,
                'genre' => 'Sci-Fi',
                'poster' => 'https://images.unsplash.com/photo-1506703719100-a0f3a48c0f86?auto=format&fit=crop&w=400&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'imDB' => 234567,
                'title' => 'Inception',
                'year' => 2010,
                'genre' => 'Action / Sci-Fi',
                'poster' => 'https://images.unsplash.com/photo-1536440136628-849c177e76a1?auto=format&fit=crop&w=400&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'imDB' => 345678,
                'title' => 'Agak Laen',
                'year' => 2024,
                'genre' => 'Komedi',
                'poster' => 'https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?auto=format&fit=crop&w=400&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'imDB' => 456789,
                'title' => 'The Dark Knight',
                'year' => 2008,
                'genre' => 'Action',
                'poster' => 'https://images.unsplash.com/photo-1478760329108-5c3ed9d495a0?auto=format&fit=crop&w=400&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'imDB' => 567890,
                'title' => 'Pengabdi Setan 2: Communion',
                'year' => 2022,
                'genre' => 'Horor',
                'poster' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=400&q=80',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
