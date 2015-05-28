@extends('default.client_navbar')

@section('content2')


<div class="row">
       	<div class="col-lg-12">
            <h1 class="page-header"> Your Restaurant </h1>
            <ol class="breadcrumb">
                <li> <i class="fa fa-dashboard"></i>  <a href="{{ action('client_dashboard') }}">Dashboard</a> </li>
               	<li class="active"> <i class="fa fa-table"></i> Client </li>
            </ol>
        </div>
    </div>



<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Basic Information</div>
					</div>
					<div class="panel-body">
					{{ Form::model($client, array('method' => 'PATCH', 'files' => true, 'class' => 'form-horizontal', 'route' => array('clients.update', $client->id))) }}
						{{ Form::label('name', 'Restaurant Name'); }}
						{{ Form::text('name', $value=null, array('class' => 'form-control')); }}
						<i>(Your restaurant name that will be displayed all through out the web)</i>
						<br><br>
						{{ Form::label('description', 'Description'); }}
						{{ Form::textarea('description', $value=null, array('class' => 'form-control')); }}
						<i>(This will be displayed in your 'About' page)</i>
						<br><br>
						{{ Form::label('contact_number', 'Contact Number'); }}
						{{ Form::text('contact_number', $value=null, array('class' => 'form-control')); }}
						<i>(Your customers can contact you through this number. Displayed in your 'Contact' page)</i>
						<br><br>
						{{ Form::label('address', 'Address'); }}
						{{ Form::text('address', $value=null, array('class' => 'form-control')); }}
						<i>(This is your mailing address. Displayed in your 'Contact' page)</i>
						<br><br>
						{{ Form::label('domain', 'Domain'); }}
						{{ Form::text('domain', $value=null, array('class' => 'form-control')); }}
						<i>(This is your domain name. Your site will be available at www.domainname.com)</i>
						<br><br>
						{{ Form::label('email', 'Contact E-mail'); }}
						{{ Form::email('email', $value=null, array('class' => 'form-control')); }}
						<i>(Details of your subscription will be sent to this e-mail)</i>
					</div>
				</div>
			</div>
		
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Website Information</div>
					</div>
					<div class="panel-body">
						{{ Form::label('image', 'Logo'); }}
						{{ Form::file('image'); }}
						<i>(Your restaurant logo that will be displayed all through out the web)</i>
						<br><br>
						{{ Form::label('tagline', 'Tag Line'); }}
						{{ Form::text('tagline', $value=null, array('class' => 'form-control')); }}
						<i>(Something like "Create. Innovate. Repeat")</i>
						<br><br>
						<div id="color-div" class="color-div"></div>
						{{ Form::label('primary_color', 'Primary Color'); }}
						{{ Form::text('primary_color', $value=null, array('class' => 'form-control')); }}
						<i>(The primary color of your company/restaurant)</i>
						

					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Featured Product</div>
					</div>
					<div class="panel-body">
						{{ Form::label('product_image', 'Featured Product'); }}
						{{ Form::file('product_image'); }}
						<i>(Your best product that you want to emphasize on your site. Dimensions should fit your screen)</i>
						<br><br>
						{{ Form::label('product_name', 'Product Name'); }}
						{{ Form::text('product_name', $value=null, array('class' => 'form-control')); }}
						<br>
						{{ Form::label('product_description', 'Product Description'); }}
						{{ Form::text('product_description', $value=null, array('class' => 'form-control')); }}
						<br>
						{{ Form::label('product_price', 'Product Price'); }}
						{{ Form::number('product_price', $value=null, array('class' => 'form-control')); }}
					</div>
					<div class="panel-footer">
						<button type="submit" id="submit" class="btn btn-success form-control">Submit Everything</button>
					</div>
				</div>
				{{ Form::close(); }}






@stop