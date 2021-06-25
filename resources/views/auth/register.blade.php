@extends('welcome')
@section('title','Register Page')
@section('content')
	<section class="mt-10 max-w-md mx-auto">
            <form class="flex flex-col" method="POST" id="user_login" action="{{route('register.register')}}"> 
            	@csrf
            	<h1 class="text-3xl font-bold my-5">Register Page</h1>
            	@error('er')
                    	<div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" value="{{old('name')}}">
                    @error('name')
                    	<div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">Email</label>
                    <input type="text" name="email" id="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3" value="{{old('email')}}">
                    @error('email')
                        <div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">Password</label>
                    <input type="password" name="password" id="password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                    @error('password')
                    	<div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div>   
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="confirmation_password" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3">
                    @error('password')
                        <div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
                </div>                
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Register</button>
            </form>
        </section>
@endsection