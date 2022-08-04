<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

  public function blog()
  {

    $data['latest_news']=Post::where('status', 'active')->orderBy('id', 'desc')->limit(3)->get();
    $data['posts']=Post::where('status', 'active')->orderBy('id', 'desc')->paginate(5);
    $data['popular_posts']=Post::where('status', 'active')->orderBy('view_count', 'desc')->limit(3)->get();
    return view('frontend.pages.blog.index',$data);

  }

  public function details($slug){

    $data['latest_news']=Post::where('status', 'active')->orderBy('id', 'desc')->limit(3)->get();
    $data['popular_posts']=Post::where('status', 'active')->orderBy('view_count', 'desc')->limit(3)->get();
    // $post=Post::findOrFail($id);
    $post=Post::where('slug',$slug)->first();
    $post->increment('view_count');
    $data['post']=$post;
    return view('frontend.pages.blog.details', $data);
}

}
