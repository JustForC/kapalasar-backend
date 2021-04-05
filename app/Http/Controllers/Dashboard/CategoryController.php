<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    //
    public function getCategory(){
        $categories = Category::get();
        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/category',['categories' => $categories]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/category',['categories' => $categories]);
        }
    }

    public function makeCategory(Request $request){
        Category::create([
            'name' => $request->category_name,
        ]);
        return redirect('/category');
    }

    public function deleteCategory($id){
        Category::where('id','=',$id)->delete();
        return redirect('/category');
    }

    public function editForm($id){
        $Category = Category::findOrFail('id','=',$id);

        if(Auth::user()->roles->name == "Super Admin"){
            return view('superadmin/edit/category',['category' => $category]);
        }
        elseif(Auth::user()->roles->name == "Admin"){
            return view('admin/edit/category',['category' => $category]);
        }
    }

    public function doEdit(Request $request){
        Category::where('id','=',$request->category_id)
                ->update(['name' => $request->category_name]);
        return redirect('/category');
    }
}