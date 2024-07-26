<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AdminSubCategoryController extends Controller
{
    public function index(){
        $subcategories = Subcategory::latest()->get();
        return view("admin.all_sub_category",compact('subcategories'));
    }
    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view("admin.add_sub_category",compact('categories'));
    }
    public function StoreSubCategory(Request $request)
    {
        $validated = $request->validate([
            'subcategory_name' => 'required|unique:subcategories',
            'category_id'=>'required'
        ]);

        $category_id = $request->category_id;

        $category_name = Category::where('id', $category_id)->value('category_name');

        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug'=>strtolower(str_replace('','-',$request->subcategory_name)),
            'category_id'=>$category_id,
            'category_name'=>$category_name
        ]);

        Category::where('id',$category_id)->increment('subcategory_count',1);

        return redirect()->route('allsubcategory')->with('message','Danh mục phụ đã được thêm thành công!');
    }
    public function EditSubCategory($id){
        $subcategory_info = Subcategory::findOrFail($id);
        $categories = Category::latest()->get();

        return view('admin.editsubcategory',compact('subcategory_info','categories'));
    }

    public function UpdateSubCategory(Request $request)
{
    $validated = $request->validate([
        'subcategory_name' => 'required|unique:subcategories,subcategory_name,' . $request->subcategory_id,
        'category_id' => 'required'
    ]);

    $subcategory_id = $request->subcategory_id;
    $new_category_id = $request->category_id;
    $subcategory = Subcategory::findOrFail($subcategory_id);
    $old_category_id = $subcategory->category_id;

    $category_name = Category::where('id', $new_category_id)->value('category_name');

    // Update the subcategory
    $subcategory->update([
        'subcategory_name' => $request->subcategory_name,
        'slug' => strtolower(str_replace(' ', '-', $request->subcategory_name)),
        'category_id' => $new_category_id,
        'category_name' => $category_name
    ]);

    // Update the subcategory counts
    if ($old_category_id != $new_category_id) {
        // Decrement the old category's subcategory count
        Category::where('id', $old_category_id)->decrement('subcategory_count', 1);
        // Increment the new category's subcategory count
        Category::where('id', $new_category_id)->increment('subcategory_count', 1);
    }

    return redirect()->route('allsubcategory')->with('message', 'Danh mục phụ đã được cập nhật thành công!');
}



    public function DeletesubCategory($id)
    {
        $category_id = Subcategory::where('id',$id)->value('category_id');
        Subcategory::findOrFail($id)->delete();

        Category::where('id', $category_id)->decrement('subcategory_count',1);
        return redirect()->route('allsubcategory')->with('message','Danh mục phụ đã được xóa thành công!');
    }
}
