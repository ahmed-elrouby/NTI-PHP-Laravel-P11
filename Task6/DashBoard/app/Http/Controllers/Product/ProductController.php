<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\traits\Photo;

class ProductController extends Controller
{
    use Photo;
    public function index()
    {
        $products = DB::table('products')->select('id', 'name_en', 'price', 'quantity', 'status', 'created_at')->get();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        $brands = DB::table('brands')->select('id', 'name_en')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->get();
        return view('products.create', compact('brands', 'subcategories'));
    }
    public function save(Request $request, SaveProductRequest $SaveProductRequest)
    {
        $data = $request->except('_token', 'page', 'image');
        $data['image'] = $this->UploadPhoto($request->image, 'products');
        DB::table('products')->insert($data);
        return $this->AcctionBasedonButton($request, 'Created');
    }
    public function update(Request $request, $id, UpdateProductRequest $updateProductRequest)
    {
        $data = $request->except('_method', '_token', 'image', 'page');
        if ($request->has('image')) {
            $productOldImage = DB::table('products')->select('image')->where('id', $id)->first()->image;
            $this->DeletePhoto($productOldImage, 'products');
            $data['image'] = $this->UploadPhoto($request->image, 'products');
        }
        DB::table('products')->where('id', $id)->update($data);
        return $this->AcctionBasedonButton($request, 'Updated');
    }
    public function edit($id)
    {
        $product = DB::table("products")->find($id);
        $brands = DB::table('brands')->select('id', 'name_en')->get();
        $subcategories = DB::table('subcategories')->select('id', 'name_en')->get();
        return view('products.edit', compact('product', 'brands', 'subcategories'));
    }
    public function delete($id)
    {
        $oldPhoto = DB::table('products')->select('image')->where('id', $id)->first()->image;
        $this->DeletePhoto($oldPhoto, 'products');
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('success', "Product Deleted Successfully.");
    }
    private function AcctionBasedonButton($request, $opreration)
    {
        if ($request->page == 'index') {
            return redirect()->route('products.index')->with('success', "Product $opreration Successfully.");
        }
        return redirect()->back()->with('success', "Product $opreration Successfully.");
    }
}
