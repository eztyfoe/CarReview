@extends('template')

@section('main')
<div class="col-md-2">
</div>
<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Create</h4>
                  <p class="card-category">Complete your data</p>
                </div>
                <div class="card-body">
                {!!
                    Form::open(['url' => '/admin/car/create', 'files' => true])
                !!}
@include('car.form', ['submitButtonText' => 'Create'])
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
