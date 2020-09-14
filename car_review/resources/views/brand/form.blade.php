@if (isset($brand))
    {!! Form::hidden('id', $brand->id) !!}
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
    <div class="form-group {{ $errors->has('origin') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('origin', 'Origin', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('origin', null, ['class' => 'form-control', 'id' => 'origin']) !!}
    @if ($errors->has('origin'))
    <span class="help-block">{{ $errors->first('origin') }}</span>
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

    @if(isset($brand))
        @if(isset($brand->image))
            <img id="preview" width="400" height="300" src="{{ asset('files/' . $brand->image) }}">
        @endif
    @else
    <img id="preview" width="400" height="300" src="" style="display: none;">
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
    {!! Form::date('created_date', !empty($brand) ? $brand->created_date->format('Y-m-d'): '2020-01-01', ['class' => 'form-control', 'id' => 'created_date']) !!}
    @if ($errors->has('created_date'))
    <span class="help-block">{{ $errors->first('created_date') }}</span>
    @endif
</div>

</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
