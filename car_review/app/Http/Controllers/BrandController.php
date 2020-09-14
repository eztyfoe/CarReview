<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Car;
use Validator;
use Storage;

class BrandController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'list', 'detail', 'allList'
        ]]);
    }

    public function index(){
        if(session()->get('role') == 0){
            $data = Brand::orderBy('id','asc')->paginate(10);
            $brand_count = Brand::count();
            return view('brand.index', compact('data','brand_count'));
        }else{
            return redirect('/home');
        }
    }
    public function search(Request $request){
        $search = $request->search;
        if(session()->get('role') == 0){
            $data = Brand::orderBy('id','asc')
            ->where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('origin', 'like', '%' . $search . '%')
            ->orWhere('created_date', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->orWhere('updated_at', 'like', '%' . $search . '%')
            ->paginate(10);
            $brand_count = Brand::where('id', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('origin', 'like', '%' . $search . '%')
            ->orWhere('created_date', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->orWhere('updated_at', 'like', '%' . $search . '%')
            ->count();
            return view('brand.index', compact('data','brand_count','search'));
        }else{
            return redirect('/home');
        }
    }

    public function create(){
        if(session()->get('role') == 0){
            $pages = "create";
            return view('brand.create', compact('pages'));
        }else{
            return redirect('/home');
        }
    }

    public function createPost(Request $request){
        $input = $request->all();
        $validator = null;

        if($request->hasFile('image')){
            $photo = $request->file('image');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('image')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = "files";
                $request->file('image')->move($upload_path, $photo_name);
                $input['image'] = $photo_name;
            }

        }


        $validator = Validator::make($input, [
            'name'  =>  'required|string|max:30',
            'origin' => 'required|string|max:30',
            'description' => 'required|max:1000',
            'created_date' => 'required|date',
        ]);
        if($validator->fails()){
            return redirect('/admin/brand/create')
                ->withInput()
                ->withErrors($validator);
        }

        $brand = Brand::create($input);

        return redirect('/admin/brand');
    }

    public function edit($id){
        if(session()->get('role') == 0){
            $brand = Brand::findorFail($id);

            return view('brand.edit', compact('brand'));
        }else{
            return redirect('/home');
        }
    }

    public function update($id, Request $request){
        $brand = Brand::findOrFail($id);
        $input = $request->all();

        if($request->hasFile('image')){
            $exist = Storage::disk('image')->exists($brand->photo);
            if(isset($brand->photo) && $exist){
                $delete = Storage::disk('image')->delete($brand->photo);
            }

            $photo = $request->file('image');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('image')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = "files";
                $request->file('image')->move($upload_path, $photo_name);
                $input['image'] = $photo_name;
            }

            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ){
                $validator = Validator::make($input, [
                    'name'  =>  'required|string|max:30',
                    'origin' => 'required|string|max:30',
                    'description' => 'required|max:1000',
                    'created_date' => 'required|date',
                ]);
                if($validator->fails()){
                    return redirect('/admin/brand/' . $id . '/edit')
                        ->withInput()
                        ->withErrors($validator);
                }

            }else{
                $validator = Validator::make($input, [
                    'name'  =>  'required|string|max:30',
                    'origin' => 'required|string|max:30',
                    'description' => 'required|max:1000',
                    'created_date' => 'required|date',
                    'photo' => 'sometimes|image|mimes:jpeg,bmp,png|max:500|dimensions:width=300,height:400'
                ]);
                if($validator->fails()){
                    return redirect('/admin/brand/' . $id . '/edit')
                        ->withInput()
                        ->withErrors($validator);
                }

            }
        }
        $brand->update($input);

        return redirect('/admin/brand');
    }

    public function destroy($id){
        if(session()->get('role') == 0){
            $brand = Brand::findOrFail($id);

            $exist = Storage::disk('image')->exists($brand->photo);
            if(isset($brand->photo) && $exist){
                $delete = Storage::disk('image')->delete($brand->photo);
            }

            $brand->delete();
            return redirect('/admin/brand');
        }else{
            return redirect('/home');
        }
    }

    public function allList(){
        $data = Brand::orderBy('id','asc')->paginate(6);
        $brand_count = Brand::count();
        return view('brand.list', compact('data','brand_count'));
    }

    public function list(Request $request){
        $search = $request->search;
        $data = Brand::where('name', 'like', '%' . $search . '%')->orderBy('id','asc')->paginate(6);
        $brand_count = Brand::where('name', 'like', '%' . $search . '%')->count();
        return view('brand.list', compact('data','brand_count','search'));
    }

    public function detail($id){
        $data = Brand::findOrFail($id);
        $data_car = Car::where('id_brand',$id)->orderBy('created_date','desc')->take(3)->get();
        $car_count = Car::where('id_brand',$id)->count();
        $data_brand = Brand::where('id', '!=', $id)->inRandomOrder()->take(3)->get();

        return view('brand.detail', compact('data', 'data_car', 'car_count', 'data_brand'));
    }
}
