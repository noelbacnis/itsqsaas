@extends('layouts.master')

@section('content')
{{ HTML::style('assets/css/default.css'); }}

<!-- 
=== COLOR PICKER PLUGIN CSS/JS -->
{{ HTML::style('assets/colorpicker/css/colorpicker.css'); }}
{{ HTML::script('assets/colorpicker/js/colorpicker.js'); }}

{{ HTML::style('assets/css/dropzone.css'); }}
{{ HTML::script('assets/js/dropzone.js'); }}

<div class="wrapper">
	<div class="wrapper-inner">
	{{ $navbar }}
		<div class="container">
		<div class="row">
			<h1 class="text-orange roboto">Subscription Form</h1>
		</div>
		<div class="row">
			<div class="col-lg-12 roboto" style="color: white; font-weight: 700;">
				<p>You are just a few steps away from having a fully functional website!</p>
				<p>We need you to provide us with the following information:</p>
			</div>
		</div>
		<br><br>

		@if ($errors->has())
		<div class="alert alert-danger alert-dismissible" role="alert">
			@foreach ($errors->all() as $err)
				<b>{{ $err }}</b>
				<br>
			@endforeach
		</div>
		@endif

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Starters</div>
					</div>
					<div class="panel-body">
						<div id="dropzone">

						<!--== DROPZONE FORM
							================================================== -->
							{{ Form::open(array('url' => 'uploadStarterBanner' ,'class' => 'dropzone dz-clickable', 'id' => 'dropzone')); }}

							
							{{ Form::close(); }}
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Basic Information</div>
					</div>
					<div class="panel-body">
					{{ Form::open(array('url' => 'subscribe/doFreeSubscribe', 'files' => true, 'id' => 'formm')) }}
						{{ Form::label('name', 'Restaurant Name'); }}
						{{ Form::text('name', '', array('class' => 'form-control')); }}
						<i>(Your restaurant name that will be displayed all through out the web)</i>
						<br><br>
						{{ Form::label('description', 'Description'); }}
						{{ Form::textarea('description', '', array('class' => 'form-control')); }}
						<i>(This will be displayed in your 'About' page)</i>
						<br><br>
						{{ Form::label('contact_number', 'Contact Number'); }}
						{{ Form::text('contact_number', '', array('class' => 'form-control')); }}
						<i>(Your customers can contact you through this number. Displayed in your 'Contact' page)</i>
						<br><br>
						{{ Form::label('address', 'Address'); }}
						{{ Form::text('address', '', array('class' => 'form-control')); }}
						<i>(This is your mailing address. Displayed in your 'Contact' page)</i>
					</div>
				</div>
			</div>
		
			<div class="col-lg-6">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">Website Information</div>
					</div>
					<div class="panel-body">
						{{ Form::label('image', 'Logo'); }}
						{{ Form::file('image'); }}
						<i>(Your restaurant logo that will be displayed all through out the web)</i>
						<br><br>
						{{ Form::label('tagline', 'Tag Line'); }}
						{{ Form::text('tagline', '', array('class' => 'form-control')); }}
						<i>(Something like "Create. Innovate. Repeat")</i>
						<br><br>
						<div id="color-div" class="color-div"></div>
						{{ Form::label('primary_color', 'Primary Color'); }}
						{{ Form::text('primary_color', '', array('class' => 'form-control')); }}
						<i>(The primary color of your company/restaurant)</i>
					</div>
					<div class="panel-footer">
						<button id="submit" type="submit" class="btn btn-success form-control">Subscribe</button>
					</div>
				</div>
				{{ Form::close(); }}
			
				
			</div> <!-- col-lg-6 -->
		</div><!-- row -->

		
	</div>
	</div> <!-- wrapper inner -- >
</div> <!-- wrapper -->

<script type="text/javascript">
		$(document).ready(function(){
			$('#primary_color').ColorPicker({

				onShow: function (colpkr) {
					$(colpkr).fadeIn(200);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(200);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$('#color-div').css('backgroundColor', '#' + hex);
					$('#primary_color').val(hex);
				}

			});
			
		});

		Dropzone.options.dropzone = {

			autoProcessQueue : false,
			parallelUploads : 5,

			dictDefaultMessage : "<h2>Drag and drop images here for your banner.</h2><br>You can also click here to select your files.",
			paramName : 'banners',
			addRemoveLinks : true,
			init : function() {
				
				var submitButton = document.querySelector('#submit');
					dropzone = this;

				submitButton.addEventListener('click', function(){
					dropzone.processQueue();
				});
			}
			
		}
	</script>

@stop