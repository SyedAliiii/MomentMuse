<!DOCTYPE html>
<html lang="en">

<head>
	@include('Admin/Partials/Head', ['page_title' => 'Moment Muse | Admin Blogs'])
</head>
<style>
		.modalContainer {
			min-height: 100vh;
			width: 100%;
			background-color: #0000005e;
			backdrop-filter: blur(2px);
			position: fixed;
			top: 0;
			left: 0;
			z-index: 999;
			display: none;
			align-items: center;
			justify-content: center
		}

		.modalContainer.show {
			display: flex !important;
		}

		.modalContent {
			height: fit-content;
			width: 700px;
			padding: 0.8rem;
			background-color: #fff;
		}

		@media (max-width: 767px) {
			.modalContent {
				width: 95%;
			}
		}

		.modalHead {
			border-bottom: 1px solid #ccc;
			padding-bottom: 0.3rem;
		}

		.modalBody {
			margin: 0.75rem auto;
		}
</style>

<body>
	<div class="wrapper">
  
	  <!-- SideBar -->
	  @include('Admin/Partials/Sidebar')
  
	  <div class="main">
  
		<!-- Navbar -->
		@include('Admin/Partials/Navbar')

			<!-- Blog Create Modal -->

			<div class="modalContainer animate__animated animate__fast" data-modal="blog">
				<div class="modalContent">
					<div class="modalHead d-flex justify-content-between align-items-center"><h4>Create Blog</h4><button class="btn btn-transparent dismissModalBtn">
							x
						</button></div>
					<div class="modalBody">
						<form action="blogsCreate" method="post" enctype="multipart/form-data">
							@csrf
							<label for="name">Name</label>
							<input type="text" class="form-control mb-1" placeholder="Enter Name" id="name" name="name">
							<label for="title">Title</label>
							<input type="text" class="form-control mb-1" placeholder="Enter Title" id="title" name="title">
							<label for="blog">Blog</label>
							<textarea class="form-control mb-1" rows="2" placeholder="Enter Blog" id="blog" name="blog"></textarea>	
							<label for="image">Image</label>
							<input type="file" class="form-control mb-1" id="image" name="image">
							<button type="submit" class="btn btn-primary my-1">Submit</button>
							<button type="reset" class="btn btn-primary my-1 dismissModalBtn">Cancel</button>
						</form>
					</div>
				</div>
			</div>

			<main class="content">
				<div class="container-fluid p-0">

					<div class="d-flex justify-content-between">
						<h1 class="h3 mb-3">Blogs</h1>
						<h1 class="h3 mb-3 modalToggler cursor-pointer text-decoration-underline" data-modal-target="blog">Create</h1>
					</div>
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif

					@if(session('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif


					<div class="row border-bottom">
						<!-- Loop -->

						@if(count($blogs) > 0)
							@foreach($blogs as $blog)
							<div class="col-md-12 mb-4" data-aos="fade-up">
								<div class="d-md-flex d-block blog-entry align-items-start">
									<div class="mx-2 mr-md-5 mb-3 img-wrap"><img src="{{ asset('images/blogs/' . $blog->image) }}"
												alt="Blogs" class="img-fluid mb-0" width="250px" height="250px"></div>
									<div>
										<div class="row justify-content-between">
											<div class="blogContent">
												<h2 class="mt-0 mb-2">{{$blog->title}}</h2>
												<div class="meta mb-3">Posted by {{ $blog->name }} on <span class="text-decoration-underline text-sm">{{ $blog->created_at->format('M d, Y') }}	</span></div>
												<p>{{$blog->blog}}</p>
											</div>
											<div class="blogAction">
												<a href="{{ route('admin.edit', ['id' => $blog->id]) }}">
													<button type="button" class="btn btn-primary">Edit</button>
												</a>												
												<form action="{{ route('blogs.delete', $blog->id) }}" method="POST" style="display:inline;">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-primary">Delete</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
                            @endforeach
						 @else
						 <div class="col-md-12 mb-4" data-aos="fade-up">
							<h3 class="text-center">No Blogs</h3>
						</div>
						@endif
					</div>


					<!-- Testimonials Create Modal -->
		
					<div class="modalContainer animate__animated animate__fast" data-modal="testimonials">
						<div class="modalContent">
							<div class="modalHead d-flex justify-content-between align-items-center"><h4>Create Testimonials</h4><button class="btn btn-transparent dismissModalBtn">
									x
								</button></div>
							<div class="modalBody">
								<form action="{{ route('admin.testimonialCreate') }}" method="post" enctype="multipart/form-data">
									@csrf
									<label for="name">Name</label>
									<input type="text" class="form-control mb-1" placeholder="Enter Name" id="name" name="name"> 
									<label for="message">Message</label>
									<input type="text" class="form-control mb-1" placeholder="Enter Message" id="message" name="message">
									<label for="profile">Profile</label>
									<input type="file" class="form-control mb-1" id="profile" name="image">
									<button type="submit" class="btn btn-primary my-1">Submit</button>
									<button type="reset" class="btn btn-primary my-1 dismissModalBtn">Cancel</button>
								</form>
							</div>
						</div>
					</div>


					<div class="d-flex justify-content-between mt-3">
						<h1 class="h3 mb-3">Testimonials</h1>
						<h1 class="h3 mb-3 modalToggler cursor-pointer text-decoration-underline" data-modal-target="testimonials">Add</h1>
					</div>
					

					<div class="row">


						<!-- Loop -->
						@if(count($testimonial) > 0)
						@foreach($testimonial as $testimonial)
						<div class="col-lg-5 col-md-5 col-sm-5 col-12 m-1 py-2 border" data-aos="fade-up">
							<div class="d-md-flex d-block blog-entry align-items-start">
								<div class="mr-md-5 img-wrap"><img src="{{ asset('images/testimonials/' . $testimonial->profile_pic) }}" alt="Image"class="img-fluid mb-0 rounded" width="200px" height="200px"></div>
								<div class="mx-2">
									<div class="testiContent">
										<h4 class="mt-0 mb-2">{{$testimonial->name}}</h4>
										<p class="m-0">{{$testimonial->message}}</p>
									</div>
									<div class="testiActions mt-2">
										<a href="{{ route('admin.editTestimonial', ['id' => $testimonial->id]) }}">
											<button type="button" class="btn btn-primary">Edit</button>
										</a>
										<form action="{{ route('testimonial.delete', $testimonial->id) }}" method="POST" style="display:inline;">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-primary">Delete</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@else
						<div class="col-md-12 mb-4" data-aos="fade-up">
							<h3 class="text-center">No Testimonials</h3>
						</div>
						@endif

					</div>
				</div>
			</main>



			@include('Admin/Partials/Footer')
		</div>
	</div>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
		integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script>

			$('.modalToggler').click(function () {
				const modalName = $(this).data('modal-target');
				const $modal = $(`.modalContainer[data-modal="${modalName}"]`);
	
				$modal.removeClass('animate__fadeOut').addClass('show animate__fadeIn');
			});
	
			// Close the modal when clicking the dismiss button
			$('.dismissModalBtn').click(function () {
				const $modal = $(this).closest('.modalContainer');
	
				$modal.addClass('animate__fadeOut').removeClass('animate__fadeIn');
				setTimeout(() => {
					$modal.removeClass('show');
				}, 800);
			});
	
			// Close the modal when clicking outside the modal content
			$('.modalContainer').on('click', function (event) {
				if ($(event.target).is('.modalContent') || $(event.target).closest('.modalContent').length) {
					return;
				}
				$(this).find('.dismissModalBtn').click();
			});
	
	
		</script>

</body>

</html>