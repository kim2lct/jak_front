<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class AuthController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){        
        $validated = $request->validate([            
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $response = Http::post('http://localhost:8000/api/login', [
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        if($response){
            $data = json_decode($response->body());
            session()->put('creadential',[
                '_token'=>$data->_token,
                'user'=>$data->user
            ]);

            return redirect('/');    
        }
        
    }

    public function register_index(){
        return view('auth.register');
    }

    public function register(Request $request){


        $validated = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|confirmed'            
        ]);


        $response = Http::post('http://localhost:8000/api/register', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],            
            'password_confirmation' => $validated['password'],            
        ]);

        
        
        if(!$response->failed()){                     
            return redirect('/login')->with(['success'=>'Product Has Been Created!']);    
        }else{
            return back()->withInput()->withErrors(['er'=>(empty($response->json())?$response->json()['message']:'Terjadi Error Pada sistem')]);
        }

        
    }

    public function logout(){        
        $_token = session()->get('creadential')['_token'];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$_token, ])
        ->get('http://localhost:8000/api/logout');
        session()->forget('creadential');
        return redirect('/');
    }
}
