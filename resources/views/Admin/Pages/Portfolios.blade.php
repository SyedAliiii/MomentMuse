<!DOCTYPE html>
<html lang="en">

<head>
	@include('Admin/Partials/Head', ['page_title' => 'Moment Muse | Admin Portfolios'])
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


		<div class="modalContainer animate__animated animate__fast" data-modal="portfolios">
			<div class="modalContent">
				<div class="modalHead d-flex justify-content-between align-items-center"><h4>Create Portfolios</h4><button class="btn btn-transparent dismissModalBtn">
						x
					</button></div>
				<div class="modalBody">
					<form action="{{ route('admin.portfoliosCreate') }}" method="post" enctype="multipart/form-data">
						@csrf
						<label for="title">Title</label>
						<input type="text" class="form-control mb-1" placeholder="Enter title" id="title" name="title"> 
						<label for="profile">Profile</label>
						<input type="file" class="form-control mb-1" id="profile" name="image">
						<button type="submit" class="btn btn-primary my-1">Submit</button>
						<button type="reset" class="btn btn-primary my-1 dismissModalBtn">Cancel</button>
					</form>
				</div>
			</div>
		</div>

			<main class="content">
				<div class="container-fluid p-0">
					<div class="d-flex justify-content-between mt-3 border-bottom">
						<h1 class="h3 mb-3">Portfolios</h1>
						<h1 class="h3 mb-3 modalToggler cursor-pointer text-decoration-underline" data-modal-target="portfolios">Add</h1>
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

					<div class="row my-4">

						<!-- Loop -->
						@if(count($portfolios) > 0)
							@foreach($portfolios as $portfolio)
								<div class="col-lg-3 col-md-3 col-sm-4 col-6">
									<div class="card">
										<img class="card-img-top" src="{{ asset('images/portfolios/' . $portfolio->path) }}" alt="Unsplash">
										<div class="card-header p-2">
											<h5 class="card-title mb-2">{{$portfolio->title}}</h5>
											<a href="{{ route('admin.editPortfolios', ['id' => $portfolio->id]) }}">
												<button type="button" class="card-link btn btn-github text-sm" data-modal-target="portfolioEdit">Edit</button>
											</a>												
											<form action="{{ route('portfolios.delete', $portfolio->id) }}" method="POST" style="display:inline;">
												@csrf
												@method('DELETE')
												<button type="submit" class="card-link btn btn-github text-sm m-auto">Delete</button>
											</form>
										</div>
									</div>
								</div>
							@endforeach
						@else
						<div class="col-md-12 my-4" data-aos="fade-up">
							<h3 class="text-center">No Portfolios</h3>
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
