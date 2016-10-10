@extends('layouts.master')

@section('content')
	<h1>You entered: {{ $word }}</h1>
	<h1>Uppercase: {{ strtoupper($word) }}</h1>
@stop