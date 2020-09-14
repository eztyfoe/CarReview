@extends('template')

@section('main')

<div class="col-md-4">
</div>
<div class="col-md-4">
<center>
<img src="{{ asset('/img/logo.png') }}">
</center>
</div>
<div class="col-md-4">
</div>

<div class="col-md-2">
</div>
<div class="col-md-8">
              <div class="card card-profile">
                <div class="card-body">
                  <h2 class="card-title">Car-Review</h2>
                <hr>
                  <p class="card-description">
                  Car Review, presented to car lovers. Among the many choices and variety of cars, we understand your need for detailed information about selected cars. For that we provide a comparative reference about the ins and outs of cars.

                    Not only comparative information about cars, but also review about car itself. Not only that, we give you information about the top speed, torque, and horspower. And information about the manufacture/brand that makes the car.

                    Happy surfing on our site. Whatever car of your choice, be sure to look at the reviews first in Car Review.
                  </p>
                </div>
              </div>
            </div>
<div class="col-md-2">
</div>


<div class="col-md-12">
                  <center>
                  <h3 class="card-title">Latest Cars</h3>
</center>
</div>
@if (!empty($latest_car))
                            @foreach($latest_car as $datas)
<div class="col-md-4">
              <div class="card card-profile">
                  <center>
                @if(isset($datas))
                    @if(isset($datas->image))
                        <img width="400px" height="300px" src="{{ asset('files/' . $datas->image) }}">
                    @endif
                @endif
</center>
                <div class="card-body">
                  <h4 class="card-title">{{ $datas->name }}</h4>
                  <h6 class="card-category text-gray">{{ $datas->origin }}</h6>
                  <p class="card-description">
                  Created in {{ $datas->created_date->format('Y') }}'s
                  </p>
                <hr>
                  <a href="{{ url('/car/'. $datas->id) }}" class="btn btn-primary btn-round">Detail</a>
                </div>
              </div>
</div>
              @endforeach
    @else
              <div class="card card-profile">
        <p>No Car Data</p>
              </div>
    @endif


<div class="col-md-12">
                  <center>
                  <h3 class="card-title">Fastest Cars</h3>
</center>
</div>
@if (!empty($fastest_car))
                            @foreach($fastest_car as $datas)
<div class="col-md-4">
              <div class="card card-profile">
                  <center>
                @if(isset($datas))
                    @if(isset($datas->image))
                        <img width="400px" height="300px" src="{{ asset('files/' . $datas->image) }}">
                    @endif
                @endif
</center>
                <div class="card-body">
                  <h4 class="card-title">{{ $datas->name }}</h4>
                  <h6 class="card-category text-gray">{{ $datas->origin }}</h6>
                  <p class="card-description">
                  Created in {{ $datas->created_date->format('Y') }}'s
                  </p>
                <hr>
                  <a href="{{ url('/car/'. $datas->id) }}" class="btn btn-primary btn-round">Detail</a>
                </div>
              </div>
</div>
              @endforeach
    @else
              <div class="card card-profile">
        <p>No Car Data</p>
              </div>
    @endif


    <div class="col-md-12">
                  <center>
                  <h3 class="card-title">Brands</h3>
</center>
</div>
@if (!empty($random_brand))
                            @foreach($random_brand as $datas)
<div class="col-md-4">
              <div class="card card-profile">
                  <center>
                @if(isset($datas))
                    @if(isset($datas->image))
                        <img width="400px" height="300px" src="{{ asset('files/' . $datas->image) }}">
                    @endif
                @endif
</center>
                <div class="card-body">
                  <h4 class="card-title">{{ $datas->name }}</h4>
                  <h6 class="card-category text-gray">{{ $datas->origin }}</h6>
                  <p class="card-description">
                  Created in {{ $datas->created_date->format('Y') }}'s
                  </p>
                <hr>
                  <a href="{{ url('/car/'. $datas->id) }}" class="btn btn-primary btn-round">Detail</a>
                </div>
              </div>
</div>
              @endforeach
    @else
              <div class="card card-profile">
        <p>No Car Data</p>
              </div>
    @endif

@stop

@section('footer')
        @include('footer')
@stop
