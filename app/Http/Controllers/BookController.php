<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Book; 
use App\Models\Comment; 
use App\Models\Read; 

class BookController extends Controller
{
    public function insert_books(){

        $data = '[
            {
                "title": "Dokuzuncu Hariciye Koğuşu",
                "category_title": "Roman",
                "author": "Peyami Safa",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Sefiller",
                "category_title": "Roman",
                "author": "Victor Hugo",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Kürk Mantolu Madonna",
                "category_title": "Roman",
                "author": "Sabahattin Ali",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Kuyucaklı Yusuf",
                "category_title": "Roman",
                "author": "Sabahattin Ali",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Kürk Mantolu Madonna",
                "category_title": "Roman",
                "author": "Sabahattin Ali",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Pal Sokağı Çocukları",
                "category_title": "Roman",
                "author": "Ferenc Molnar",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Beyaz Diş",
                "category_title": "Roman",
                "author": "Jack London",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Saftirik Gregin Günlüğü",
                "category_title": "Çocuk ve Gençlik",
                "author": "Jeff Kinney",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            },
            {
                "title": "Kendime Düşünceler",
                "category_title": "Deneme",
                "author": "Marcus Aurelius",
                "coverletter": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl ultricies nunc, vitae ultrici"
            }]';

        $data_array = json_decode(($data), true);

        //print_r($data_array);

        foreach($data_array as $book){

            $bookObj = new Book();
            $bookObj->title = $book['title'];
            $bookObj->category_title = $book['category_title'];
            $bookObj->author = $book['author'];
            $bookObj->coverletter = $book['coverletter'];
            $bookObj->save();

        }

        die('saved');
        
    }

    public function book_is_read(Request $request){
        $book_id = $request->book_id;
        $user_id = Auth::user()->id;

        try {

            $read = Read::updateOrCreate(
                ['user_id' => $user_id, 'book_id' => $book_id],
                ['is_read' => 1]
            );

            return "success";

        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
