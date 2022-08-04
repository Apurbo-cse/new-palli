<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['posts'] = Post::orderBy('created_at', 'DESC')->paginate(20);
        $data['serial'] = 1;
        return view('admin.post.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tags'] = Tag::orderBy('name')->get();
        return view('admin.post.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:posts,title',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required',

        ]);

        // return $request->all();



        // if ($request->hasFile('image')){
        //     $file = $request->file('image');
        //     $path ='images/posts';
        //     $file_name = time() . $file->getClientOriginalName();
        //     $file->move($path, $file_name);
        //     $data['image']= $path.'/'. $file_name;

        // }




        $data = $request->except(['_token','image']);
        $data['title'] = $request->title;
        $data['slug'] = Str::slug($request->title, '-');
        $data['description'] = $request->description;
        $data['published_at'] = Carbon::now();
        $data['status'] = $request->status;

        if ($request->has('is_featured')){
            $data['is_featured'] = $request->is_featured;
        }

        if($request->hasFile('image'))
        {

            $file = $request->file('image');
            $path ='images/posts';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;
        }

        $post = Post::create($data);
        $post->tags()->attach($request->tags);
        session()->flash('success', 'Post created successfully');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $data['post'] = $post;
        return view('admin.post.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data['tags'] = Tag::orderBy('name')->get();
        $data['post'] = $post;
        return view('admin.post.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => "required|unique:posts,title, $post->id",
            'description' => 'required',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048',
            'status'=>'required',
        ]);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $path ='images/posts';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;

            if (file_exists($post->image)){
                unlink($post->image);
            }
        }

        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['status'] = $request->status;
        $post->tags()->sync($request->tags);

        if ($request->has('is_featured')){
            $data['is_featured'] = $request->is_featured;
        }


        $post->update($data);
        session()->flash('success', 'Post updated successfully');
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            if(file_exists(($post->image))){
                unlink($post->image);
            }

            $post->delete();
            session()->flash('success', 'Post deleted successfully');
        }

        return redirect()->route('admin.post.index');
    }
}

