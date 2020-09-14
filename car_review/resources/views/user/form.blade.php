@if (isset($user))
    {!! Form::hidden('id', $user->id) !!}
@endif

{!! Form::hidden('role', '1') !!}

@if($errors->any())
    <div class="form-group {{ $errors->has('username') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('username', 'Username', ['class' => 'bmd-label-floating']) !!}
    {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username']) !!}
    @if ($errors->has('username'))
    <span class="help-block">{{ $errors->first('username') }}</span>
    @endif
</div>

@if(!isset($user))
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
    <div class="form-group {{ $errors->has('photo') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('photo', 'Click Here To Upload Photo!') !!}
    <br>
    {!! Form::file('photo', ['accept' => 'image/png, image/jpeg', 'onchange' => 'readURL(this)']) !!}
    @if ($errors->has('photo'))
    <span class="help-block">{{ $errors->first('photo') }}</span>
    @endif

    @if(isset($user))
        @if(isset($user->photo))
            <img id="preview" width="150" height="180" src="{{ asset('files/' . $user->photo) }}">
        @endif
    @else
    <img id="preview" width="150" height="180" src="" style="display: none;">
    @endif
</div>

@if($errors->any())
    <div class="form-group {{ $errors->has('birth_date') ?
    'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
@endif
    {!! Form::label('birth_date', 'Birth Date', ['class' => 'bmd-label-floating']) !!}
    {!! Form::date('birth_date', !empty($user) ? $user->birth_date->format('Y-m-d'): '2020-01-01', ['class' => 'form-control', 'id' => 'birth_date']) !!}
    @if ($errors->has('birth_date'))
    <span class="help-block">{{ $errors->first('birth_date') }}</span>
    @endif
</div>

</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
