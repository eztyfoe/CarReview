<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Car;
use App\Review;
use App\Brand;
use Validator;

class ReviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => [
            'reviewPost', 'updateReview', 'editReview', 'destroyReview'
        ]]);
    }

    public function index(){
        if(session()->get('role') == 0){
            $data = Review::orderBy('id','asc')->paginate(10);
            $review_count = Review::count();
            return view('review.index', compact('data','review_count'));
        }else{
            return redirect('/home');
        }
    }

    public function search(Request $request){
        $search = $request->search;
        if(session()->get('role') == 0){
            $data = Review::select('review.*')
            ->where('review.id', 'like', '%' . $search . '%')
            ->orWhere('users.username', 'like', '%' . $search . '%')
            ->orWhere('car.name', 'like', '%' . $search . '%')
            ->orWhere('review.created_at', 'like', '%' . $search . '%')
            ->orWhere('review.updated_at', 'like', '%' . $search . '%')
            ->join('users', 'users.id', '=', 'review.id_user')
            ->join('car', 'car.id', '=', 'review.id_car')
            ->orderBy('review.id','asc')->paginate(10);
            $review_count = Review::where('review.id', 'like', '%' . $search . '%')
            ->orWhere('users.username', 'like', '%' . $search . '%')
            ->orWhere('car.name', 'like', '%' . $search . '%')
            ->orWhere('review.created_at', 'like', '%' . $search . '%')
            ->orWhere('review.updated_at', 'like', '%' . $search . '%')
            ->join('users', 'users.id', '=', 'review.id_user')
            ->join('car', 'car.id', '=', 'review.id_car')
            ->count();
            return view('review.index', compact('data','review_count','search'));
        }else{
            return redirect('/home');
        }
    }

    public function create(){
        if(session()->get('role') == 0){
            $pages = "create";
            $car_list= Car::pluck('name','id');
            $user_list= Users::pluck('username','id');
            return view('review.create', compact('pages','car_list','user_list'));
        }else{
            return redirect('/home');
        }
    }

    public function createPost(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_user' => 'required',
            'id_car'  =>  'required',
            'review'  =>  'required|max:1000',
        ]);

        if($validator->fails()){
            return redirect('/admin/review/create')
                ->withInput()
                ->withErrors($validator);
        }

        $review = Review::create($input);

        return redirect('/admin/review');
    }

    public function edit($id){
        if(session()->get('role') == 0){
            $review = Review::findorFail($id);
            $car_list= Car::pluck('name','id');
            $user_list= Users::pluck('username','id');

            return view('review.edit', compact('review','car_list','user_list'));
        }else{
            return redirect('/home');
        }
    }

    public function update($id, Request $request){
        $review = Review::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_user' => 'required',
            'id_car'  =>  'required',
            'review'  =>  'required|max:1000',
        ]);

        if($validator->fails()){
            return redirect('/admin/review/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $review->update($request->all());

        return redirect('/admin/review');
    }

    public function destroy($id){
        if(session()->get('role') == 0){
            $review = Review::findOrFail($id);
            $review->delete();
            return redirect('/admin/review');
        }else{
            return redirect('/home');
        }
    }

    public function reviewPost(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_user' => 'required',
            'id_car'  =>  'required',
            'review'  =>  'required|max:1000',
        ]);

        if($validator->fails()){
            return redirect('/admin/review/create')
                ->withInput()
                ->withErrors($validator);
        }

        $review = Review::create($input);

        return redirect('/car/'.$request->id_car);
    }


    public function updateReview($id, Request $request){
        $review = Review::findOrFail($id);
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_user' => 'required',
            'id_car'  =>  'required',
            'review'  =>  'required|max:1000',
        ]);

        if($validator->fails()){
            return redirect('/admin/review/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }

        $review->update($request->all());

        return redirect('/car/'.$request->id_car);
    }

    public function editReview($id_car, $id_review){
        $data = Car::findOrFail($id_car);
        $data_car = Car::where('id_brand',$data->id_brand)->where('id', '!=',$data->id)->inRandomOrder()->take(3)->get();
        $data_brand = Brand::where('id', '!=', $data->id_brand)->inRandomOrder()->take(3)->get();
        $data_review = Review::where('id_car', $id_car)->orderBy('created_at','asc')->get();

        $review = Review::findorFail($id_review);
        $action = 'update';
        return view('car.detail', compact('data', 'data_car', 'data_brand', 'data_review','review','action'));
    }


    public function destroyReview($id){
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect('/car/'.$review->id_car);
    }
}
