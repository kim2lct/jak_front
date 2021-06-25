@extends('welcome')
@section('title','Login Page')
@section('content')
	<section class="mt-10 max-w-md mx-auto">
            <form class="flex flex-col" method="POST" id="user_login" action="{{route('login.login')}}"> 
            	@csrf
            	<h1 class="text-3xl font-bold my-5">Login Page</h1>
            	@include('success')
            	@error('er')
                    	<div id="err"class="text-red-500">{{$message}}</div>
                    @enderror
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
                <button class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit">Sign In</button>
                <a href="{{route('register.register')}}" class="text-center text-purple-700 font-bold py-2 rounded  transition duration-200 mt-3" type="submit">Register</a>
            </form>
        </section>
@endsection