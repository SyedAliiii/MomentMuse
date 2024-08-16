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
        <a href="#">MomentMuse</a>
      </div>

      <div class="d-inline-block d-lg-none ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle "><span class="icon-menu h3"></span></a></div>

      <div class="main-menu">
        <ul class="js-clone-nav">
          <li><a href="#section-home" class="nav-link">Home</a></li>
          <li><a href="#section-photos" class="nav-link">Photos</a></li>
          <li><a href="#section-about" class="nav-link">About</a></li>
          <li><a href="#section-packages" class="nav-link">Packages</a></li>
          <li><a href="#section-testimonial" class="nav-link">Testimonial</a></li>
          <li><a href="#section-blog" class="nav-link">Blog</a></li>
          <li><a href="#section-contact" class="nav-link">Contact</a></li>
        </ul>
        <ul class="social js-clone-nav">
          <li><a href="#"><span class="icon-instagram"></span></a></li>
          <li><a href="#"><span class="icon-facebook"></span></a></li>
          <li><a href="#"><span class="icon-twitter"></span></a></li>
          <li><a href="#"><span class="icon-linkedin"></span></a></li>
        </ul>
      </div>
    </header> 
    <main class="main-content">

      <section class="site-section-hero bg-image mb-5" style="background-image: url('images/bkg1.jpg');"  data-stellar-background-ratio="0.5" id="section-home">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-7 text-center">
            <h1 class=" heading text-uppercase text-white" data-aos="fade-up">MomentMuse</h1>
            <p class="lead text-white mb-4" data-aos="fade-up" data-aos-delay="100">Inspiring Moments, Captured with Grace.</p>
            <p data-aos="fade-up" data-aos-delay="100"><a href="#section-contact" class="btn btn-primary btn-md smoothscroll">Available for hire</a></p>
          </div>
        </div>
      </section>

      <div class="container-fluid site-section">


        <div class="row mb-3">
          <div class="col-12 text-center">
            <h2 class="heading">Photos</h2>
          </div>
        </div>

        <section class="row align-items-stretch photos" id="section-photos">
          <div class="col-12">
            <div class="row align-items-stretch">

              {{-- In your Blade template --}}
              @foreach($portfolios as $portfolio)
              <div class="col-6 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                  <a href="{{ asset('images/portfolios/' . $portfolio->path) }}" class="d-block photo-item" data-fancybox="gallery">
                      <img src="{{ asset('images/portfolios/' . $portfolio->path) }}" alt="Image" class="img-fluid mb-0">
                      <div class="photo-text-more">
                          <span class="icon icon-eye"></span>
                      </div>
                  </a>
              </div>
              @endforeach
            </div>

          </div>
        </section>

        <section class="site-section" id="section-about">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <img src="images/pp2.jpg" alt="Image" class="img-fluid mb-4 w-50 rounded-circle">
                <div data-aos="fade-up"  data-aos-delay="100">
                  <h2 class="">Hi I'm Syed Ali</h2>
                  <p>Welcome to <span class="text-primary font-weight-bold">MomentMuse</span>, where every moment is a masterpiece. I'm <spam class="font-weight-bold">Syed Ali</spam>, a dedicated professional cameraman with a passion for storytelling through the lens. With years of experience in capturing life's most precious events, I specialize in creating visually stunning narratives that resonate with authenticity and emotion.</p>
                  <p>Whether it’s the joy of a wedding, the energy of a corporate event, or the beauty of a natural landscape, I believe every moment holds a unique story. My goal is to document these stories with a blend of creativity, precision, and technical expertise. Join me in preserving your memories in the most captivating way possible.</p>
                  <h3 class=" mt-5">Services</h3>
                  <div class="d-block d-md-flex mt-5">
                    <div class="mr-md-auto mr-2">
                      <ul class="ul-check list-unstyled primary">
                        <li>Wedding Photography</li>
                        <li>Portrait Photography</li>
                        <li>Event Photography</li>
                      </ul>
                    </div>
                    <div class="mr-md-auto">
                      <ul class="ul-check list-unstyled primary">
                        <li>Product Photography</li>
                        <li>Maternity and Newborn Photography</li>
                        <li>Travel and Landscape Photography Workshops</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="site-section p-0" id="section-packages">
          <div class="container">
            <div class="row justify-content-center">
              @if(count($services) > 0)
              @foreach($services as $service)
              <a href="{{ route('quotations', ['id' => $service->id]) }}" class="col-lg-3 col-md-5 col-sm-6 col-12 py-0 px-4 m-4 border border-primary rounded">
                {{-- <h1 class="h1 border-bottom mt-3">Package 1</h1> --}}
                <h2 class="h2 border-bottom mt-3">{{$service->title}}</h2>
                <h4 class="h4 border-bottom mt-3">Price : {{$service->price.''.$service->currency_code}}</h4>
                <div class="row">
                  @if($service->items->isNotEmpty())
                    @foreach($service->items as $item)
                      <div class="col-auto border p-2">
                        <h3>{{ $item->name }}</h3>
                        <small class="text-sm">{{ $item->description }}</small>
                      </div>
                    @endforeach
                  @else
									@endif
                </div>
                <div class="text-sm my-3 border-bottom">
                  <h4>Description</h4><p>{{$service->description}}</p>
                </div>
              </a>
              @endforeach
              @else
              @endif

            </div>
          </div>
        </section>

        <section class="site-section" id="section-testimonial">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8 text-center">
                <h2 class="heading">Testimonial</h2>

                <div class="row justify-content-center">
                  <div class="col-md-12">

                    <div class="owl-carousel slide-one-item home-slider">

                      @if (count($testimonials) > 0)
                      @foreach ($testimonials as $testimonial)
                      <div class="testimony text-center px-md-4">
                        <figure class="mx-auto d-inline-block">
                          <img src="{{ asset('images/testimonials/' . $testimonial->profile_pic) }}" alt="Free Template by Untree.co" class="mx-auto img-fluid w-25 rounded-circle">
                        </figure>
                        <p class="text-black"><strong>{{$testimonial->name }}</strong></p>
                        <blockquote>
                          <p>&ldquo;{{$testimonial->message}}&rdquo;</p>
                        </blockquote>
                      </div>
                      @endforeach
                      @else
                      <div class="col-md-12 mb-4" data-aos="fade-up">
                        <h3 class="text-center">No Testimonials</h3>
                      </div>
                      @endif
                      
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="site-section" id="section-blog">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <div class="row">
                  <h2 class="heading"  data-aos="fade-up">Blog</h2>

                  @if (count($blogs) > 0)
                  @foreach ($blogs as $blog)
                  <div class="col-md-12 mb-4" data-aos="fade-up">
                    <div class="d-md-flex d-block blog-entry align-items-start">
                      <div class="mr-0 mr-md-5 mb-3 img-wrap"><a href="#"><img src="{{ asset('images/blogs/' . $blog->image) }}" alt="Image" class="img-fluid mb-0"></a></div>
                      <div>
                        <h2 class="mt-0 mb-2">{{$blog->title}}</h2>
                        <div class="meta mb-3">Posted by {{ $blog->name }} on <a href="#">{{ $blog->created_at->format('M d, Y') }}</a></div>
                        <p>{{$blog->blog}}</p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  <div class="col-md-12 mb-4" data-aos="fade-up">
                    <h3 class="text-center">No Blogs</h3>
                  </div>
                  @endif

                  <div class="col-12 text-center">
                    <div class="custom-pagination">
                      <span>1</span>
                      <a href="#">2</a>
                      <a href="#">3</a>
                      <span>...</span>
                      <a href="#">7</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="site-section" id="section-contact">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <h2 class=" mb-5 heading">Contact</h2>

                @if (session('success'))
                <h2 class="mb-5 heading">{{ session('success') }}</h2>
                @else
                @if (session('error'))
                    <h2 class="mb-5">{{ session('error') }}</h2>
                @endif

                <form action="{{ route('contactSend') }}" method="POST">
                  @csrf
                  <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                          <label for="fname">First Name</label>
                          <input name="first_name" type="text" id="fname" class="form-control" value="{{ old('first_name') }}">
                          @error('first_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-md-6">
                          <label for="lname">Last Name</label>
                          <input name="last_name" type="text" id="lname" class="form-control" value="{{ old('last_name') }}">
                          @error('last_name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-6 mb-3 mb-md-0">
                          <label for="email">Email</label>
                          <input name="email" type="text" id="email" class="form-control" value="{{ old('email') }}">
                          @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="col-md-6">
                          <label for="phone">Phone</label>
                          <input name="phone" type="text" id="phone" class="form-control" value="{{ old('phone') }}">
                          @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
                  <div class="row form-group">
                      <div class="col-md-12">
                          <label for="subject">Subject</label>
                          <input name="subject" type="text" id="subject" class="form-control" value="{{ old('subject') }}">
                          @error('subject')
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
                  <div class="row form-group">
                      <div class="col-md-12">
                          <input type="submit" value="Send Message" class="btn btn-primary btn-md">
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
