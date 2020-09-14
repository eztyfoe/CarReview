@extends('template')

@section('main')
<div class="col-md-4">
</div>
<div class="col-md-4">
<center>
<a href="{{ url('/home') }}">
<img src="{{ asset('/img/logo.png') }}">
</a>
</center>
</div>
<div class="col-md-4">
</div>

<div class="col-md-2">
</div>
<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Login</h4>
                  <p class="card-category">Enter your Username and Password</p>

                @if($errors->any())
                <p class="card-category"><strong>{{ $errors->first() }}</strong></p>
                @endif
                </div>
                <div class="card-body">

{!!
    Form::open(['url' => '/login'])
!!}

@if($errors->any())
    <div class="form-group {{ $errors->has('email') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('email', 'Email', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    @if ($errors->has('email'))
    <span class="help-block">{{ $errors->first('email') }}</span>
    @endif
</div>

@if($errors->any())
    <div class="form-group {{ $errors->has('password') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('password', 'Password', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('password', null, ['class' => 'form-control key', 'id' => 'password', 'autocomplete' => 'off']) !!}
    @if ($errors->has('password'))
    <span class="help-block">{{ $errors->first('password') }}</span>
    @endif
</div>


</div>


<div class="form-group">
    {!! Form::submit('Login', ['class' => 'btn btn-primary form-control']) !!}
</div>
<div class="form-group">
Don't have account? Click <a href="{{ url('/register') }}">HERE</a> to register.
</div>


{!!
    Form::close()
!!}
</div>
</div>
</div>
<div class="col-md-2">
</div>
@stop

@section('footer')
        @include('footer')
@stop
