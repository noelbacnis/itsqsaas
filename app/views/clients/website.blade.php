@extends('layouts.master')



@section('content')

{{ HTML::style('assets/css/default.css'); }}



	<div class="wrapper">
		<div class="wrapper-inner first">
		{{ $navbar }}
			<div class="center">
				<h1>Client's Website</h1>
				<hr>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner second">
			<div class="container">
			<br><br>
				
				<br><br>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner third">
			<div class="container">
			<br><br>
				

				<br><br>
			</div>
		</div>
	</div>

	<div class="wrapper">
		<div class="wrapper-inner">
			<h1>Contact Us</h1>
		</div>
	</div>
@stop