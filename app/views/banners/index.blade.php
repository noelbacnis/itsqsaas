@extends('default.client_navbar')

@section('content2')

<style type="text/css">
	form.dropzone { 
		height: auto;
		border: 2px dashed #89b8ff;
		border-radius: 10px; }
	.dz-clickable { 
		cursor: pointer;
		padding: 50px; }
	.dz-message { 
		font-family: roboto; }
</style>
<!-- 
=== COLOR PICKER PLUGIN CSS/JS -->
{{ HTML::style('assets/colorpicker/css/colorpicker.css'); }}
{{ HTML::script('assets/colorpicker/js/colorpicker.js'); }}

{{ HTML::style('assets/css/dropzone.css'); }}
{{ HTML::script('assets/js/dropzone.js'); }}


	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Banners </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Banners </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    @if ($errors->any())
		                <div class="alert alert-danger alert-dismissable" id="" style="">
		                    {{ implode('', $errors->all(':message <br>')) }}
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
							{{ Form::open(array('url' => 'uploadBanner' ,'class' => 'dropzone dz-clickable', 'id' => 'dropzone')); }}

							
							<button type="submit" id="submit" class="btn btn-success form-control">Submit Everything</button>
							
							{{ Form::close(); }}
						</div>
						
					</div>
				</div>
			</div>
		</div>



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