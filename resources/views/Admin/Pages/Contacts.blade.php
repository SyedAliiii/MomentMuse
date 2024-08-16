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
									<th>Subject</th>
									<th>Message</th>
								  </tr>
								</thead>
								<tbody>
									@if(count($contact) > 0)
									@foreach($contact as $contact)
									<tr>
									  <td class="text-capitalize">{{ $contact->first_name .' '. $contact->last_name}}</td>
									  <td>{{$contact->email}}</td>
									  <td>{{$contact->phone}}</td>
									  <td>{{$contact->subject}}</td>
									  <td>{{$contact->message}}</td>
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