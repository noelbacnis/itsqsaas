@extends('default.client_navbar')

@section('content2')

	<!-- Page Heading -->
    <div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Categories </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Categories </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

	<!-- Heading Buttons -->
	<div class="row bottom-padding">
	    <div class="col-md-2">
	        {{ link_to_route('categories.create', 'Add a Category', $value=null, array('class' => 'btn btn-info col-md-12', 'style' => 'margin-right:5px')) }}
	        <br>
	    </div>
	    <div class="col-md-10"></div>
	</div>
	<!-- /.Heading Buttons -->

	<div class="row">
	    <div class="col-md-12">
	    	@if (Session::has('flash_notice'))
		        <div class="alert alert-danger" id="msg" style="">{{ Session::get('flash_notice') }}</div>
		    @endif
		    
	        @if ($categories->count())
	            <table class="table table-striped table-bordered">
	                <thead>
	                    <tr>
	                        <th>Category Name</th>
	                        <th>Action</th>
	                    </tr>
	                </thead>
	                <tbody>
	                    @foreach ($categories as $category)
	                        <tr>
	                            <td class="col-md-5">{{ $category->name }}</td>
	                            <td class="col-md-2">
	                                {{ link_to_route('categories.edit', 'Edit', array($category->id), array('class' => 'btn btn-info col-md-5', 'style' => 'margin-right:5px')) }}
	                                @if ($category->products->count() == 0)
	                                	{{ Form::open(array('method'=> 'DELETE', 'route' => array('categories.destroy', $category->id))) }}    
	                                		{{ Form::submit('Delete', array('class'=> 'btn btn-danger col-md-5')) }}
		                                {{ Form::close() }}
		                            @elseif ($category->products->count() > 0)                      
		                                {{ Form::submit('Delete', array('class'=> 'btn btn-danger col-md-5', 'style' => '', 'disabled')) }}
	                                @endif
	                                
	                            </td>
	                        </tr>
	                    @endforeach
	                </tbody>
	            </table>

	            <div class="pull-right">
	                {{ $categories->links(); }}
	            </div>
	            
	        @else
	            There are no Categories
	        @endif
	    </div>
	</div>



@stop