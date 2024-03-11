<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\like;
use App\Models\comment;
use App\Models\user;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;

class fotogaleriController extends Controller
{
    public function home()
    {
        $datapost = post::inRandomOrder()->get();

        return view('layout.home.home')->with(['datapost' => $datapost]);
    }

    public function singlepage($id)
    {
        $liked = like::where('user_id', auth()->id())
        ->where('post_id', $id)
        ->exists();
        $user = user::all();
        $komen =  comment::where('post_id', $id)->get();
        $datapost = post::find($id);
        $likecount = like::where('post_id', $id)->count();
        return view('layout.singlepage.singlepage', compact('liked', 'likecount', 'komen', 'user'),[
            'datapost' => $datapost
        ]);
    }
    public function profile()
    {
        Paginator::useBootstrap();
        $datapost = Post::paginate(3);
        return view('layout.profile.profileview')->with(['datapost' => $datapost]);
    }

    public function likePost(Request $request, $post_Id){
        Like::create([
            'user_id'=> auth()->id(),
            'post_id' => $post_Id,
        ]);

            $likecount = like::where('post_id', $post_Id)->count();
            post::where('id', $post_Id)->update([
                'like' => $likecount            
            ]);
    
        return back();
    }

    public function unlikePost(Request $request, $post_Id){
        Like::where('user_id', auth()->id())
        ->where('post_id', $post_Id)
        ->delete();

        $likeCount = Like::where('post_id', $post_Id)->count();

        post::where('id', $post_Id)->update([
            'like'=> $likeCount
        ]);
        return back();
    }
    public function komen(Request $request, $postId){
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        comment::create([
            'user_id' => auth()->id(),
            'post_id' => $postId,
            'comment' => $request->comment
        ]);

        $commentCount = Comment::where('post_id', $postId)->count();
        post::where('id', $postId)->update([
            'comment'=> $commentCount,
        ]);
        return back();

    }
    
}
