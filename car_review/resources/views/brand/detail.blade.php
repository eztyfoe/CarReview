@extends('template')

@section('main')

<div class="col-md-2">
</div>
@if (!empty($data))
<div class="col-md-8">
              <div class="card card-profile">
                <div class="card-avatar">
                @if(isset($data))
                    @if(isset($data->image))
                        <img  src="{{ asset('files/' . $data->image) }}">
                    @endif
                @endif
                </div>
                <div class="card-body">
                  <h2 class="card-title">{{ $data->name }}</h2>
                <hr>
                  <h6 class="card-category text-gray">{{ $data->origin }}</h6>
                  <p class="card-description">
                  Created in {{ $data->created_date->format('Y') }}'s
                  <br>
                  {{ $data->description }}
                  <br>
                  Total of {{ $car_count }} cars
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
@if (!empty($data_car))
                            @foreach($data_car as $datas)
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
        <p>No Car Data</p>
    @endif

    <div class="col-md-12">
                  <center>
                  <h3 class="card-title">Other Brands</h3>
</center>
<br>
</div>
@if (!empty($data_brand))
                            @foreach($data_brand as $datas)
<div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                @if(isset($datas))
                    @if(isset($datas->image))
                        <img  src="{{ asset('files/' . $datas->image) }}">
                    @endif
                @endif
                </div>
                <div class="card-body">
                  <h4 class="card-title">{{ $datas->name }}</h4>
                  <h6 class="card-category text-gray">{{ $datas->origin }}</h6>
                  <p class="card-description">
                  Created in {{ $datas->created_date->format('Y') }}'s
                  </p>
                <hr>
                  <a href="{{ url('/brand/'. $datas->id) }}" class="btn btn-primary btn-round">Detail</a>
                </div>
              </div>
</div>
              @endforeach
    @else
        <p>No Brand Data</p>
    @endif

    @else
        <p>No Brand Data</p>
    @endif

@stop

@section('footer')
        @include('footer')
@stop
