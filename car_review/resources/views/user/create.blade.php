@extends('template')

@section('main')

<?php
            if($pages == 'register'){
                ?>
<div class="col-md-4">
</div>
<div class="col-md-4">
<center>
<img src="{{ asset('/img/logo.png') }}">
</center>
</div>
<div class="col-md-4">
</div>
<?php
            }
                ?>

<div class="col-md-2">
</div>
<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">

<?php
            if($pages !== 'register'){
                ?>
<h4 class="card-title">Create</h4>
                <?php
            }else{
    ?>
<h4 class="card-title">Register</h4>
    <?php
            }
    ?>

                  <p class="card-category">Complete your data</p>
                </div>
                <div class="card-body">

<?php
            if($pages == 'register'){
                ?>
                {!!
                    Form::open(['url' => 'register', 'files' => 'true'])
                !!}
    <?php
            }else{
    ?>
    {!!
        Form::open(['url' => 'admin/user/create', 'files' => true])
    !!}
    <?php
            }
    ?>
@include('user.form', ['submitButtonText' => 'Submit'])
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
