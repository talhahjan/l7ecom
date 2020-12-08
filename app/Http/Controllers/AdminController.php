<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Section;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin');
    }

    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function setting()
    {
        return view('admin.setting');
    }

    public function viewProfile()
    {
        return view('admin.profile');
    }

    public function getCategories(Request $request)
    {
        $categories = Category::select('id', 'title')->where('section_id', $request->id)->where('parent_id', 0)->get();
        return view('admin.ajax.load-cate', compact('categories'));
    }


    /* public function getCategoriesJsonData()
    {
        $sections = Section::select('id', 'title')->get();
        $categories = Category::select('id', 'title')->get();
        $jsonStr = "[";
      
 
        foreach ($sections as $section) {
         
            $jsonStr .= "{ sectionId: " . $section->id . ", title: '" . $section->title . "', isSelectable: false";

            if (count($section->categories) > 0) {
                $jsonStr.=",";
                $jsonStr .= "subs:[";
                foreach ($section->categories as $parent) {
                    $jsonStr .= "{ id: " . $parent->id . ", title: '" . $parent->title . "', isSelectable: false";

                    if (count($section->categories) > 0 && count($parent->childs) > 0) {
                        $jsonStr .= ",";
                        $jsonStr .= "subs:[";
                        foreach ($parent->childs as $child) {
                            $jsonStr .= "{ id: $child->id , title: '" . $child->title . "'}";
                            if ($child->id != $parent->childs->last()->id)
                            $jsonStr .= ",";
                        }


                        $jsonStr .= "]";
                    }

                    $jsonStr .= "}";

                    if ($parent->id != $section->categories->last()->id)
                    $jsonStr .= ",";
                
                


                  
                }
                $jsonStr .= "]";
            }


            $jsonStr .= "}";
            if ($section->id!=$sections->last()->id)
                $jsonStr .= ",";
           
        }
        $jsonStr .= ']';

        return json_encode($jsonStr);
    } */





    public function getCategoriesJsonData()
    {
        $sections = Section::select('id', 'title')->get();
        $categories = Category::select('id', 'title')->get();
        $jsonStr = '[';


        foreach ($sections as $section) {

            $jsonStr .= '{ "sectionId": '. $section->id . ', "title": "' . $section->title . '", "isSelectable": false';

            if (count($section->categories) > 0) {
                $jsonStr .= ',';
                $jsonStr .= '"subs":[';
                foreach ($section->categories as $parent) {
                    $jsonStr .= '{ "id": ' . $parent->id . ', "title": "' . $parent->title . '", "isSelectable": false';

                    if (count($section->categories) > 0 && count($parent->childs) > 0) {
                        $jsonStr .= ',';
                        $jsonStr .= '"subs":[';
                        foreach ($parent->childs as $child) {
                            $jsonStr .= '{ "id": '.$child->id.' , "title": "' . $child->title . '"}';
                            if ($child->id != $parent->childs->last()->id)
                                $jsonStr .= ',';
                        }


                        $jsonStr .= ']';
                    }

                    $jsonStr .= '}';

                    if ($parent->id != $section->categories->last()->id)
                        $jsonStr .= ',';
                }
                $jsonStr .= ']';
            }


            $jsonStr .= '}';
            if ($section->id != $sections->last()->id)
                $jsonStr .= ',';
        }
        $jsonStr .= ']';

        return $jsonStr;

        
    }
    
    
    
    
    /* public function getCategoriesJsonData()
    {
        $sections = Section::select('id', 'title')->get();
        $categories = Category::select('id', 'title')->get();
        $jsonStr = "[";
      
 
        foreach ($sections as $section) {
         
            $jsonStr .= "{ sectionId: " . $section->id . ", title: '" . $section->title . "', isSelectable: false";

            if (count($section->categories) > 0) {
                $jsonStr.=",";
                $jsonStr .= "subs:[";
                foreach ($section->categories as $parent) {
                    $jsonStr .= "{ id: " . $parent->id . ", title: '" . $parent->title . "', isSelectable: false";

                    if (count($section->categories) > 0 && count($parent->childs) > 0) {
                        $jsonStr .= ",";
                        $jsonStr .= "subs:[";
                        foreach ($parent->childs as $child) {
                            $jsonStr .= "{ id: $child->id , title: '" . $child->title . "'}";
                            if ($child->id != $parent->childs->last()->id)
                            $jsonStr .= ",";
                        }


                        $jsonStr .= "]";
                    }

                    $jsonStr .= "}";

                    if ($parent->id != $section->categories->last()->id)
                    $jsonStr .= ",";
                
                


                  
                }
                $jsonStr .= "]";
            }


            $jsonStr .= "}";
            if ($section->id!=$sections->last()->id)
                $jsonStr .= ",";
           
        }
        $jsonStr .= ']';

        return json_encode($jsonStr);
    } */



   
  


    public function getSubCategories(Request $request)
    {
        $categories = Category::select('id', 'title')->where('parent_id', $request->id)->get();
        return view('admin.ajax.load-cate', compact('categories'));
    }

    public function loadExtras(){
        return view('admin.ajax.extras');
    }
    public function getBrands(Request $request)
    {
        $brand = Brand::select('id', 'title', 'logo')->get();
        return view('admin.ajax.load-brand', compact('brands'));
    }




    public function deleteImage(Request $request)
    {
        $table = $request->table;
        $id = $request->record_id;
        $columns = ['profiles' => 'avatar', 'categories' => 'banner', 'sections' => 'banner', 'brands' => 'logo', 'thumbnails' => 'path'];
        $models = ['profiles' => 'App\Profile', 'categories' => 'App\Category', 'sections' => 'App\Section', 'brands' => 'App\Brand', 'thumbnails' => 'App\Thumbnail'];
        $column = $columns[$table];
        $model = $models[$table];
        $record = $model::select($column)->where('id', $id)->first();
        $obj = array();
        $obj['msg'] = 'error deleting image';
        $obj['type'] = 'danger';
        if ($table == 'thumbnails') {
            $res = $model::where('id', $id)->delete();
        } else {
            $res = $model::where('id', $id)->update([$column => null]);
        }

        if ($res && @unlink($record[$column])) {
            $obj['msg'] = 'Image deleted successfully';
            $obj['type'] = 'success';
        }
        return $obj;
    }
}
