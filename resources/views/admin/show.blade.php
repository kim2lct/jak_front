@extends('welcome')
@section('title','Create Product Page')
@section('content')
	<section class="mt-10 max-w-md mx-auto">
            <form class="flex flex-col" method="POST" enctype="multipart/form-data"  action="{{url('admin/product/'.$product['id'])}}"> 
            	@csrf
            	<h1 class="text-3xl font-bold my-5">Edit Product</h1>
            	@include('success')
            	@error('er')
                    	<div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" value="{{old('name')??$product['name']}}" required>
                    @error('name')
                    	<div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="price">Price</label>
                    <input type="number" name="price" id="price" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" value="{{old('price')??$product['price']}}" required>
                    @error('price')
                    	<div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">                    
                    <select name="category" id="category" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" required>
                        <option value="">-category-</option>
                        <option value="retail" {{($product['category'] == 'retail'?'selected':'')}}>Retail</option>
                        <option value="wholesale" {{($product['category'] == 'wholesale'?'selected':'')}}>Wholesale</option>
                    </select>
                    @error('category')
                        <div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div> 
                <div class="mb-3">                    
                    <input type="file" name="image" class="rounded w-full text-gray-700 focus:outline-none focus:border-purple-600 transition duration-500 px-3 pb-3">                        
                    @error('image')
                        <div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div>                
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Update</button>
                <a href="{{route('admin.product')}}" class="bg-gray-600 text-center hover:bg-gray-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 mt-3" type="submit">Back</a>
            </form>
        </section>
@endsection