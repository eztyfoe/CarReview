@extends('template')

@section('main')
<div class="col-md-2">
</div>
<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit</h4>
                  <p class="card-category">Edit your data</p>
                </div>
                <div class="card-body">

    {!!
        Form::model($review, ['method' => 'PATCH', 'action' => ['ReviewController@update', $review->id]])
    !!}
@include('review.form', ['submitButtonText' => 'Update'])
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
