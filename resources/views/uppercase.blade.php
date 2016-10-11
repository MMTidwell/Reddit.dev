{{-- kind of like a file path, this tells the program to use sections in the template --}}
@extends('layouts.master')

@section('content')
	<h1>You entered: <em> {{ $word }} </em></h1>
	<h1>Uppercase: <em> {{ strtoupper($word) }} </em></h1>
@stop