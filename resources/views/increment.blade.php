@extends('layouts.master')

@section('content')
	<h1>You entered: {{ $num }} </h1>
	<h1>Your new number: {{ ++$num }}</h1>
@stop
