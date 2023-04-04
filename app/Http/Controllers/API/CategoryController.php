<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create(Request $request )
    {
        $category = new category();
        $category->slug = $request->input('slug');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
       
        $category->save();
        if($category){
            return response()->json([
                'status'=>200,
                'message'=>'Category Added Successfully',
                'category'=>$category,

            ]);

        }
    }
    public function store($id)
    {
        $category =  Category::find($id);
        if($category){
            return response()->json([
                'status'=>200,
                'category'=>$category,
            ]); 

        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Category Id Found'
            ]);
        }
       
    }
    public function edit($id)
    {
        $category = Category::find($id);
        if($category)
        {
            return response()->json([
                'status'=>200,
                'category'=>$category
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Category Id Found'
            ]);
        }

    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->slug = $request->input('slug');
        $category->name = $request->input('name');
        $category->description = $request->input('description');
       
        $category->save();
        return response()->json($category);
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category)
        {
            $category->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Category Deleted Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Category ID Found',
            ]);
        }
    }
}
