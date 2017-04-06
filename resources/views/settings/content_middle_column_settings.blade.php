<div class="col m7">
    <div class="container card-2 white round margin"><br>
        <h4>Settings</h4><br>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('settings') }}" enctype="multipart/form-data">
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
                {!! Form::label('birthday', 'Birthday:', ['class' => 'col-md-4 control-label']) !!}

                <div class="col-md-6">
                    {!! Form::date('birthday', old('birthday'), ['class' => 'form-control']) !!}
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

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                {!! Form::label('city_id', 'City:', ['class' => 'col-md-4 control-label']) !!}

                <div class="col-md-6">
                    {!! Form::text('city_id', old('city'), ['class' => 'form-control', 'placeholder' => 'Enter your city', 'autofocus' => 'autofocus']) !!}

                    @if ($errors->has('city'))
                        <span class="help-block">
                            <strong>{{ $errors->first('city') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                {!! Form::label('phone', 'Phone:', ['class' => 'col-md-4 control-label']) !!}

                <div class="col-md-6">
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => 'Enter your phone', 'autofocus' => 'autofocus']) !!}

                    @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('avatar', 'Avatar:', ['class' => 'col-xs-2 control-label']) !!}
                <div class="col-xs-8">
                    {!! Form::file('avatar', ['class' => 'filestyle', 'data-buttonText' => 'Выберите изображение', 'data-buttonName' => 'btn-primary', 'data-placeholder' => 'Файла нет']) !!}
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    {!! Form::button('Change', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                </div>
            </div>
        </form>
    </div>
</div>