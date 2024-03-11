<?php

namespace App\Http\Controllers;
use App\Models\post;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("layout.input.input");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'title'     => 'required',
            'author'     => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->move(public_path('img'), $imageName);
        // $image = $request->file('image');
        // $image->storeAs('public/img', $image->hashName());

        post::create([
            'image'     => $imageName,
            'title'     => $request->title,
            'author'     => $request->author,
        ]);

        return redirect()->route('profile')->with('success', 'Operasi berhasil dilakukan.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $data = post::where('id', $id)->get();
        return view ('layout.edit.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title'     => 'required',
            'author'     => 'required',
        ]);
    
        //get data Blog by ID
        $blog = post::findOrFail($id);
    
        if ($request->file('image') !== null) {
            // Hapus gambar lama
            File::delete(public_path($blog->imagePath()));
        
            // Upload gambar baru
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->move(public_path('img'), $imageName);
        
            $blog->update([
                'image' => $imageName,
                'title' => $request->title,
                'author' => $request->author,
                'content' => $request->content
            ]);
        } else {
            // Jika tidak ada gambar baru yang diunggah
            $blog->update([
                'title' => $request->title,
                'author' => $request->author,
                'content' => $request->content
            ]);
        }
        
        return redirect()->route('profile')->with('success', 'Operasi berhasil dilakukan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        post::where('id',$id)->delete();
        return redirect()->route('profile')->with('success', 'Operasi berhasil dilakukan.');
    }
}
