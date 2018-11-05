@if(Session::has('success'))<br>
<div class="container">
	<div class="error-messages" style="width: 60%;float: left;">
		<div class="alert alert-success" role="alert">
			<strong>Success! </strong> {{ Session::get('success') }}
		</div>
	</div>	
</div>
@endif

@if(count($errors) > 0)<br>
	<div class="container">
		<div class="error-messages" style="width: 60%;float: left;">
			<div class="alert alert-danger" role="alert">
				<strong>Error! </strong> {{ Session::get('success') }}<br> 
				@foreach($errors->all() as $error)
					{{ $error }}<br> 					
				@endforeach
			</div>
		</div>	
	</div>
@endif