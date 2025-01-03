@extends('front.layouts.app')

@section('main')
  <section class="section-5 bg-2">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Công việc đã đăng</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          @include('front.account.sidebar')
        </div>
        <div class="col-lg-9">
          <div class="card border-0 shadow mb-4 p-3">
            <div class="card-body card-form">
              <div class="d-flex justify-content-between">
                <div>
                  <h3 class="fs-4 mb-1">Quản lý công việc của bạn</h3>
                </div>
                <div style="margin-top: -10px;">
                  <div class="input-group">
                    <form action="" name="searchForm" id="searchForm" class="d-flex">
                      <input value="" type="text" name="keyword" value="{{ old('keyword') }}" id="keyword" placeholder="Nhập tiêu đề..."
                        class="form-control me-2">
                      <button type="submit" class="btn btn-primary w-50">Tìm kiếm</button>
                    </form>
                  </div>
                </div>

              </div>
              <div class="table-responsive">
                <table class="table ">
                  <thead class="bg-light">
                    <tr>
                      <th scope="col">Tiêu đề</th>
                      <th scope="col">Ngày đăng</th>
                      <th scope="col">Số lượng ứng tuyển</th>
                      <th scope="col">Trạng thái</th>
                      <th scope="col">Các tuỳ chỉnh</th>
                    </tr>
                  </thead>
                  <tbody class="border-0">
                    @if ($jobs->isNotEmpty())
                      @foreach ($jobs as $job)
                      <form id="remove-job-form-{{ $job->id }}" action="{{ route('account.deleteJob') }}" method="POST">
                        @csrf
                        <tr class="active">
                          <td style="display: none"><input type="hidden" name="id" value="{{ $job->id }}"></td>
                          <td>
                            <div class="job-name fw-500">{{ Str::words(strip_tags($job->title), 5) }}</div>
                            <div class="info1 fst-italic">{{ $job->jobType->name }} . {{ $job->province }}</div>
                          </td>
                          <td>{{ \Carbon\Carbon::parse($job->created_at)->locale('vi')->translatedFormat('d F, Y') }}</td>
                          <td class="text-center">{{ $job->vacancy }}</td>
                          <td>
                            @if ($job->status == 1)
                                <div class="job-status text-capitalize text-success">Đã phê duyệt</div>
                            @elseif ($job->status == 0)
                                <div class="job-status text-capitalize text-warning">Đang chờ phê duyệt</div>
                            @elseif ($job->status == 2)
                                <div class="job-status text-capitalize text-warning">Hết thời hạn ứng tuyển</div>
                            @elseif ($job->status == 3)
                                <div class="job-status text-capitalize text-danger">Đã đủ số lượng ứng tuyển</div>
                            @endif
                          </td>                        
                          <td>
                            <div class="action-dots float-end">
                              <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </button>
                              <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                    <a class="dropdown-item" href="{{ route('JobDetail_employer', $job->id) }}"> <i
                                        class="fa fa-eye" aria-hidden="true"></i> Xem</a>
                                  </li>
                                
                                  <li>
                                    <a class="dropdown-item" href="{{ route('account.editJob', $job->id) }}"><i
                                      class="fa fa-edit" aria-hidden="true"></i> Chỉnh sửa</a>
                                  </li>
                                  <li>
                                    <button type="button" class="dropdown-item" onclick="confirmation({{ $job->id }})">
                                      <i class="fa fa-trash me-3" aria-hidden="true"></i> Xoá việc làm
                                  </button>
                                  </li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </form>
                      @endforeach
                    @else
                    <tr>
                      <td colspan="5">
                          <div class="card-error-find">
                              <div class="card-body-error-find">
                               <img alt="Illustration of a piggy bank with a magnifying glass" 
                                 height="100" 
                                 src="https://storage.googleapis.com/a1aa/image/wbdDxuRHo2aDNtL5eFnlzmLSJ5fXAOdRDeHnXiZSLwjffvSdC.jpg" 
                                 width="100"/>
                               <div class="text-content">
                                <h5 class="mt-3">
                                 Oops! Không tìm thấy công việc
                                </h5>
                                <p>
                                 TopWork chưa tìm thấy công việc bạn tìm kiếm vào lúc này.
                                </p>
                               </div>
                              </div>
                          </div>
                      </td>
                    </tr>
                    @endif
                  </tbody>
                </table>
              </div>
              <div>
                {{ $jobs->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('customJs')
  <script type="text/javascript">
    $("#searchForm").submit(function(e) {
      e.preventDefault();

      var url = '{{ route('account.myJobs') }}?';

      var keyword = $("#keyword").val();

      if (keyword != "") {
        url += '&keyword=' + keyword;
      }
      window.location.href = url;
    });
  </script>

<script type="text/javascript">
  function confirmation(jobId) {
      Swal.fire({
          html: '<h3>Bạn có chắc chắn ?</h3>',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Có',
          cancelButtonText: 'Không'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById(`remove-job-form-${jobId}`).submit();
          }
      });
  }
</script>
@endsection
