<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('admin.pages.sub-category.index');
        $sub_categories= SubCategory::all();
        return view('admin.pages.sub-category.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::where('status', '1')->orderBy('name', 'ASC')->get();
        return view('admin.pages.sub-category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|unique:categories,name",
            'category_id' => 'required',
            'status' => 'required',
        ]);

        $data = new SubCategory();
       
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->slug = Str::slug($request->name, '-');
        $data->category_id = $request->category_id;
        $data->status = $request->input('status');

        
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/subcategory';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $data['image']= $path.'/'. $file_name;
        }

        $data->save();

        return redirect()->route('admin.sub-category.index')->with('status', 'Sub Category added successfully');

        // Toastr::success('Subcategory successfully create', 'Success');
        // return redirect()->route('admin.subcategories.index');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories= Category::where('status', '1')->orderBy('name', 'ASC')->get();
        $subCategory= SubCategory::findOrFail($id);

        // return $subCategory;
        return view('admin.pages.sub-category.edit', compact('subCategory', 'categories'));
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
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->name = $request->input('name');
        $subcategory->status = $request->input('status');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $path ='images/subcategory';
            $file_name = time() . $file->getClientOriginalName();
            $file->move($path, $file_name);
            $subcategory['image']= $path.'/'. $file_name;
        }

        $request->validate([
            'name'=>'required',
            'status'=>'required|in:'.SubCategory::ACTIVE_STATUS.','.SubCategory::INACTIVE_STATUS,

        ]);

        $subcategory->save();
        session()->flash('success', 'subcategory Updated Successfully');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $subcategory = SubCategory::findOrFail($id);
        if($subcategory){
            if(file_exists(($subcategory->image))){
                unlink($subcategory->image);
            }

            $subcategory->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
