<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">INI SIDEBAR</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        
        <ul class="nav flex-column">
          <li class="nav-item ">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }} {{ Request::is('dashboard') ? '' : 'text-dark' }} " aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/posts*') ? 'active' : '' }} {{ Request::is('dashboard/posts*') ? '' : 'text-dark' }} " href="{{ url('/dashboard/posts') }}">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                My Posts
            </a>
        </li>  
        </ul>

       

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('posts*') ? 'active' : '' }} {{ Request::is('posts*') ? '' : 'text-dark' }} " href="/posts">
              <i class="bi bi-file-post"></i>
              See All Posts
            </a>
          </li>
          <li class="nav-item">
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="block px-4 py-2 text-sm text-gray-700 dropdown-item hover:underline nav-link px-3 bg-danger" role="menuitem"><i class="bi bi-box-arrow-left text-dark"> Sign out</i></button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>