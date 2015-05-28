
@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Edit a Product </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('products.index') }}">Products</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Edit a Product </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	    	<a href="{{ action('products.index') }}" class="btn btn-info col-md-12"> <i class="fa fa-caret-left"></i> Back</a>
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div>
	<!-- /.Heading Buttons -->

	<div class="row">
		<div class="col-md-12">
			
			<div class="panel panel-default">
		        <div class="panel-body" style="padding:50px 100px 15px 100px;">

		            @if ($errors->any())
		                <div class="alert alert-danger alert-dismissable" id="" style="">
		                    {{ implode('', $errors->all(':message <br>')) }}
		                </div>
		            @endif
					
					{{ Form::model($product, array('method' => 'PATCH','files' => true, 'class' => 'form-horizontal', 'route' => array('products.update', $product->id))) }}
		            <div class="col-md-4 well">
						<b>Change Product's Photo</b><br><br>
						<!-- form open -->
						    <div class="form-group">
								
					            <div class="col-sm-12">
					            	{{ HTML::image('uploads/'.$client_name.'/'.$product->image,'', array('width' => '100%')) }} 
						            {{ Form::file('image', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
						        </div>
						    </div>
					    <!-- form close -->
					</div>
					
		            <div class="col-md-8">
		                <div class="form-group">
		                    {{ Form::label('name', 'Product Name', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::text('name', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('description', 'Decription', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::textarea('description', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('price', 'Price', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::number('price', $value=null, array('class' => 'form-control' , 'placeholder' => '')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('category_id', 'Category', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::select('category_id', $categories, $product->category_id, array('class'=>'form-control')) }}
		                    </div>
		                </div>

		                <div class="form-group">
		                    {{ Form::label('status', 'Status', array('class' => 'col-sm-3 control-label')) }}
		                    <div class="col-sm-9">
		                        {{ Form::select('status', $status, $product->status, array('class'=>'form-control')) }}
		                    </div>
		                </div>

		            
		            </div>
		        </div>

		        <div class="panel-footer panel-footer-btn">
		            <div class="form-group">
		                    <div class="col-sm-offset-2 col-sm-10">
		                        {{ link_to_route('products.index', 'Cancel', $value=null, array('class' => 'btn btn-info pull-right col-xs-2', 'style' => 'margin:5px')) }}
		                        {{ Form::submit('Update', array('class' => 'btn btn-info pull-right col-xs-2', 'style' => 'margin:5px')) }}
		                    </div>
		            </div>
		        </div>
		        {{ Form::close() }}

		         
		    </div>
		 
		</div>
	</div>



@stop