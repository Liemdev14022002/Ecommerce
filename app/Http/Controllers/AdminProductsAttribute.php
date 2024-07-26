<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeChild;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class AdminProductsAttribute extends Controller
{
    public function index()
    {
        $attributes = Attribute::latest()->get();
        return view("admin.attributes",compact('attributes'));
    }
    public function create()
    {
        return view('admin.add_attributes');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:attributes'
        ]);

        Attribute::insert([
            'name' => $request->name,
            // 'slug'=>strtolower(str_replace('','-',$request->name))
        ]);

        return redirect()->route('admin.attributes')->with('message','Thuộc tính đã được thêm thành công!');
    }

    public function DeleteAttribute($id)
    {
        Attribute::findOrFail($id)->delete();

        return redirect()->route('admin.attributes')->with('message','Thuoc tinh đã được xóa thành công!');
    }
    public function edit($id)
    {
        $attributes_info = Attribute::findOrFail($id);

        return view('admin.edit_attributes',compact('attributes_info'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:attributes'
        ]);

        Attribute::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.attributes')->with('message','Thuộc tính đã được cập nhật thành công!');
    }

    public function addChild($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attributeChildren = $attribute->attributeChildren;
        return view('admin.add_attribute_child', compact('attribute', 'attributeChildren'));
    }

    public function storeChild(Request $request)
    {
        $validated = $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|unique:attribute_children,value'
        ]);

        AttributeChild::create([
            'attribute_id' => $request->attribute_id,
            'value' => $request->value,
        ]);

        return redirect()->route('admin.add_attribute_child', $request->attribute_id)
                         ->with('message','Thuộc tính con đã được thêm thành công!');
    }
}
