<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\SaveProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\traits\Photo;
use Illuminate\Support\Facades\Validator;
use App\Http\traits\apiTrait;

class ProductController extends Controller
{
    use Photo,apiTrait;
    public function index()
    {
        $products = Product::all();

        //for paginate products
        // $products = Product::paginate(3);

        return $this->DataResponse(compact('products'));
    }
    public function create()
    {
        $brands = Brand::where('status', '1')->get();
        $subcategories = Subcategory::where('status', '1')->get();
        return $this->DataResponse(compact('brands', 'subcategories'));
    }
    public function edit($id)
    {
        $products = Product::find($id);
        if ($products) {
            $brands = Brand::where('status', '1')->get();
            $subcategories = Subcategory::where('status', '1')->get();
            return $this->DataResponse(compact('products', 'brands', 'subcategories'));
        }
        return $this->ErrorMessage('In Valid Id');
    }
    public function save(Request $request, SaveProductRequest $SaveProductRequest)
    {
        $data = $request->except('image');
        $data['image'] = $this->UploadPhoto($request->image, 'products');
        Product::create($data);
        return $this->SuccessMessage('Product Created Successfully.');
    }
    public function update(Request $request, $id, UpdateProductRequest $UpdateProductRequest)
    {
        $AsscId = ['id' => $id];
        $IdValidation = Validator::make($AsscId, [
            'id' => ['required', 'exists:products', 'integer']
        ]);
        if ($IdValidation->fails()) {
            return $this->ErrorMessage('In Valid Id');
        }
        $data = $request->except('image', '_method');
        if ($request->has('image')) {
            $oldphoto = Product::find($id)->image;
            $this->DeletePhoto($oldphoto, 'products');
            $data['image'] = $this->UploadPhoto($request->image, 'products');
        }
        Product::where('id',$id)->update($data);
        return $this->SuccessMessage('Product Update Successfully.');
    }
    public function delete($id)
    {
        $AsscId = ['id' => $id];
        $IdValidation = Validator::make($AsscId, [
            'id' => ['required', 'exists:products', 'integer']
        ]);
        if ($IdValidation->fails()) {
            return $this->ErrorMessage('In Valid Id');
        }
        $product=Product::find($id);
        $oldphoto = $product->image;
        $this->DeletePhoto($oldphoto, 'products');
        $product->delete();
        return $this->SuccessMessage('Product Deleted Successfully.');
    }
}
