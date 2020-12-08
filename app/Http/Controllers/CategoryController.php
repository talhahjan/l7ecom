<?php

namespace App\Http\Controllers;

use App\Category;
use App\Section;
use App\Brand;

use Illuminate\Http\Request;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin.category.index', compact('categories'));
    }
    public function getCatsBySection(Request $request)
    {
        $categories = Category::select('id', 'title')->where('section_id', $request->section_id)->where('parent_id', 0)->get();
        $exception_id = $request->exception_id ? $request->exception_id : null;
        return view('admin.ajax.load-sc', compact('categories', 'exception_id'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



        $sections = Section::select('id', 'title')->get();
        $brands = Brand::select('id', 'title')->get();
        return view('admin.category.create', compact('sections', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'file|mimes:jpg,png,bmp,jpeg',
            'discount' => 'numeric',
            'parent_id' => 'numeric'
        ]);

       



        if (isset($request->banner)) {
            $extension = "." . $request->banner->getClientOriginalExtension();
            $name = $request->slug;
            $name = $name . $extension;
            $path = $request->banner->storeAs('categories/banners/', $name, 'local');
        }

        $category = Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'section_id' => $request->section_id,

            'discount' => $request->discount,
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'banner' =>  isset($path) ?  'uploads/' . $path : null,


        ]);

        if ($category)
            return back()->with('message', 'category added successfully');
        else
            return back()->with('error', 'error adding categoy');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $sections = Section::all();
        $categories = Category::where('section_id', $category->section_id)->where('id', '!=', $category->id)->get();
        return view('admin.category.edit', compact('sections', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,'.$category->id,
            'image' => 'file|mimes:jpg,png,bmp,jpeg',
            'discount' => 'numeric',
            'parent_id' => 'numeric',
            'section_id' => 'numeric',

        ]);

        if (isset($request->banner)) {
            @unlink($category->banner);
            $extension = "." . $request->banner->getClientOriginalExtension();
            $name = $request->slug . time();
            $newName = $name . $extension;
            $path = $request->banner->storeAs('category/banners/', $newName, 'local');
        }

        $updateCategory = Category::where("id", $category->id)->update([
            'title' => $request->title,
            'section_id' => $request->section_id,
            'slug' => $request->slug,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
            'description' => $request->description,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'meta_title' => $request->meta_title,
            'banner' => isset($request->banner) ? 'uploads/' . $path : $category->banner,
        ]);

        if ($updateCategory) {
            return back()->with('message', 'category has been successfully edited');
        } else {
            return back()->with('error', 'Errorupdating category');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $res = Category::where('id', $request->record_id)->update(['status' => $request->currentstatus == 1 ? 0 : 1]);
//       $res=true;
        $obj = array();
        $obj['msg'] = 'Error Updating Record';
        $obj['type'] = 'danger';

        if ($res) {

            $obj['msg'] = 'Record has been Updated successfully';
            $obj['type'] = 'success';
        }

        return $obj;
    }

    public function destroy(Request $request)
    {

        //  $res=User::where('id', $request->record_id)->delete();
        // $res2=Profile::where('id', $request->section_id)->delete();
        $res = true;
        $res2 = true;

        $obj = array();
        $obj['msg'] = 'Error deleting Record';
        $obj['type'] = 'danger';

        if ($res) {
            $obj['msg'] = 'Record has been deleted successfully';
            $obj['type'] = 'success';
        }
        return $obj;
    }
}