@if (isset($car))
    {!! Form::hidden('id', $car->id) !!}
@endif


@if($errors->any())
    <div class="form-group {{ $errors->has('name') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('name', 'Name', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    @if ($errors->has('name'))
    <span class="help-block">{{ $errors->first('name') }}</span>
    @endif
</div>

@if($errors->any())
    <div class="form-group {{ $errors->has('id_brand') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('id_brand', 'Brand:', ['class' => 'control-label']) !!}
    @if(count($brand_list) > 0)
        {!!
            Form::select(
                'id_brand', $brand_list, null,
                ['class' => 'form-control', 'id' => 'id_brand', 'placeholder' => 'Choose Brand'])
        !!}
    @else
        <p>No Brand Data!</p>
    @endif
    @if ($errors->has('id_brand'))
    <span class="help-block">{{ $errors->first('id_brand') }}</span>
    @endif
</div>


@if($errors->any())
    <div class="form-group {{ $errors->has('top_speed') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('top_speed', 'Top Speed', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('top_speed', null, ['class' => 'form-control', 'id' => 'top_speed']) !!}
    @if ($errors->has('top_speed'))
    <span class="help-block">{{ $errors->first('top_speed') }}</span>
    @endif
</div>


@if($errors->any())
    <div class="form-group {{ $errors->has('horse_power') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('horse_power', 'Horse Power', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('horse_power', null, ['class' => 'form-control', 'id' => 'horse_power']) !!}
    @if ($errors->has('horse_power'))
    <span class="help-block">{{ $errors->first('horse_power') }}</span>
    @endif
</div>


@if($errors->any())
    <div class="form-group {{ $errors->has('torque') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('torque', 'Torque', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('torque', null, ['class' => 'form-control', 'id' => 'torque']) !!}
    @if ($errors->has('torque'))
    <span class="help-block">{{ $errors->first('torque') }}</span>
    @endif
</div>

@if($errors->any())
    <div class="form-group {{ $errors->has('image') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('image', 'Click Here To Upload image!') !!}
    <br>
    {!! Form::file('image', ['accept' => 'image/png, image/jpeg', 'onchange' => 'readURL(this)']) !!}
    @if ($errors->has('image'))
    <span class="help-block">{{ $errors->first('image') }}</span>
    @endif

    @if(isset($car))
        @if(isset($car->image))
            <img id="preview" width="800" height="600" src="{{ asset('files/' . $car->image) }}">
        @endif
    @else
    <img id="preview" width="800" height="600" src="" style="display: none;">
    @endif
</div>

@if($errors->any())
    <div class="form-group {{ $errors->has('description') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('description', 'Description', ['class' => 'bmd-label-floating']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) !!}
    @if ($errors->has('description'))
    <span class="help-block">{{ $errors->first('description') }}</span>
    @endif
</div>

@if($errors->any())
    <div class="form-group {{ $errors->has('created_date') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('created_date', 'Created Date', ['class' => 'bmd-label-floating']) !!}
    {!! Form::date('created_date', !empty($car) ? $car->created_date->format('Y-m-d'): '2020-01-01', ['class' => 'form-control', 'id' => 'created_date']) !!}
    @if ($errors->has('created_date'))
    <span class="help-block">{{ $errors->first('created_date') }}</span>
    @endif
</div>

</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
