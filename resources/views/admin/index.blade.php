@extends('welcome')
@section('title','Admin Product')
@section('content')
    <style>
        th,td{
            padding: 10px 5px;
        }
        tbody tr:nth-child(odd){
            background-color: #dedede;
        }
    </style>
	<section class="bg-white py-8">

        <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
            <div class="flex flex-col mb-3">
            @include('success')            
            <a href="{{route('admin.create')}}" class="modal-close px-4 bg-purple-600 mb-3 p-3 rounded-lg text-white hover:bg-indigo-400">Add New Product</a>
            </div>
            
         	<table class="border-collapse w-full text-left" border="1">
              <thead class="border bg-purple-600 text-white">
                  <tr>
                      <th>Foto Gambar</th>
                      <th>Nama Barang</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Diskon</th>
                      <th>Aksi</th>
                  </tr>
              </thead> 
              <tbody>
                  @forelse($products['products'] as $key => $product)   
            @php
                $discount = ($product['price'] > 40000?($product['price'] - ($product['price']*.4)):0);
            @endphp 
                <tr>
                    <td><img class="w-24" src="http://localhost:8000/images/{{$product['image']}}"></td>
                    <td>{{$product['name']}}</td>
                    <td>{{Str::title($product['category'])}}</td>
                    <td>{{number_format($product['price'],2)}}</td>
                    <td>{{number_format($discount,2)}}</td>
                    <td>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{url('admin/product/'.$product['id'])}}" class="bg-blue-500 hover:bg-blue-400 text-white rounded-full p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
</svg>
                            </a>
                            <a href="{{url('admin/product/'.$product['id'].'/delete')}}" onclick="return confirm('Are you sure to delete it?')" class="bg-red-500 hover:bg-red-400 text-white rounded-full p-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
</svg></a>
                        </div>
                    </td>
                </tr>               
            @empty
            <tr>
                <td>There no product</td>
            </tr>
            @endforelse

              </tbody> 
            </table>
        	
            

            </div>

    </section>
@endsection