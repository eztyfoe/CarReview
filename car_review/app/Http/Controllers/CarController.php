<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Car;
use App\Review;
use Validator;
use Storage;

class CarController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'list', 'detail', 'allList'
        ]]);
    }

    public function index(){
        if(session()->get('role') == 0){
            $data = Car::orderBy('id','asc')->paginate(10);
            $car_count = Car::count();
            return view('car.index', compact('data','car_count'));
        }else{
            return redirect('/home');
        }
    }

    public function search(Request $request){
        $search = $request->search;
        if(session()->get('role') == 0){
            $data = Car::select('car.*')
            ->orderBy('car.id','asc')
            ->where('car.id', 'like', '%' . $search . '%')
            ->orWhere('brand.name', 'like', '%' . $search . '%')
            ->orWhere('car.name', 'like', '%' . $search . '%')
            ->orWhere('car.created_date', 'like', '%' . $search . '%')
            ->orWhere('car.top_speed', 'like', '%' . $search . '%')
            ->orWhere('car.horse_power', 'like', '%' . $search . '%')
            ->orWhere('car.torque', 'like', '%' . $search . '%')
            ->orWhere('car.created_at', 'like', '%' . $search . '%')
            ->orWhere('car.updated_at', 'like', '%' . $search . '%')
            ->join('brand', 'brand.id', '=', 'car.id_brand')
            ->paginate(10);
            $car_count = Car::where('car.id', 'like', '%' . $search . '%')
            ->orWhere('brand.name', 'like', '%' . $search . '%')
            ->orWhere('car.name', 'like', '%' . $search . '%')
            ->orWhere('car.created_date', 'like', '%' . $search . '%')
            ->orWhere('car.top_speed', 'like', '%' . $search . '%')
            ->orWhere('car.horse_power', 'like', '%' . $search . '%')
            ->orWhere('car.torque', 'like', '%' . $search . '%')
            ->orWhere('car.created_at', 'like', '%' . $search . '%')
            ->orWhere('car.updated_at', 'like', '%' . $search . '%')
            ->join('brand', 'brand.id', '=', 'car.id_brand')
            ->count();
            return view('car.index', compact('data','car_count','search'));
        }else{
            return redirect('/home');
        }
    }

    public function create(){
        if(session()->get('role') == 0){
            $pages = "create";
            $brand_list= Brand::pluck('name','id');
            return view('car.create', compact('pages','brand_list'));
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
            'id_brand' => 'required',
            'top_speed'  =>  'required|int',
            'horse_power'  =>  'required|int',
            'torque'  =>  'required|int',
            'description' => 'required|max:1000',
            'created_date' => 'required|date',
            'photo' => 'sometimes|image|mimes:jpeg,bmp,png|max:500|dimensions:width=800,height:600'
        ]);
        if($validator->fails()){
            return redirect('/admin/car/create')
                ->withInput()
                ->withErrors($validator);
        }


        $car = Car::create($input);

        return redirect('/admin/car');
    }

    public function edit($id){
        if(session()->get('role') == 0){
            $car = Car::findorFail($id);
            $brand_list= Brand::pluck('name','id');

            return view('car.edit', compact('car','brand_list'));
        }else{
            return redirect('/home');
        }
    }

    public function update($id, Request $request){
        $car = Car::findOrFail($id);
        $input = $request->all();
        $validator = null;

        if($request->hasFile('image')){
            $exist = Storage::disk('image')->exists($car->photo);
            if(isset($car->photo) && $exist){
                $delete = Storage::disk('image')->delete($car->photo);
            }

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
            'id_brand' => 'required',
            'top_speed'  =>  'required|int',
            'horse_power'  =>  'required|int',
            'torque'  =>  'required|int',
            'description' => 'required|max:1000',
            'created_date' => 'required|date',
            'photo' => 'sometimes|image|mimes:jpeg,bmp,png|max:500|dimensions:width=800,height:600'
        ]);

        if($validator->fails()){
            return redirect('/admin/car/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $car->update($input);

        return redirect('/admin/car');
    }

    public function destroy($id){
        if(session()->get('role') == 0){
            $car = Car::findOrFail($id);

            $exist = Storage::disk('image')->exists($car->photo);
            if(isset($car->photo) && $exist){
                $delete = Storage::disk('image')->delete($car->photo);
            }

            $car->delete();
            return redirect('/admin/car');
        }else{
            return redirect('/home');
        }
    }

    public function allList(){
        $data = Car::orderBy('id','asc')->paginate(6);
        $car_count = Car::count();
        return view('car.list', compact('data','car_count'));
    }

    public function list(Request $request){
        $search = $request->search;

        $data = Car::where('name', 'like', '%' . $search . '%')->orderBy('id','asc')->paginate(6);
        $car_count = Car::where('name', 'like', '%' . $search . '%')->count();
        return view('car.list', compact('data','car_count'));
    }
    public function detail($id){
        $data = Car::findOrFail($id);
        $data_car = Car::where('id_brand',$data->id_brand)->where('id', '!=',$data->id)->inRandomOrder()->take(3)->get();
        $data_brand = Brand::where('id', '!=', $data->id_brand)->inRandomOrder()->take(3)->get();
        $data_review = Review::where('id_car', $id)->orderBy('created_at','asc')->get();
        $action = 'create';

        return view('car.detail', compact('data', 'data_car', 'data_brand', 'data_review', 'action'));
    }
}
