<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{ url('images/favicon.png')}}">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600, 700,900|Oswald:400,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('assets/fonts/icomoon/style.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{ url('assets/fonts/flaticon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/aos.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/fancybox.min.css')}}">
  <link rel="stylesheet" href="{{ url('assets/css/style.css')}}">
  <title>MomentMuse&mdash; Timeless Photography</title>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="200">
  <div class="site-wrap">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="header-bar d-flex d-lg-block align-items-center site-navbar-target" data-aos="fade-right">
      <div class="site-logo">
        <a href="{{ route('index') }}">MomentMuse</a>
      </div>

      <div class="d-inline-block d-lg-none ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle "><span class="icon-menu h3"></span></a></div>

    </header> 
    <main class="main-content">

      <div class="container-fluid site-section pt-0">
        
        <section class="site-section" id="section-contact">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <h2 class=" mb-5 heading">Enter your Details</h2>

                @if (session('success'))
                <h2 class="mb-5 heading">{{ session('success') }}</h2>
                @else
                @if (session('error'))
                    <h2 class="mb-5">{{ session('error') }}</h2>
                @endif

                <form action="{{ route('quotationSend') }}" method="POST">
                  @csrf
                  <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                          <label for="name">Full Name</label>
                          <input name="name" type="text" id="name" class="form-control" value="{{ old('name') }}">
                          <input name="service_id" type="hidden" id="service_id" class="form-control" value="{{ $service->id }}">
                          @error('name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-md-6 mb-3 mb-md-0">
                          <label for="email">Email</label>
                          <input name="email" type="text" id="email" class="form-control" value="{{ old('email') }}">
                          @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6">
                          <label for="phone">Phone</label>
                          <input name="phone" type="text" id="phone" class="form-control" value="{{ old('phone') }}">
                          @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-md-6">
                          <label for="event_date">Date</label>
                          <input name="event_date" type="date" id="event_date" class="form-control">
                          @error('event_date')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-12">
                          <label for="address">Address</label>
                          <input name="address" type="text" id="address" class="form-control" value="{{ old('address') }}">
                          @error('address')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="row form-group mb-5">
                      <div class="col-md-12">
                          <label for="message">Message</label>
                          <textarea name="message" id="message" cols="30" rows="7" class="form-control">{{ old('message') }}</textarea>
                          @error('message')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="row form-group justify-content-between">
                      <div class="col-md-5">
                          <div class="h4 font-weight-bold">{{$service->title}}</div>
                      </div>
                      <div class="col-md-5 text-right">
                          <input type="submit" value="Submit" class="btn btn-primary btn-md">
                      </div>
                  </div>
              </form>
              
                @endif
              </div>
            </div>
          </div>
        </section>

        <div class="row justify-content-center">
          <div class="col-md-12 text-center py-5">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. MomentMuse
            </p>
          </div>
        </div>
      </div>
    </main>

  </div>
    <script src="{{ url('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{ url('assets/js/jquery-ui.js')}}"></script>
    <script src="{{ url('assets/js/popper.min.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ url('assets/js/aos.js')}}"></script>
    <script src="{{ url('assets/js/lozad.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{ url('assets/js/main.js')}}"></script>
  </body>
</html>
