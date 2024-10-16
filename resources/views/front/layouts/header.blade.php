<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('assets/user/images/logo_web.jpg') }}" alt="Logo" class="navbar-logo">
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
              <a class="nav-link fs-5" aria-current="page" href="{{ route("home") }}">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5" aria-current="page" href="{{ route("jobs") }}">Tìm việc</a>
            </li>
          </ul>

          @if (Auth::check())
            <a class="btn btn-outline-primary me-2" href="{{ route("account.profile") }}" type="submit">Thông tin tài khoản</a>
            {{-- <a href="">Xin chào {{ Auth::user()->name }}</a> --}}
          @else
            <a class="btn btn-outline-primary me-2" href="{{ route("account.login") }}" type="submit">Đăng nhập</a>
          @endif


          @if (Auth::check() && Auth::user()->role === 'employer')
            <a class="btn btn-primary" href="{{ route('account.createJob') }}" type="submit">Đăng bài tuyển dụng</a>
          @endif
        </div>
      </div>
    </nav>
  </header>