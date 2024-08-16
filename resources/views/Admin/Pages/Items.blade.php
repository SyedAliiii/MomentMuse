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

					<div class="modalContainer animate__animated animate__fast" data-modal="items">
						<div class="modalContent">
							<div class="modalHead d-flex justify-content-between align-items-center"><h4>Create Items</h4><button class="btn btn-transparent dismissModalBtn">
									x
								</button></div>
							<div class="modalBody">
								<form action="{{ route('admin.itemsCreate') }}" method="post">
									@csrf
									<label for="name">Title</label>
									<input type="text" class="form-control mb-1" placeholder="Enter title" id="name" name="title"> 
									<label for="description">Description</label>
									<input type="text" class="form-control mb-1" placeholder="Enter description" id="description" name="description">
									<button type="submit" class="btn btn-primary my-1">Submit</button>
									<button type="reset" class="btn btn-primary my-1 dismissModalBtn">Cancel</button>
								</form>
							</div>
						</div>
					</div>
					


					<div class="d-flex justify-content-between mt-3">
						<h1 class="h3 mb-3">Items</h1>
						<h1 class="h3 mb-3 modalToggler cursor-pointer text-decoration-underline" data-modal-target="items">Add</h1>
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


						@if(count($items) > 0)
						    @foreach($items as $item)
						<div class="col-lg-4 col-md-4 col-sm-4 col-12 m-1 py-2 border" data-aos="fade-up">
							<div class="d-md-flex d-block blog-entry align-items-start">
								<div class="mx-2">
									<div class="testiContent justify-content-center">
										<div class="row my-2">
											<h4 class="mt-0 mb-2">{{$item->name}}</h4>
											<p class="m-0 py-1 text-sm">{{$item->description}}</p>
	
										</div>
									</div>
									<div class="testiActions mt-2">
										<form action="{{ route('items.delete', $item->id) }}" method="POST" style="display:inline;">
											@csrf
											@method('DELETE')
											<button type="submit" class="card-link btn btn-github text-sm m-auto">Delete</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@else
							<div class="col-md-12 mb-4" data-aos="fade-up">
								<h3 class="text-center">No Items</h3>
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