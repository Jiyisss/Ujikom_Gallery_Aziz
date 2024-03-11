<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q'); // Ambil nilai pencarian dari input dengan nama 'q'
        
        // Lakukan pencarian berdasarkan judul atau konten post
        $results = Post::where('title', 'like', '%'.$query.'%')
        ->orWhere('author', 'like', '%'.$query.'%')
        ->paginate(10);


        return view('layout.search.search', compact('results'));
    }
}
