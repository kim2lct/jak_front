@extends('welcome')
@section('title','welcome to my shop')
@section('content')
	<section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
         	
        	@forelse($products['products'] as $key => $product)   
        	@php
        		$discount = ($product['price'] > 40000?($product['price'] - ($product['price']*.4)):0);
        	@endphp     	
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
                <a href="#">
                    <img class="hover:grow hover:shadow-lg" src="http://localhost:8000/images/{{$product['image']}}">
                    <div class="pt-3 flex items-center justify-between">
                        <p class="text-sm px-3 text-white rounded-full @if($product['category'] == 'retail') bg-purple-600 @else bg-blue-400 @endif">{{$product['category']}} </p>                        
                    </div>
                    <div class="pt-1 flex items-center justify-between">
                        <p class="">{{$product['name']}} </p>                        
                    </div>
                    @if($discount)
                    	<p class="pt-1 text-gray-900">Rp. {{number_format($discount,2)}} @if($discount)<sup class="text-red-400 font-lg line-through">Rp. {{number_format($product['price'],2)}}</sup>@endif</p>
                    @else
                    	<p class="pt-1 text-gray-900">Rp. {{number_format($product['price'],2)}}</p>
                    @endif
                    
                </a>
            </div>
            @empty
            <div class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col">
            	There no product
            </div>
            @endforelse

            

            </div>

    </section>
@endsection