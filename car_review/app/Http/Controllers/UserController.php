<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Car;
use App\Brand;
use App\Review;
use Validator;
use Storage;
use Auth;
use Hash;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'login', 'loginPost', 'register', 'registerPost', 'redirectHome', 'home'
        ]]);
    }

    public function login(){
        return view('user.login');
    }

    public function loginPost(Request $request){
        $user_data = array(
            'email' =>  $request->get('email'),
            'password' =>  $request->get('password'),
        );

        if(Auth::attempt($user_data)){
            $user = Users::where('email',$request->get('email'))->get();
            if($user['0']['role'] == 0){
                session()->put('role', $user['0']['role']);
                session()->put('id', $user['0']['id']);
                session()->put('name', $user['0']['name']);
                return redirect('/admin/home');
            }elseif($user['0']['role'] == 1){
                session()->put('role', $user['0']['role']);
                session()->put('id', $user['0']['id']);
                session()->put('name', $user['0']['name']);
                return redirect('/home');
            }else{
                return redirect('/login')
                ->withErrors('Wrong Email or Password!');
            }
        }else{
            return redirect('/login')
                ->withErrors('Wrong Email or Password!');
        }


    }

    public function logout(){
        $role = session()->get('role');
        Auth::logout();
        if($role == 0){
            session()->pull('id', 'default');
            session()->pull('role', 'default');
            session()->pull('name', 'default');
            return redirect('/login');
        }else{
            session()->pull('id', 'default');
            session()->pull('role', 'default');
            session()->pull('name', 'default');
            return redirect('/home');
        }
    }

    public function register(){
        $pages = "register";
        return view('user.create', compact('pages'));
    }

    public function registerPost(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'username'  =>  'required|string|max:30|unique:users,username',
            'password' => 'required|string|max:30',
            'email' => 'required|max:30|unique:users,email',
            'name' => 'required|string|max:30',
            'birth_date' => 'required|date',
        ]);

        if($validator->fails()){
            return redirect('register')
                ->withInput()
                ->withErrors($validator);
        }

        $input['password'] = Hash::make($input['password']);
        $user = Users::create($input);

        return redirect('login');
    }

    public function adminHome(){
        if(session()->get('role') == 0){
            $data_user = Users::orderBy('id','desc')->take(5)->get();
            $user_count = Users::count();
            $data_car = Car::orderBy('id','desc')->take(5)->get();
            $car_count = Car::count();
            $data_brand = Brand::orderBy('id','desc')->take(5)->get();
            $brand_count = Brand::count();
            $data_review = Review::orderBy('id','desc')->take(5)->get();
            $review_count = Review::count();

            return view('user.adminHome', compact('data_user','user_count', 'data_car','car_count', 'data_brand','brand_count', 'data_review','review_count'));
        }else{
            return redirect('/home');
        }
    }

    public function list(){
        if(session()->get('role') == 0){
            $data = Users::orderBy('id','asc')->paginate(10);
            $user_count = Users::count();
            return view('user.list', compact('data','user_count'));
        }else{
            return redirect('/home');
        }
    }

    public function search(Request $request){
        $search = $request->search;
        if(session()->get('role') == 0){
            $data = Users::where('id', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('birth_date', 'like', '%' . $search . '%')
            ->orWhere('role', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->orWhere('updated_at', 'like', '%' . $search . '%')
            ->orderBy('id','asc')->paginate(10);
            $user_count = Users::where('id', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->orWhere('birth_date', 'like', '%' . $search . '%')
            ->orWhere('role', 'like', '%' . $search . '%')
            ->orWhere('created_at', 'like', '%' . $search . '%')
            ->orWhere('updated_at', 'like', '%' . $search . '%')
            ->orderBy('id','asc')->count();
            return view('user.list', compact('data','user_count'));
        }else{
            return redirect('/home');
        }
    }

    public function create(){
        if(session()->get('role') == 0){
            $pages = "create";
            return view('user.create', compact('pages'));
        }else{
            return redirect('/home');
        }
    }

    public function createPost(Request $request){
        $input = $request->all();

        $validator = null;
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('photo')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = "files";
                $request->file('photo')->move($upload_path, $photo_name);
                $input['photo'] = $photo_name;
            }
        }

        $validator = Validator::make($input, [
            'username'  =>  'required|string|max:30|unique:users,username',
            'password' => 'required|string|max:30',
            'email' => 'required|max:30|unique:users,email',
            'name' => 'required|string|max:30',
            'birth_date' => 'required|date',
        ]);

        if($validator->fails()){
            return redirect('/admin/user/create')
                ->withInput()
                ->withErrors($validator);
        }

        $input['password'] = Hash::make($input['password']);
        $user = Users::create($input);

        return redirect('/admin/user');
    }

    public function edit($id){
        if(session()->get('role') == 0){
            $user = Users::findorFail($id);

            return view('user.edit', compact('user'));
        }else{
            return redirect('/home');
        }
    }

    public function update($id, Request $request){
        $user = Users::findOrFail($id);
        $input = $request->all();

        if($request->hasFile('photo')){
            $exist = Storage::disk('photo')->exists($car->photo);
            if(isset($car->photo) && $exist){
                $delete = Storage::disk('photo')->delete($car->photo);
            }

            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('photo')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = "files";
                $request->file('photo')->move($upload_path, $photo_name);
                $input['photo'] = $photo_name;
            }

            if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' ){
                $validator = Validator::make($input, [
                    'username'  =>  'required|string|max:30|unique:user,username,' . $request->input('id'),
                    'password' => 'required|string|max:30',
                    'email' => 'required|max:30|unique:user,email,' . $request->input('id'),
                    'name' => 'required|string|max:30',
                    'birth_date' => 'required|date',
                ]);
                if($validator->fails()){
                    return redirect('/admin/user/' . $id . '/edit')
                        ->withInput()
                        ->withErrors($validator);
                }
            }else{
                $validator = Validator::make($input, [
                    'username'  =>  'required|string|max:30|unique:user,username,' . $request->input('id'),
                    'password' => 'required|string|max:30',
                    'email' => 'required|max:30|unique:user,email,' . $request->input('id'),
                    'name' => 'required|string|max:30',
                    'birth_date' => 'required|date',
                    'photo' => 'sometimes|image|mimes:jpeg,bmp,png|max:500|dimensions:width=150,height:180'
                ]);
                if($validator->fails()){
                    return redirect('/admin/user/' . $id . '/edit')
                        ->withInput()
                        ->withErrors($validator);
                }
            }
        }



        $user->update($input);

        return redirect('/admin/user');
    }

    public function destroy($id){
        if(session()->get('role') == 0){
            $user = Users::findOrFail($id);

            $exist = Storage::disk('photo')->exists($user->photo);
            if(isset($user->photo) && $exist){
                $delete = Storage::disk('photo')->delete($user->photo);
            }

            $user->delete();
            return redirect('/admin/user');
        }else{
            return redirect('/home');
        }
    }


    public function redirecthome(){
        return redirect('/home');
    }
    public function home(){
        $latest_car = Car::orderBy('created_date','desc')->take(3)->get();
        $random_brand = Brand::orderBy('id','desc')->inRandomOrder()->take(3)->get();
        $fastest_car = Car::orderBy('top_speed','desc')->take(3)->get();

        return view('user.home', compact('latest_car','random_brand', 'fastest_car'));
    }
}
