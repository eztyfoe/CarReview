@if (isset($review))
    {!! Form::hidden('id', $review->id) !!}
@endif

@if($errors->any())
    <div class="form-group {{ $errors->has('id_user') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('id_user', 'Username', ['class' => 'control-label']) !!}
    @if(count($user_list) > 0)
        {!!
            Form::select(
                'id_user', $user_list, null,
                ['class' => 'form-control', 'id' => 'id_user', 'placeholder' => 'Choose User'])
        !!}
    @else
        <p>No User Data!</p>
    @endif
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
    {!! Form::label('id_car', 'Brand:', ['class' => 'control-label']) !!}
    @if(count($car_list) > 0)
        {!!
            Form::select(
                'id_car', $car_list, null,
                ['class' => 'form-control', 'id' => 'id_car', 'placeholder' => 'Choose Brand'])
        !!}
    @else
        <p>No Brand Data!</p>
    @endif
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
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
