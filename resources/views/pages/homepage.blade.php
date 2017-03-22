@extends('template')

@section('main')
<div id="homepage">
		<h2>Homepage</h2>
		
		<p > <blockquote > <h5>Sistem Informasi Kontrol Terhadap Peralatan Komputer ini dibuat untuk memenuhi tugas mata kuliah di semester 7 ( tujuh )</h5> </blockquote> </p>
	</div>
<img src="{{ asset('assets/images/home.jpg') }}">
@stop	

@section('footer')
	@include('footer')
@stop

