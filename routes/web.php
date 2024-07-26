<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminProductsAttribute;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminSubCategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\AdminUserController;

// Route cho việc đăng nhập bằng Google
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'])->name('auth.google.callback');

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::controller(ClientController::class)->group(function(){
    Route::get('/', 'Index')->name('home');
    Route::get('/shop-product', 'ShopProduct')->name('shopproduct');
    Route::get('/shop-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::post('/add-to-card', 'AddToCard')->name('addtocard');
    Route::post('/remove-to-card', 'RemoveToCard')->name('removetocard');
    Route::post('/update-cart', 'UpdateCart')->name('updatecart');
    Route::get('/viewcard', 'ViewCard')->name('viewcard');
    Route::get('/checkout', 'CheckOut')->name('checkout');
    Route::get('/cart-product', 'CartProduct')->name('cartproduct');
    Route::get('/cart-total','getCartTotal')->name('cart.total');
    Route::get('/about-us', 'About')->name('aboutus');
    Route::get('/shop-product/category/{id}/{slug}', 'CategoryProducts')->name('shopcategory'); // Route mới
});

Route::controller(CheckoutController::class)->group(function(){
    Route::post('/checkout','checkout')->name('checkout.process');
    Route::get('/checkout/success','CheckOutSuccess')->name('checkout.success');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Định nghĩa route cho trang dashboard của người dùng và đặt tên là user.dashboard
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/user/inforuser', [UserDashboardController::class, 'Infor'])->name('user.inforuser');
    Route::post('/user/update-inforuser', [UserDashboardController::class, 'UpdateInfor'])->name('user.update_inforuser');
    Route::get('/user/CheckOut', [UserDashboardController::class, 'CheckOutProducts'])->name('user.CheckOutProducts');
    Route::post('/user/CheckOutComplete', [UserDashboardController::class, 'CheckOutProductsComplete'])->name('user.CheckOutProductsComplete');
    Route::get('/user/CheckoutSuccess', [UserDashboardController::class, 'checkoutsuccsess'])->name('user.checkoutsuccsess');
    Route::get('/user/shopping-cart', [UserDashboardController::class, 'shopping'])->name('user.shopping');
    Route::get('/logout', [UserDashboardController::class, 'destroy'])->name('logout');
    Route::get('/user/home', [UserDashboardController::class, 'home'])->name('user.home');
    Route::get('/user/shop-product', [UserDashboardController::class, 'ShopProduct'])->name('user.shopproduct');
    Route::get('/user/shop-details/{id}/{slug}', [UserDashboardController::class, 'SingleProduct'])->name('user.singleproduct');
    Route::get('/user/shop-product/category/{id}/{slug}', [UserDashboardController::class, 'ShopCategory'])->name('user.shopcategory');
    Route::post('/user/add-to-card',[UserDashboardController::class, 'AddToCard'])->name('user.addtocard');
    Route::post('/user/update-to-card',[UserDashboardController::class, 'UpdateToCard'])->name('user.updatetocard');
    Route::get('/user/remove-to-card/{id}', [UserDashboardController::class, 'RemoveToCard'])->name('user.removetocard');
    Route::get('/user/showorders', [UserDashboardController::class, 'showorders'])->name('user.showorders');
    Route::delete('/user/showorders/{id}', [UserDashboardController::class, 'destroyOrder'])->name('user.destroyOrder');


    // Định nghĩa route cho trang dashboard của admin và đặt tên là admin.dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::controller(AdminCategoryController::class)->group(function(){
        Route::get('/admin/all-category','Index')->name('allcategory');
        Route::get('/admin/add-category','AddCategory')->name('addcategory');
        Route::post('/admin/store-category','StoreCategory')->name('StoreCategory');
        Route::get('/admin/edit-category/{id}','EditCategory')->name('editcategory');
        Route::post('/admin/update-category','UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}','DeleteCategory')->name('deletecategory');
        
    });
    Route::controller(AdminSubCategoryController::class)->group(function(){
        Route::get('/admin/all-subcategory','Index')->name('allsubcategory');
        Route::get('/admin/add-subcategory','AddSubCategory')->name('addsubcategory');
        Route::post('/admin/store-subcategory','StoreSubCategory')->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}','EditSubCategory')->name('editsubcategory');
        Route::post('/admin/update-subcategory','UpdateSubCategory')->name('updatesubcategory');
        Route::get('/admin/delete-subcategory/{id}','DeletesubCategory')->name('deletesubcategory');
    });
    Route::controller(AdminProductController::class)->group(function(){
        Route::get('/admin/all-products','Index')->name('allproducts');
        Route::get('/admin/add-products','AddProducts')->name('addproducts');
        Route::post('/admin/store-products','StoreProducts')->name('storeproduct');
        //Sửa hình ảnh của riêng sản phẩm
        Route::get('/admin/edit-img-products/{id}','EditProductImg')->name('editproductimg');
        Route::post('/admin/update-img-products','UpdateProductImg')->name('update_product_img');
        //Hết phần sửa hình ảnh của riêng sản phẩm
        Route::get('/admin/edit-products/{id}','Edit_Product')->name('edit_product');
        Route::post('/admin/update-products','Update_Product')->name('update_product');
        Route::get('/admin/delete-products/{id}','Delete_Product')->name('delete_product');

        Route::get('/admin/all-images','AllImages')->name('allimages');
        Route::get('/admin/add-images','AddImages')->name('addimages');
        Route::post('/admin/store-images','StoreImagesProducts')->name('storeimagesproducts');
    });

    Route::controller(AdminOrderController::class)->group(function(){
        Route::get('/admin/all-orders','Index')->name('allorders');
        Route::get('/admin/view-orders/{id}','ViewOrders')->name('admin.view_orders');
        Route::delete('/admin/delete-orders/{id}','Delete')->name('admin.delete_orders');
        Route::get('/admin/print-orders/{id}', 'PrintOrders')->name('admin.print_orders');
        //Route này xử lí Ajax Hiển thị hóa đơn mà không cần phải Reload lại trang 
        Route::get('/admin/orders/fetch','fetchOrders')->name('admin.fetch_orders');
    });

    Route::controller(AdminUserController::class)->group(function() {
        Route::get('/admin/all-users', 'index')->name('admin.allusers');
        Route::get('/admin/edit-user/{id}', 'edit')->name('admin.edit_user');
        Route::patch('/admin/update-user/{id}', 'update')->name('admin.update_user');
        Route::delete('/admin/delete-user/{id}', 'destroy')->name('admin.delete_user');
        Route::get('/admin/add-user', 'create')->name('admin.add_user');
        Route::post('/admin/store-user', 'store')->name('admin.store_user');

    });

    Route::controller(AdminProductsAttribute::class)->group(function() {
        Route::get('/admin/all-attributes', 'index')->name('admin.attributes');
        Route::get('/admin/add-attributes', 'create')->name('admin.ad_attributes');
        Route::post('/admin/store-attributes', 'store')->name('admin.store_attributes');
        Route::get('/admin/delete-attributes/{id}', 'DeleteAttribute')->name('admin.delete_attributes');
        Route::get('/admin/edit-attributes/{id}', 'edit')->name('admin.edit_attributes');
        Route::post('/admin/update-attributes/{id}', 'update')->name('admin.update_attributes');
        
        // Route thêm thuộc tính con
        Route::get('/admin/add-attribute-child/{id}', 'addChild')->name('admin.add_attribute_child');
        Route::post('/admin/store-attribute-child', 'storeChild')->name('admin.store_attribute_child');
    });

    Route::post('/logout', [AdminDashboardController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';
