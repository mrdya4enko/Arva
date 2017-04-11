@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            {!! Form::label('first_name', 'First Name:', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => 'Enter the first name', 'autofocus' => 'autofocus']) !!}

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            {!! Form::label('last_name', 'Last Name:', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => 'Enter the last name', 'autofocus' => 'autofocus']) !!}

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email', 'E-Mail Address:', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Enter the e-mail address',]) !!}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {!! Form::label('password', 'Password:', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter the password',]) !!}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Enter the password']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Gender:', ['class' => 'col-md-4 control-label']) !!}

                            <div class="col-md-6">
                                {!! Form::select('gender', [
                                    'male' => 'male',
                                    'female' => 'female',
                                ], 'male', [
                                    'class' => 'form-control',
                                    'required' => 'required'
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::button('Register', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
