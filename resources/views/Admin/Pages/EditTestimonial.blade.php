<!DOCTYPE html>
<html lang="en">

<head>
	@include('Admin/Partials/Head', ['page_title' => 'Moment Muse | Admin Edit'])
</head>
<body>
	<div class="wrapper">
  
	  <!-- SideBar -->
	  @include('Admin/Partials/Sidebar')
  
	  <div class="main">
  
		<!-- Navbar -->
		@include('Admin/Partials/Navbar')

			<main class="content">
				<div class="container-fluid p-0">

					<div class="d-flex justify-content-between mt-3">
						<h1 class="h3 mb-3">Edit - Testimonial</h1>
					</div>

					<div class="row">
						<!-- Loop -->
						<div class="col-lg-10 col-10 m-1 py-2 border" data-aos="fade-up">
							<div class="d-md-flex d-block blog-entry align-items-start">
								<div class="mr-md-5 img-wrap">
									<form action="{{ route('admin.testimonialUpdate', $data->id) }}" method="post" enctype="multipart/form-data">
										@csrf
										@method('POST')
									<img src="{{ asset('images/testimonials/' . old('image', $data->profile_pic)) }}" alt="Image" class="img-fluid mb-0 rounded" width="200px" height="200px">
									<input type="file" class="form-control mb-1 w-75 mt-2" id="image" name="image">
								</div>
								<div class="w-100">
									<div class="testiContent">
										<label for="name">Name</label>
										<input type="text" class="form-control mb-1" placeholder="Enter Name" id="name" name="name" value="{{ old('name', $data->name) }}">
										<label for="message">Message</label>
										<textarea class="form-control mb-1" rows="2" placeholder="Enter Blog" id="message" name="message">{{ old('blog', $data->message) }}</textarea>
										<button type="submit" class="btn btn-primary my-1">Submit</button>
										<button type="reset" class="btn btn-primary my-1 dismissModalBtn">Cancel</button>
									</form>										
								</div>
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