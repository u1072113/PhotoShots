@extends('app')

@section('content')
<div class="container">
	<div class="page-wrap">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">

				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> Something fails.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
					<div class="panel-heading">Home</div>


					<div class="panel-body">
						Welcome to PhotoShots, please <a class="blue-link" href="/auth/login">login</a> or <a class="blue-link" href="/auth/register">create</a> an account with us.
					</div>
				</div>
			</div>
		</div>
		<h1 class="stats-header">Statistics of latest albums</h1> 
		<div id="stats-container" style="height: 250px;"></div>

		<script>

		  // Fire off an AJAX request to load the data
		  $.ajax({
		      type: "GET",
		      dataType: 'json',
		      url: "get-stats", // This is the URL to the API
		      // data: { days: 7 } // Passing a parameter to the API to specify number of days
		    })
		    .done(function( data ) {
		    	console.log(data);
		      // When the response to the AJAX request comes back render the chart with new data
		      chart.setData(data);
		    })
		    .fail(function() {
		      // If there is no communication between the server, show an error
		      alert( "error occured" );
		    });


		 var chart = Morris.Bar({
		    // ID of the element in which to draw the chart.
		    element: 'stats-container',
		    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
		    xkey: 'date', // Set the key for X-axis
		    ykeys: ['value'], // Set the key for Y-axis
		    labels: ['Albums'] // Set the label when bar is rolled over
		  });

		  // Request initial data for the past 7 days:
		  requestData(7, chart);

		  $('ul.ranges a').click(function(e){
		    e.preventDefault();

		    // Get the number of days from the data attribute
		    var el = $(this);
		    days = el.attr('data-range');

		    // Request the data and render the chart using our handy function
		    requestData(days, chart);
		  })

		</script>
	</div>
</div>

@endsection