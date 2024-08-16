<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="MomentMuse">
	<meta name="keywords"
		content="MomentMuse, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

	<title>Sign In | MomentMuse</title>

	<link href="{{ url('assets/admin/css/app.css')}}" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>


	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">MomentMuse</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">


									<form class="pt-3" action="{{ route('admin.login.submit') }}" method="post">
										@csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email"
												placeholder="Enter your email" />
										</div>
										@error('email')
											<div class="text-danger small my-1 text-left">{{ $message }}</div>
										@enderror
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password"
												placeholder="Enter your password" />
										</div>
										@error('password')
											<div class="text-danger small my-1 text-left">{{ $message }}</div>
										@enderror
										<div class="text-center mt-3">
											<!-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a> -->
											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
										</div>
										@if ($errors->has('login'))
											<div class="text-danger small my-1 text-center">{{ $errors->first('login') }}</div>
										@endif
									</form>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{ url('assets/admin/js/app.js')}}"></script>


</body>

</html>