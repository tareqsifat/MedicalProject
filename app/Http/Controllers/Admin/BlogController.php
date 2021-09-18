<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Blog::get();
        return view('admin.blog.index', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required',
            'title' =>'required',
        ]);
        $blog = new Blog();

        if($request->hasFile('image')){
            $file = $request->file('image');
            $imagesfileName = $file->getClientOriginalName();
            $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
            $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
            
            $savename = $filename.'.'.$extension;
            $path = public_path("uploads/blogs/$savename");
            Image::make($file)->fit(294,195)->save($path);

            $blog->image = $savename;
        }
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->creator = Auth::user()->id;
        $blog->slug = Str::slug(uniqid(10).'_'.$request->title);
        $blog->save();

        $nofication = new Notification();
        $nofication->creator = Auth::user()->name;
        $nofication->save();
        $nofication->message = "$nofication->creator Added a new Blog Post";
        $nofication->save();

        session()->flash('alert-success','Blog updated successfully');

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = Blog::find($id);
        return view('admin.blog.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' =>'required',
        ]);

        $blog = Blog::find($id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $imagesfileName = $file->getClientOriginalName();
            $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
            $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
            
            $savename = $filename.'.'.$extension;
            $path = public_path("uploads/blogs/$savename");
            Image::make($file)->fit(294,195)->save($path);

            $blog->image = $savename;
        }

        $blog->title = $request->title;
        if ($request->has('body')) {
            $blog->body = $request->body;
        }
        $blog->creator = Auth::user()->id;
        $blog->slug = Str::slug(uniqid(10).'-'.$request->title);
        $blog->save();

        session()->flash('alert-success','Blog updated successfully');
        
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        session()->flash('alert-danger','Blog deleted successfully');


        return back();
    }
}
