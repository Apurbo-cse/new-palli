<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product_tags= ProductTag::all();
        return view('admin.pages.product-tag.index', compact('product_tags'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pages.product-tag.create');
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
            'name' => 'required',
            'status' => 'required',
        ]);

        $proTag = new ProductTag();
        $proTag->name = $request->name;
        $proTag->slug = Str::slug($request->name);
        $proTag->status = $request->status;
        $proTag->save();
        return redirect()->route('admin.product-tag.index');
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
        $proTag = ProductTag::findOrFail($id);
        return view('admin.pages.product-tag.edit',compact('proTag'));
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

        
        $proTag = ProductTag::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        $proTag->name = $request->name;
        $proTag->slug = Str::slug($request->name);
        $proTag->status = $request->status;
        $proTag->save();

        return redirect()->route('admin.product-tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proTag = ProductTag::findOrFail($id);
        if($proTag){
            if(file_exists(($proTag->image))){
                unlink($proTag->image);
            }

            $proTag->delete();
            session()->flash('success', 'Slider deleted successfully');
            return back();
        }
    }
}
