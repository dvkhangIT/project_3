<!DOCTYPE html>
<html class="no-js" lang="vi" />

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>JobEverywhere | Tìm việc làm tốt nhất</title>
  <meta name="description" content="" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
  <meta name="HandheldFriendly" content="True" />
  <meta name="pinterest" content="nopin" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> --}}



  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <!-- Fav Icon -->
  <link rel="shortcut icon" type="image/x-icon" href="#" />
</head>

<body data-instant-intensity="mousedown">

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow py-3">
      <div class="container">
        <a class="navbar-brand" href="{{ route("home") }}">CareerVibe</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-0 ms-sm-0 me-auto mb-2 mb-lg-0 ms-lg-4">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route("home") }}">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route("jobs") }}">Tìm việc</a>
            </li>
          </ul>

          @if (Auth::check())
            <a class="btn btn-outline-primary me-2" href="{{ route("account.profile") }}" type="submit">Thông tin tài khoản</a>
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



  @yield("main")

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title pb-0" id="exampleModalLabel">Đổi ảnh đại diện</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="profilePicForm" name="profilePicForm" action="" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Chọn ảnh đại diện</label>
              <input type="file" class="form-control" id="image" name="image">
              <p class="text-danger" id="image-error"></p>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary mx-3">Cập nhật</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer class="bg-dark py-3 bg-2">
    <div class="container">
      <p class="text-center text-white pt-3 fw-bold fs-6">© 2023 xyz company, all right reserved</p>
    </div>
  </footer>

  <script src="{{ asset("assets/js/jquery-3.6.0.min.js") }}"></script>
  <script src="{{ asset("assets/js/bootstrap.bundle.5.1.3.min.js") }}"></script>
  <script src="{{ asset("assets/js/instantpages.5.1.0.min.js") }}"></script>
  <script src="{{ asset("assets/js/lazyload.17.6.0.min.js") }}"></script>
  <script src="{{ asset("assets/js/custom.js") }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


  @if (session()->has("toastr"))
    <script>
      toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "6000"
      };

      @foreach (session("toastr") as $type => $message)
        toastr.{{ $type }}('{{ $message }}');
      @endforeach
    </script>
  @endif

  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $("#profilePicForm").submit(function(e) {
      e.preventDefault();

      var formData = new FormData(this);

      $.ajax({
        url: '{{ route("account.updateProfilePicture") }}',
        type: 'post',
        data: formData,
        dataType: 'json',
        contentType: false,
        processData: false,
        success: function(response) {
          if (response.status == false) {
            var errors = response.errors;
            if (errors.image) {
              $("#image-error").html(errors.image)
            }
          } else {
            window.location.href = '{{ url()->current() }}';
          }
        }
      })
    });
  </script>

  @yield("customJs")
</body>

</html>
