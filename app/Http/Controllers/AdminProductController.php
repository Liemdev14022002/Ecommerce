<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVideo;
use App\Models\Subcategory;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view("admin.allproducts",compact('products'));
    }
    public function AddProducts(){
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        $attributes = Attribute::with('attributeChildren')->get();

        return view("admin.addproducts",compact('categories','subcategories','attributes'));
    }
    public function StoreProducts(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'product_name' => 'required|unique:products',
        'product_price' => 'required',
        'quantity' => 'required',
        'product_short_description' => 'required',
        'product_long_description' => 'required',
        'product_category_id' => 'required',
        'product_subcategory_id' => 'required',
        'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'attributes' => 'required|array'
    ]);

    // Handle the image upload
    $image = $request->file('product_img');
    $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    $request->product_img->move(public_path('upload'), $img_name);
    $img_url = 'upload/' . $img_name;

    // Insert the new product into the database
    $product = Product::create([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'quantity' => $request->quantity,
        'product_category_name' => Category::where('id', $request->product_category_id)->value('category_name'),
        'product_subcategory_name' => Subcategory::where('id', $request->product_subcategory_id)->value('subcategory_name'),
        'product_short_description' => $request->product_short_description,
        'product_long_description' => $request->product_long_description,
        'product_category_id' => $request->product_category_id,
        'product_subcategory_id' => $request->product_subcategory_id,
        'product_img' => $img_url,
        'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
    ]);

    // Attach the selected attributes to the product
    $product->attributes()->attach($request->attributes);

    // Increment the product count for the category and subcategory
    Category::where('id', $request->product_category_id)->increment('product_count', 1);
    Subcategory::where('id', $request->product_subcategory_id)->increment('product_count', 1);

    // Redirect to the all products page with a success message
    return redirect()->route('allproducts')->with('message', 'Sản phẩm đã được thêm thành công!');
}

    // public function StoreProducts(Request $request){
    //     // Validate the incoming request
    //     $validated = $request->validate([
    //         'product_name' => 'required|unique:products',
    //         'product_price'=>'required',
    //         'quantity'=>'required',
    //         'product_short_description'=>'required',
    //         'product_long_description'=>'required',
    //         'product_category_id'=>'required',
    //         'product_subcategory_id'=>'required',
    //         'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'attributes' => 'required|array' // Thêm xác thực cho thuộc tính
    //     ]);
    
    //     // Handle the image upload
    //     $image = $request->file('product_img');
    //     $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    //     $request->product_img->move(public_path('upload'), $img_name);
    //     $img_url = 'upload/'.$img_name;
    
    //     // Get the category and subcategory names
    //     $category_id = $request->product_category_id;
    //     $subcategory_id = $request->product_subcategory_id;
    
    //     $category_name = Category::where('id', $category_id)->value('category_name');
    //     $subcategory_name = Subcategory::where('id', $subcategory_id)->value('subcategory_name');
    
    //     // Insert the new product into the database
    //     Product::insert([
    //         'product_name' => $request->product_name,
    //         'product_price' => $request->product_price,
    //         'quantity' => $request->quantity,
    //         'product_category_name' => $category_name, // Use the correct variable here
    //         'product_subcategory_name' => $subcategory_name, // Use the correct variable here
    //         'product_short_description' => $request->product_short_description,
    //         'product_long_description' => $request->product_long_description,
    //         'product_category_id' => $request->product_category_id,
    //         'product_subcategory_id' => $request->product_subcategory_id,
    //         'product_img' => $img_url, // Use the correct variable here
    //         'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
    //     ]);
    
    //     // Increment the product count for the category and subcategory
    //     Category::where('id', $category_id)->increment('product_count', 1);
    //     Subcategory::where('id', $subcategory_id)->increment('product_count', 1);
    
    //     // Redirect to the all products page with a success message
    //     return redirect()->route('allproducts')->with('message', 'Sản phẩm đã được thêm thành công!');
    // }
    public function EditProductImg($id)
    {
        $productimg = Product::findOrFail($id);
        return view('admin.editimgproducts',compact('productimg'));
    }
    public function UpdateProductImg(Request $request)
    {
        $validated = $request->validate([
            'product_img'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $id = $request->id;
        // Handle the image upload
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/'.$img_name;

        Product::findOrFail($id)->update([
            'product_img' => $img_url,
        ]);

        return redirect()->route('allproducts')->with('message', 'Ảnh sản phẩm đã được cập nhật thành công!');
    }

    public function Edit_Product($id){
        $productinfor = Product::findOrFail($id);
        $categories=Category::latest()->get();
        $subcategories = Subcategory::latest()->get();

        return view('admin.editproduct',compact('productinfor','categories','subcategories'));
    }

    public function Update_Product(Request $request)
{
    $validated = $request->validate([
        'product_name' => 'required|unique:products,product_name,' . $request->product_id,
        'product_price' => 'required',
        'quantity' => 'required',
        'product_short_description' => 'required',
        'product_long_description' => 'required',
        'product_category_id' => 'required',
        'product_subcategory_id' => 'required',
        'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'attributes' => 'required|array'
    ]);

    $product = Product::findOrFail($request->product_id);

    // Handle image upload if a new image is provided
    if ($request->hasFile('product_img')) {
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;
        $product->product_img = $img_url;
    }

    // Update product
    $product->update([
        'product_name' => $request->product_name,
        'product_price' => $request->product_price,
        'quantity' => $request->quantity,
        'product_category_name' => Category::where('id', $request->product_category_id)->value('category_name'),
        'product_subcategory_name' => Subcategory::where('id', $request->product_subcategory_id)->value('subcategory_name'),
        'product_short_description' => $request->product_short_description,
        'product_long_description' => $request->product_long_description,
        'product_category_id' => $request->product_category_id,
        'product_subcategory_id' => $request->product_subcategory_id,
        'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
    ]);

    // Sync the selected attributes to the product
    $product->attributes()->sync($request->attributes);

    return redirect()->route('allproducts')->with('message', 'Thông tin sản phẩm đã được cập nhật thành công!');
}


//     public function Update_Product(Request $request)
// {
//     // Xác thực yêu cầu
//     $validated = $request->validate([
//         'product_name' => 'required|unique:products,product_name,'.$request->product_id, // xác thực unique bỏ qua sản phẩm hiện tại
//         'product_price' => 'required',
//         'quantity' => 'required',
//         'product_short_description' => 'required',
//         'product_long_description' => 'required',
//         'product_category_id' => 'required',
//         'product_subcategory_id' => 'required',
//         'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // trường ảnh là tùy chọn
//         'attributes' => 'required|array' // Thêm xác thực cho thuộc tính
//     ]);

//     $product = Product::findOrFail($request->product_id);

//     // Xử lý tải lên hình ảnh nếu có ảnh mới
//     if ($request->hasFile('product_img')) {
//         $image = $request->file('product_img');
//         $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
//         $request->product_img->move(public_path('upload'), $img_name);
//         $img_url = 'upload/'.$img_name;
//         $product->product_img = $img_url;
//     }

//     // Lấy ID danh mục và danh mục phụ hiện tại
//     $currentCategoryId = $product->product_category_id;
//     $currentSubcategoryId = $product->product_subcategory_id;

//     // Lấy ID danh mục và danh mục phụ mới
//     $newCategoryId = $request->product_category_id;
//     $newSubcategoryId = $request->product_subcategory_id;

//     // Giảm số lượng sản phẩm của danh mục và danh mục phụ cũ
//     if ($currentCategoryId != $newCategoryId) {
//         Category::where('id', $currentCategoryId)->decrement('product_count', 1);
//         Category::where('id', $newCategoryId)->increment('product_count', 1);
//     }

//     if ($currentSubcategoryId != $newSubcategoryId) {
//         Subcategory::where('id', $currentSubcategoryId)->decrement('product_count', 1);
//         Subcategory::where('id', $newSubcategoryId)->increment('product_count', 1);
//     }

//     // Lấy tên danh mục và danh mục phụ
//     $category_name = Category::where('id', $newCategoryId)->value('category_name');
//     $subcategory_name = Subcategory::where('id', $newSubcategoryId)->value('subcategory_name');

//     // Cập nhật sản phẩm
//     $product->update([
//         'product_name' => $request->product_name,
//         'product_price' => $request->product_price,
//         'quantity' => $request->quantity,
//         'product_category_name' => $category_name,
//         'product_subcategory_name' => $subcategory_name,
//         'product_short_description' => $request->product_short_description,
//         'product_long_description' => $request->product_long_description,
//         'product_category_id' => $newCategoryId,
//         'product_subcategory_id' => $newSubcategoryId,
//         'slug' => strtolower(str_replace(' ', '-', $request->product_name)),
//     ]);

//     return redirect()->route('allproducts')->with('message', 'Thông tin sản phẩm đã được cập nhật thành công!');
// }



public function Delete_Product($id)
{
    // Lấy sản phẩm
    $product = Product::findOrFail($id);

    // Lấy ID danh mục và danh mục phụ của sản phẩm trước khi xóa
    $category_id = $product->product_category_id;
    $subcategory_id = $product->product_subcategory_id;

    // Xóa sản phẩm
    $product->delete();

    // Giảm số lượng sản phẩm của danh mục và danh mục phụ
    Category::where('id', $category_id)->decrement('product_count', 1);
    Subcategory::where('id', $subcategory_id)->decrement('product_count', 1);

    // Chuyển hướng về trang danh sách sản phẩm với thông báo thành công
    return redirect()->route('allproducts')->with('message', 'Sản phẩm đã được xóa thành công!');
}

    public function AllImages()
    {
        return view('admin.allproductimages');
    }
    public function AddImages()
    {
        $products = Product::latest()->get();
        return view('admin.add_images_product',compact('products'));
    }
    
    public function StoreImagesProducts(Request $request)
{
    // Xác thực yêu cầu đầu vào
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'product_images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'product_videos.*' => 'required|mimes:mp4,mov,avi|max:204800', // Giả sử video không quá 200MB
    ]);

    $product = Product::find($request->product_id);

    // Lưu ảnh sản phẩm
    if ($request->hasfile('product_images')) {
        foreach ($request->file('product_images') as $file) {
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $name);

            $productImage = new ProductImage();
            $productImage->product_id = $product->id;
            $productImage->image_path = 'upload/' . $name;
            $productImage->save();
        }
    }

    // Lưu video sản phẩm
    if ($request->hasfile('product_videos')) {
        foreach ($request->file('product_videos') as $file) {
            $name = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('upload'), $name); // Thay đổi đường dẫn thành 'upload'

            $productVideo = new ProductVideo();
            $productVideo->product_id = $product->id;
            $productVideo->video_path = 'upload/' . $name; // Thay đổi đường dẫn thành 'upload'
            $productVideo->save();
        }
    }

    return redirect()->back()->with('success', 'Hình ảnh và video đã được thêm thành công!');
}
}
