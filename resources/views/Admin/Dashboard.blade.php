<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Head -->
  @include('Admin/Partials/Head', ['page_title' => 'Moment Muse | Admin Dashboard'])
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
          <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

          <div class="row">

            <div class="card-body d-flex">
              <div class="align-self-center w-100">
                <div class="py-3">
                  <div class="chart chart-xs"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="chartjs-dashboard-pie" width="445" height="200" style="display: block; width: 445px; height: 200px;" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>

                <table class="table mb-0">
                  <tbody>
                    <tr>
                      <td>Chrome</td>
                      <td class="text-end">4306</td>
                    </tr>
                    <tr>
                      <td>Firefox</td>
                      <td class="text-end">3801</td>
                    </tr>
                    <tr>
                      <td>IE</td>
                      <td class="text-end">1689</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- Testimonials -->
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                  <h5 class="card-title mb-0">Testimonials</h5>
                  <a href="{{ route('admin.blogs') }}">
                    <h5 class="card-title mb-0 text-decoration-underline text-black">View All</h5>
                  </a>
                </div>
                <table class="table table-hover my-0">
                  <thead>
                    <tr>
                      <th>Profile Pic</th>
                      <th class="">Name</th>
                      <th class="">Message</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($testimonial) > 0)
                      @foreach($testimonial as $testimonial)
                      <tr>
                        <td><img src="{{ asset('images/testimonials/' . $testimonial->profile_pic) }}" alt="" class="img-thumbnail rounded-circle" height="100px"
                            width="100px"></td>
                        <td class="">{{$testimonial->name}}</td>
                        <td class="">{{$testimonial->message}}</td>
                      </tr>
                      @endforeach
                      @else
                      <div class="col-md-12 mb-4" data-aos="fade-up">
                        <h3 class="text-center">No Testimonials</h3>
                      </div>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>


            <!-- Contacts -->
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                  <h5 class="card-title mb-0">Contacts</h5>
                  <a href="{{ route('admin.contacts') }}">
                    <h5 class="card-title mb-0 text-decoration-underline text-black">View All</h5>
                  </a>
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
                      <td class="text-capitalize">{{ $contact->first_name .' '. $contact->last_name}}</</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->phone}}</td>
                      <td>{{$contact->subject}}</td>
                      <td>{{$contact->message}}</td>
                    </tr>
                    @endforeach
                    @else
                    <div class="col-md-12 mb-4" data-aos="fade-up">
                      <h3 class="text-center">No Blogs</h3>
                    </div>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>


            <!-- Blogs -->
            <div class="col-12 col-lg-12 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                  <h5 class="card-title mb-0">Blogs</h5>
                  <a href="{{ route('admin.blogs') }}">
                    <h5 class="card-title mb-0 text-decoration-underline text-black">View All</h5>
                  </a>
                </div>
                <table class="table table-hover my-0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Title</th>
                      <th class="w-50">Blogs</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($blogs) > 0)
                    @foreach($blogs as $blog)
                    <tr>
                      <td>{{ $blog->name }}</td>
                      <td>{{$blog->title}}</td>
                      <td>{{$blog->blog}}</td>
                      <td>{{ $blog->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                    @else
                    <div class="col-md-12 mb-4" data-aos="fade-up">
                      <h3 class="text-center">No Blogs</h3>
                    </div>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>


          </div>
        </div>
      </main>

      <!-- Footer -->
      @include('Admin/Partials/Footer')
    </div>
  </div>
</body>

</html>