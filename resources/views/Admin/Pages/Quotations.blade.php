<!DOCTYPE html>
<html lang="en">

<head>
	@include('Admin/Partials/Head', ['page_title' => 'Moment Muse | Admin Contacts'])
</head>
<style>

</style>

<body>
	<div class="wrapper">
  
	  <!-- SideBar -->
	  @include('Admin/Partials/Sidebar')
  
	  <div class="main">
  
		<!-- Navbar -->
		@include('Admin/Partials/Navbar')

			
			<main class="content">
				<div class="container-fluid p-0">

					<div class="row border-bottom">
						<!-- Loop -->
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
							  <div class="card-header d-flex justify-content-between">
								<h5 class="card-title mb-0">Contacts</h5>
							  </div>
							  <table class="table table-hover my-0">
								<thead>
								  <tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Address</th>
									<th>Service</th>
									<th>Event Date</th>
									<th>Message</th>
									<th>Sent Date</th>
								  </tr>
								</thead>
								<tbody>
									@if(count($quotations) > 0)
									@foreach($quotations as $quotation)
									<tr>
									  <td class="text-capitalize">{{$quotation->name}}</td>
									  <td>{{$quotation->email}}</td>
									  <td>{{$quotation->phone}}</td>
									  <td>{{$quotation->address}}</td>
									  <td>{{$quotation->service->title}}</td>
									  <td>{{$quotation->event_date}}</td>
									  <td>{{$quotation->message}}</td>
									  <td>{{ strtolower($quotation->created_at->format('d-F-Y')) }}</td>
									</tr>
									@endforeach
									@else
									<div class="col-md-12 mb-4" data-aos="fade-up">
										<h3 class="text-center">No Contacts</h3>
									</div>
									@endif
								</tbody>
							  </table>
							</div>
						  </div>
					</div>
				</div>
			</main>

			@include('Admin/Partials/Footer')

		</div>
	</div>
</body>

</html>