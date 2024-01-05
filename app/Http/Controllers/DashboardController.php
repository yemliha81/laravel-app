<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    //
    public function index(){
        
        $books = Book::all();

        return view('dashboard', ['books' => $books]);

    }
}
