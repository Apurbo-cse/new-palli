<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
// use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::orderBy('created_at', 'ASC')->paginate(20);
        return view('admin.pages.category.index',compact('categories'));
        return view('admin.pages.category.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.create');
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
            'name' => "required|unique:categories,name",
            'status' => 'required',
        ]);

        $data = new Category();

        $data->name = $request->input('name');
        $data->slug = Str::slug($request->name, '-');
        $data->description = $request->input('description');
        $data->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/category';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;
        }

        $data->save();

        return redirect()->route('admin.category.index')->with('status', 'Student added successfully');

        // Toastr::success('Category successfully create', 'Success');
        // return redirect()->route('admin.pages.category.index');



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
        $category = Category::findOrFail($id);
        return view('admin.pages.category.edit',compact('category'));
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
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => "required|unique:categories,name, $category->id",
            'status' => 'required',
        ]);


        $category->name = $request->input('name');
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->input('description');
        $category->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/category';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $category['image']= $path.'/'. $file_name;
        }

        $category->update();

        return redirect()->route('admin.category.index')->with('status', 'Student added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category){
            if(file_exists(($category->image))){
                unlink($category->image);
            }

            $category->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
