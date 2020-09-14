@extends('template')

@section('main')

<div class="col-md-2">
</div>
@if (!empty($data))
<div class="col-md-8">
              <div class="card card-profile">
                <div class="card-avatar">
                @if(isset($data))
                    @if(isset($data->brand->image))
                        <img  src="{{ asset('files/' . $data->brand->image) }}">
                    @endif
                @endif
                </div>
                <div class="card-body">
                @if(isset($data))
                    @if(isset($data->image))
                        <img width="100%" src="{{ asset('files/' . $data->image) }}">
                    @endif
                @endif
                  <h2 class="card-title">{{ $data->name }}</h2>
                <hr>
                  <h4 class="card-category text-gray">{{ $data->brand->origin }}</h4>
                  <p class="card-description">
                  Created in {{ $data->created_date->format('Y') }}'s
                  <br>
                  {{ $data->description }}
                  <br>
                <hr>
                <div class="col-md-12">
                <table width="100%">
                    <tr>
<td>

<h3 class="card-title">TOP SPEED</h3>
<h3 class="card-title">{{ $data->top_speed }} km/h</h3>
<td>
<h3 class="card-title">TORQUE</h3>
                <h3 class="card-title">{{ $data->torque }} nm</h3>
<td>
<h3 class="card-title">HORSE POWER</h3>
<h3 class="card-title">{{ $data->horse_power }} hp</h3>
                    </tr>
                </table>
                </div>
                  </p>
                </div>
              </div>
            </div>
<div class="col-md-2">
</div>

<div class="col-md-12">
                  <center>
                  <h3 class="card-title">Other {{ $data->brand->name }}'s Cars</h3>
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
                <hr>
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

    <div class="col-md-2">
    </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Reviews:</span>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                    @if (!empty($data_review) && count($data_review) > 0)
                      <table class="table">
                        <tbody>
                        @foreach($data_review as $datas)
                          <tr>
                            <td width="95%">{{ $datas->users->username }} :
                            <br>
                            {{ $datas->review }}</td>
                            @if(session()->get('id') == $datas->users->id)
                            <td class="td-actions text-right">
                            <div class="box-button">
                                    {{ link_to('/car/' . $data->id . '/' . $datas->id . '/edit', 'Edit', ['class' => 'btn btn-primary btn-link btn-sm', 'rel' => 'tooltip']) }}
                                    </div>
                                    <div class="box-button">
                                    {!!
                                        Form::open(['method' => 'DELETE', 'action' => ['ReviewController@destroyReview', $datas->id]])
                                    !!}
                                    {!!
                                        Form::submit('Delete', ['class' => 'btn btn-danger btn-link btn-sm', 'rel' => 'tooltip'])
                                    !!}
                                    {!!
                                        Form::close()
                                    !!}
                                    </div>
                            </td>
                            @endif
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    @else
                        <p>No Review Yet</p>
                    @endif

                    @if(session()->has('id'))
                    @if ($action == 'create')
                    {!!
                        Form::open(['url' => '/car/create'])
                    !!}
                    @else
                    {!!
                        Form::model($review, ['method' => 'PATCH', 'action' => ['ReviewController@updateReview', $review->id]])
                    !!}
                    @endif

                    @if (isset($review))
                        {!! Form::hidden('id', $review->id) !!}
                    @endif

                    @if($errors->any())
                        <div class="form-group {{ $errors->has('id_user') ?
                        'has-error' : 'has-success' }}">
                        @else
                        <div class="form-group">
                    @endif
                        {!! Form::hidden('id_user', session()->get('id') , ['class' => 'form-control', 'id' => 'id_user']) !!}
                        @if ($errors->has('id_user'))
                        <span class="help-block">{{ $errors->first('id_user') }}</span>
                        @endif
                    </div>

                    @if($errors->any())
                        <div class="form-group {{ $errors->has('id_car') ?
                        'has-error' : 'has-success' }}">
                        @else
                        <div class="form-group">
                    @endif
                        {!! Form::hidden('id_car', $data->id, ['class' => 'form-control', 'id' => 'id_car']) !!}
                        @if ($errors->has('id_car'))
                        <span class="help-block">{{ $errors->first('id_car') }}</span>
                        @endif
                    </div>

                    @if($errors->any())
                        <div class="form-group {{ $errors->has('review') ?
                        'has-error' : 'has-success' }}">
                        @else
                        <div class="form-group">
                    @endif
                        {!! Form::label('review', 'Review', ['class' => 'bmd-label-floating']) !!}
                        {!! Form::textarea('review', null, ['class' => 'form-control', 'id' => 'review']) !!}
                        @if ($errors->has('review'))
                        <span class="help-block">{{ $errors->first('review') }}</span>
                        @endif
                    </div>

                    </div>

                    <div class="form-group">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                    </div>

                    {!!
                        Form::close()
                    !!}
                    @else
                        You must <a href="{{ url('/login') }}">Log In</a> first to write a review!
                    @endif

                    </div>
                  </div>
                </div>
              </div>
            </div>


    @else
        <p>No Car Data</p>
    @endif
    <div class="col-md-2">
    </div>

@stop

@section('footer')
        @include('footer')
@stop
