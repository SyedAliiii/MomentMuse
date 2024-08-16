<!DOCTYPE html>
<html lang="en">

<head>
	@include('Admin/Partials/Head', ['page_title' => 'Moment Muse | Admin Contacts'])
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

					<div class="modalContainer animate__animated animate__fast" data-modal="services">
						<div class="modalContent">
							<div class="modalHead d-flex justify-content-between align-items-center"><h4>Create Services</h4><button class="btn btn-transparent dismissModalBtn">
									x
								</button></div>
							<div class="modalBody">
								<form action="{{ route('admin.servicesCreate') }}" method="post" enctype="multipart/form-data">
									@csrf
									<label for="title">Title</label>
									<input type="text" class="form-control mb-1" placeholder="Enter title" id="title" name="title">
								
									<div class="row">
										<div class="col-3">
											<label for="currency_code">Currency Code</label>
											<input type="text" class="form-control mb-1" value="$" id="currency_code" name="currency_code">
										</div>
										<div class="col-9">
											<label for="price">Price</label>
											<input type="text" class="form-control mb-1" placeholder="Enter price" id="price" name="price">
										</div>
									</div>
								
									<label for="description">Description</label>
									<input type="text" class="form-control mb-1" placeholder="Enter description" id="description" name="description">
								
									<label for="image">Image</label><span class="mx-2 small">optional</span>
									<input type="file" class="form-control mb-1" id="image" name="image">
								
									<label for="items">Items</label>
									<div class="row mx-1">
										@if (count($items) > 0)
											@foreach($items as $item)
												<div class="col-md-3 col-sm-auto col-auto mx-1 my-1 border py-1">
													<label class="form-check">
														<input class="form-check-input" type="checkbox" name="items[]" value="{{$item->id}}">
														<span class="form-check-label">
															<h4 class="m-0 p-0">{{$item->name}}</h4>
															<small class="text-sm fst-italic">{{$item->description}}</small>
														</span>
													</label>
												</div>
											@endforeach
										@else
											<p>No items available.</p>
										@endif
									</div>
								
									<button type="submit" class="btn btn-primary my-1">Submit</button>
									<button type="reset" class="btn btn-primary my-1 dismissModalBtn">Cancel</button>
								</form>								
							</div>
						</div>
					</div>
					


					<div class="d-flex justify-content-between mt-3">
						<h1 class="h3 mb-3">Services</h1>
						<h1 class="h3 mb-3 modalToggler cursor-pointer text-decoration-underline" data-modal-target="services">Add</h1>
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

					<div class="row">
						
						@if(count($services) > 0)
						@foreach($services as $service)
						<div class="col-lg-4 col-md-4 col-sm-4 col-12 m-1 py-2 border" data-aos="fade-up">
							<div class="d-md-flex d-block blog-entry align-items-start">
								<div class="mx-2">
									<div class="testiContent justify-content-center">
										<h4 class="mt-0 mb-2">{{$service->title}}</h4>
										<p class="m-0">Price : {{$service->price.''.$service->currency_code}}</p>
										<p class="m-0 py-1 text-sm">{{$service->description}}</p>
										<div class="row my-2">
											@if($service->items->isNotEmpty())
											@foreach($service->items as $item)
											<div class="col-sm-auto col-auto mx-1 my-1 border py-1">
												<h4 class="m-0 p-0">{{ $item->name }}</h4>
												<small class="text-sm fst-italic">{{ $item->description }}</small>
											</div>
											@endforeach
											<div class="col-sm-auto col-auto mx-1 my-1 border p-2 text-center m-auto row d-none">
												<div class="col-4 mx-auto py-1 rounded-3 d-flex justify-content-center">
													<a class="modalToggler" data-modal-target="items"><i class="align-middle" data-feather="plus-circle"></i></a>
												</div>
											</div>
										@else
											<p>No items associated with this service.</p>
										@endif
										</div>
									</div>
									<div class="testiActions mt-2">
										<a href="{{ route('admin.serviceEdit', ['id' => $service->id]) }}">
											<button type="button" class="btn btn-primary d-none">Edit</button>
										</a>
										<form action="{{ route('service.delete', $service->id) }}" method="POST" style="display:inline;">
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
							<h3 class="text-center">No Services</h3>
						</div>
						@endif

						<div class="modalContainer animate__animated animate__fast" data-modal="items">
							<div class="modalContent">
								<div class="modalHead d-flex justify-content-between align-items-center"><h4>Add items</h4><button class="btn btn-transparent dismissModalBtn">
										x
									</button></div>
								<div class="modalBody">
									<form action="{{ route('admin.testimonialCreate') }}" method="post" enctype="multipart/form-data">
										@csrf
										<div class="row my-2">

										@if (count($items) > 0)
										@foreach($items as $item)
											<div class="col-md-3 col-sm-auto col-auto mx-1 my-1 border py-1">
												<label class="form-check">
													<input class="form-check-input" type="checkbox" name="{{$item->id}}" value="{{$item->name}}">
														<span class="form-check-label">
															<h4 class="m-0 p-0">{{$item->name}}</h4><small class="text-sm fst-italic">{{$item->description}}</small>
														</span>
												</label>
											</div>
											@endforeach
										@else
										@endif

										</div>
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