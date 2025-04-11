<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'name' => 'Man\'s Search for Meaning',
                'description' => 'A memoir by Viktor Frankl describing his experiences in Nazi concentration camps.',
                'book_cover_picture' => $this->getImagePath('mansSearchForMeaning'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Fablehaven',
                'description' => 'A fantasy series written by Brandon Mull about siblings discovering a secretive nature reserve for mythical creatures.',
                'book_cover_picture' => $this->getImagePath('fablehaven'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dune',
                'description' => 'A science fiction novel by Frank Herbert, centered around the desert planet Arrakis.',
                'book_cover_picture' => $this->getImagePath('dune'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Where the Crawdads Sing',
                'description' => 'A novel by Delia Owens about a young woman growing up in the marshes of North Carolina.',
                'book_cover_picture' => $this->getImagePath('whereTheCrawdadsSing'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'The Lost City of Z',
                'description' => 'A non-fiction book by David Grann recounting the mysterious disappearances of explorers in the Amazon.',
                'book_cover_picture' => $this->getImagePath('theLostCityOfZ'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        Book::insert($books);
    }

    /**
     * Generates full path for an image stored on S3.
     *
     * @param string $fileName
     * @return string
     */
    private function getImagePath($fileName)
    {
        $filePath = '/images/' . $fileName . '.png';
        return $filePath;
    }
}
