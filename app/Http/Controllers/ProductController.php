<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    
    public function index(){
        $response = Http::get('http://localhost:8000/api/product');
        $products = $response->json();
        return view('product.index',compact(['products']));

    }

    public function admin_view(){
        $response = Http::get('http://localhost:8000/api/product');
        $products = $response->json();
        return view('admin.index',compact(['products']));
    }

    public function create(){         
        if(session()->get('creadential')['user']->roles[0]->role_id <> 1 ){
            abort(403);
        }       
        return view('admin.create');
    }

    public function store(Request $request){
        
        $_token = session()->get('creadential')['_token'];
        
        $validated = $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'category'=>'required|string',
            'image'=>'file|mimes:jpg,png|max:1024'
        ]); 

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$_token,            
        ])->attach(
                'image', file_get_contents($validated['image']), $validated['name'].'.'.$validated['image']->extension()
            )->post('http://localhost:8000/api/product/create', [
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category' => $validated['category'],            
        ]);               

        if(!$response->failed()){                     
            return redirect('/admin/product',)->with(['success'=>'Product Has Been Created!']);    
        }else{
            return back()->withInput()->withErrors(['er'=>(null!==$response->json()?$response->json()['message']:'Terjadi Error Pada sistem')]);
        }
     


    }

    public function show($id){
        $response = Http::get('http://localhost:8000/api/product/'.$id);
        $product = $response->json()['product'];
        
        return view('admin.show',compact(['product']));
    }

    public function update(Request $request,$id){
        if(session()->get('creadential')['user']->roles[0]->role_id <> 1 ){
            abort(403);
        }        
        $_token = session()->get('creadential')['_token'];
        $validated = $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'category'=>'required|string',
            'image'=>'file|mimes:jpg,png|max:1024'
        ]); 


        if($request->image){
            $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$_token,            
        ])->attach(
                'image', file_get_contents($validated['image']), $validated['name'].'.'.$validated['image']->extension()
            )->post('http://localhost:8000/api/product/'.$id, [
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category' => $validated['category'],            
        ]); 
        }else{
            $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$_token,            
        ])->post('http://localhost:8000/api/product/'.$id, [
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category' => $validated['category'],            
        ]);  
        }
          

         

        if(!$response->failed()){                     
            return redirect('/admin/product/'.$id,)->with(['success'=>'Product Has Been Update!']);    
        }else{
            return back()->withInput()->withErrors(['er'=>(null!==($response->json())?$response->json()['message']:'Terjadi Error Pada sistem')]);
        }
        
    }

    public function delete($id){  
    if(session()->get('creadential')['user']->roles[0]->role_id <> 1 ){
            abort(403);
        }             
        $_token = session()->get('creadential')['_token'];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$_token, ])
        ->delete('http://localhost:8000/api/product/'.$id);
        
        if(!$response->failed()){                     
            return redirect('/admin/product')->with(['success'=>'Product Has Been Delete!']);    
        }else{
            return back()->withInput()->withErrors(['er'=>(empty($response->json())?$response->json()['message']:'Terjadi Error Pada sistem')]);
        }        
    }
}
