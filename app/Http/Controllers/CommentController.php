<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Comment; 

class CommentController extends Controller
{
    public function comment_save(Request $request){
        $book_id = $request->book_id;
        $user_id = Auth::user()->id;
        $comment_text = $request->comment_text;

        $commented = Comment::where('user_id', $user_id)->where('book_id', $book_id)->count();

        if($commented == 0){
            try {

                $comment = new Comment();
                $comment->user_id = $user_id;
                $comment->book_id = $book_id;
                $comment->comment_text = $comment_text;
                $comment->is_approved = 0;
    
                $comment->save();
    
                return "success";
    
            } catch (\Throwable $th) {
                throw $th;
            }
        }else{
            return "comment_exists";
        }
        

    } 

    public function approve(Request $request){
        //dd($request->all());
        $comment_id = $request->comment_id;

        try {

            $update = DB::table('comments')
              ->where('id', $comment_id)
              ->update(['is_approved' => 1]);

            return "success";

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
