<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Contracts\Database\Eloquent\Builder;


class DashboardController extends Controller
{
    //
    public function index(){
        

        if(Auth::user()->is_admin == 0){
            //$books = Book::with(['comments'])->whereRelation('is_approved', 1)->get();
            $books = Book::with(['comments' => function (Builder $query) {
                $query->where('is_approved', '=', '1');
            }])->get();
            //dd($books);
            return view('dashboard', ['books' => $books]);
        }

        if(Auth::user()->is_admin == 1){
            $comments = Comment::all()->sortByDesc('id');
            return view('admin_dashboard', ['comments' => $comments]);
        }

        

    }
}
