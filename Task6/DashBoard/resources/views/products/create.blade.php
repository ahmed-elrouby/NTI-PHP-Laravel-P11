@extends('layouts.layout')
@section('title','Create Product')

@section('content')
<!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif -->
@include('messages.message')
<form action="{{route('products.save')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-groub row">
        <div class="col-6">
            <label for="name_en">
                Name_en
            </label>
            <input type="text" name="name_en" id="name_en" class="form-control" value="{{old('name_en')}}">
            @error('name_en')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="col-6">
            <label for="name_ar">
                Name_ar
            </label>
            <input type="text" name="name_ar" id="name_ar" class="form-control" value="{{old('name_ar')}}">
            @error('name_ar')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-groub row">
        <div class="col-6">
            <label for="price">
                Price
            </label>
            <input type="number" name="price" id="price" class="form-control" value="{{old('price')}}">
            @error('price')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="col-6">
            <label for="quantity">
                Quantity
            </label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{old('quantity')}}">
            @error('quantity')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-groub row">
        <div class="col-4">
            <label for="brand">
                Brand
            </label>
            <select name="brand_id" id="brand" class="form-control">
                @foreach($brands as $brand)
                <option value="{{$brand->id}}" {{old('brand_id')==$brand->id ? 'selected':''}}>{{$brand->name_en}}</option>
                @endforeach
            </select>
            @error('brand_id')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="col-4">
            <label for="status">
                Status
            </label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{old('status')=='1' ? 'selected':''}}>Active</option>
                <option value="0" {{old('status')=='0' ? 'selected':''}}>Not-Active</option>
            </select>
            @error('status')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="col-4">
            <label for="subcategory">
                SubCategory
            </label>
            <select name="subcategory_id" id="subcategory" class="form-control">
                @foreach($subcategories as $subcategory)
                <option value="{{$subcategory->id}}" {{old('subcategory_id')==$subcategory->id ? 'selected':''}}>{{$subcategory->name_en}}</option>
                @endforeach
            </select>
            @error('subcategory_id')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-groub row">
        <div class="col-6">
            <label for="desc_en">
                Description_en
            </label>
            <textarea name="desc_en" id="desc_en" cols="30" rows="10" class="form-control">{{old('desc_en')}}</textarea>
            @error('desc_en')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
        <div class="col-6">
            <label for="desc_ar">
                Description_ar
            </label>
            <textarea name="desc_ar" id="desc_ar" cols="30" rows="10" class="form-control">{{old('desc_ar')}}</textarea>
            @error('desc_ar')
            <div class="alert alert-danger mt-2">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="image">
            Image
        </label>
        <input type="file" name="image" id="image" class="form-control">
        @error('image')
        <div class="alert alert-danger mt-2">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group row">
        <div class="col-1">
            <button class="btn btn-success rounded form-control " name="page" value="index">Create</button>
        </div>
        <div class="col-2">
            <button class="btn btn-dark rounded form-control " name="page" value="create">Create&Return</button>
        </div>
    </div>
</form>
@endsection
