<nav id="sidebar" class="sidebar js-sidebar">
  <div class="sidebar-content js-simplebar">
      <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
          <span class="align-middle">MomentMuse</span>
      </a>

      <ul class="sidebar-nav">
          <li class="sidebar-header">Pages</li>

          <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
              <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                  <i class="align-middle" data-feather="sliders"></i>
                  <span class="align-middle">Dashboard</span>
              </a>
          </li>

          <li class="sidebar-item {{ request()->routeIs('admin.portfolios') ? 'active' : '' }}">
              <a class="sidebar-link" href="{{ route('admin.portfolios') }}">
                  <i class="align-middle" data-feather="book"></i>
                  <span class="align-middle">Portfolios</span>
              </a>
          </li>

          <li class="sidebar-item {{ request()->routeIs('admin.blogs') ? 'active' : '' }}">
              <a class="sidebar-link" href="{{ route('admin.blogs') }}">
                  <i class="align-middle" data-feather="align-center"></i>
                  <span class="align-middle">Blogs and Testimonials</span>
              </a>
          </li>

          <li class="sidebar-item {{ request()->routeIs('admin.contacts') ? 'active' : '' }}">
              <a class="sidebar-link" href="{{ route('admin.contacts') }}">
                  <i class="align-middle" data-feather="message-square"></i>
                  <span class="align-middle">Contacts</span>
              </a>
          </li>

          <li class="sidebar-item {{ request()->routeIs('admin.services') ? 'active' : '' }}">
              <a class="sidebar-link" href="{{ route('admin.services') }}">
                  <i class="align-middle" data-feather="message-square"></i>
                  <span class="align-middle">Services</span>
              </a>
          </li>

          <li class="sidebar-item {{ request()->routeIs('admin.items') ? 'active' : '' }}">
              <a class="sidebar-link" href="{{ route('admin.items') }}">
                  <i class="align-middle" data-feather="message-square"></i>
                  <span class="align-middle">Items</span>
              </a>
          </li>

          <li class="sidebar-item {{ request()->routeIs('admin.quotations') ? 'active' : '' }}">
              <a class="sidebar-link" href="{{ route('admin.quotations') }}">
                  <i class="align-middle" data-feather="message-square"></i>
                  <span class="align-middle">Quotations</span>
              </a>
          </li>
      </ul>
  </div>
</nav>
