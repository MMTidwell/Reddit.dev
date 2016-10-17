{{-- this blade is very specific in what it needs --}}
@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<form method="POST" action="{{ action('Auth\AuthController@postRegister') }}">
				{!! csrf_field() !!}
				<div class="form-group">
					@if ($errors->has('name'))
						<div class="alert alert-danger">
							{{ $errors->first('name') }}
						</div>
					@endif
					<label for="name">Name: </label>
					<input class="form-control" type="text" name="name" value="{{ old('name') }}">
				</div>
				<div class="form-group">
					@if ($errors->has('email'))
						<div class="alert alert-danger">
							{{ $errors->first('email') }}
						</div>
					@endif
					<label for="email">Email: </label>
					<input class="form-control" type="text" name="email" value="{{ old('email') }}">
				</div>
				<div class="form-group">
					@if ($errors->has('password'))
						<div class="alert alert-danger">
							{{ $errors->first('password') }}
						</div>
					@endif
					<label for="password">Password: </label>
					<input class="form-control" type="password" name="password">
				</div>
				<div class="form-group">
					@if ($errors->has('password_confirmation'))
						<div class="alert alert-danger">
							{{ $errors->first('password_confirmation') }}
						</div>
					@endif
					<label for="confirm_password">Confirm Password: </label>
					<input class="form-control" type="password" name="password_confirmation">
				</div>
				<div>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
			</form>
		</div>
	</div>
@stop