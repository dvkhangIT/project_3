@extends('front.layouts.app')

@section('main')
  <section class="section-5 bg-2">
    <div class="container py-5">
      <div class="row">
        <div class="col">
          <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
              <li class="breadcrumb-item active">Chỉnh sửa công việc</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3">
          @include('front.account.sidebar')
        </div>
        <div class="col-lg-9">

          <form action="" method="post" id="editJobForm" name="editJobForm">
            <div class="card border-0 shadow mb-4">
              <div class="card-body card-form p-4">
                <h3 class="fs-4 mb-1">Chỉnh sửa công việc</h3>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label for="" class="mb-3 fs-5 fst-italic">Tiêu đề<span class="req">*</span></label>
                    <input type="text" placeholder="Tiêu đề công việc" id="title" name="title"
                      class="form-control" value="{{ $job->title }}">
                    <p></p>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="" class="mb-3 fs-5 fst-italic">Ngành nghề<span class="req">*</span></label>
                    <select name="category" id="choices-single-default" class="form-control">
                      <option value="">Chọn ngành nghề</option>
                      @if ($careers->isNotEmpty())
                        @foreach ($careers as $career)
                          <option {{ $job->career_id == $career->id ? 'selected' : '' }} value="{{ $career->id }}">
                            {{ $career->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                    <p></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <label for="" class="mb-3 fs-5 fst-italic">Hình thức làm việc<span
                        class="req">*</span></label>
                    <select name="jobType" id="jobType" class="form-select">
                      <option value="">Chọn hình thức làm việc</option>
                      @if ($jobtypes->isNotEmpty())
                        @foreach ($jobtypes as $jobtype)
                          <option {{ $job->job_type_id == $jobtype->id ? 'selected' : '' }} value="{{ $jobtype->id }}">
                            {{ $jobtype->name }}
                          </option>
                        @endforeach
                      @endif
                    </select>
                    <p></p>
                  </div>
                  <div class="col-md-6 mb-4">
                    <label for="" class="mb-3 fs-5 fst-italic">Số lượng tuyển<span class="req">*</span></label>
                    <input type="number" min="1" placeholder="Số lượng tuyển" id="vacancy" name="vacancy"
                      class="form-control" value="{{ $job->vacancy }}">
                    <p></p>
                  </div>
                </div>

                <div class="row">
                  <div class="mb-4 col-md-6">
                    <label for="" class="mb-3 fs-5 fst-italic">Mức lương</label>
                    <input type="text" placeholder="Mức lương" id="salary" name="salary" class="form-control"
                      value="{{ $job->salary }}">
                  </div>

                  <div class="mb-4 col-md-6">
                    <label for="" class="mb-3 fs-5 fst-italic">Vị trí cần tuyển<span
                        class="req">*</span></label>
                    <input type="text" placeholder="Cấp bậc" id="level" name="level" class="form-control"
                      value="{{ $job->job_level }}">
                    <p></p>
                  </div>
                </div>

                <div class="mb-4">
                  <label for="" class="mb-3 fs-5 fst-italic">Mô tả công việc</label>
                  <textarea class="textarea" name="description" id="description" cols="5" rows="5"
                    placeholder="Mô tả công việc">
                                    {{ $job->description }}
                                </textarea>
                </div>
                <div class="mb-4">
                  <label for="" class="mb-3 fs-5 fst-italic">Phúc lợi</label>
                  <textarea class="textarea" name="benefits" id="benefits" cols="5" rows="5" placeholder="Phúc lợi">
                                    {{ $job->benefits }}
                                </textarea>
                </div>
                <div class="mb-4">
                  <label for="" class="mb-3 fs-5 fst-italic">Trách nhiệm công việc</label>
                  <textarea class="textarea" name="responsibility" id="responsibility" cols="5" rows="5"
                    placeholder="Trách nhiệm">
                                    {{ $job->responsibility }}
                                </textarea>
                </div>
                <div class="mb-4">
                  <label for="" class="mb-3 fs-5 fst-italic">Kỹ năng & chuyên môn</label>
                  <textarea class="textarea" name="qualifications" id="qualifications" cols="5" rows="5"
                    placeholder="Nhập yêu cầu công việc...">
                                    {{ $job->qualifications }}
                                </textarea>
                </div>

                <div class="mb-4">
                  <label for="" class="mb-3 fs-5 fst-italic">Kinh nghiệm tối thiểu</label>
                  <select name="experience" id="experience" class="form-control">
                    <option value="1" {{ $job->experience == 1 ? 'selected' : '' }}>1 năm</option>
                    <option value="2" {{ $job->experience == 2 ? 'selected' : '' }}>2 năm</option>
                    <option value="3" {{ $job->experience == 3 ? 'selected' : '' }}>3 năm</option>
                    <option value="4" {{ $job->experience == 4 ? 'selected' : '' }}>4 năm</option>
                    <option value="5" {{ $job->experience == 5 ? 'selected' : '' }}>5 năm</option>
                    <option value="6" {{ $job->experience == 6 ? 'selected' : '' }}>6 năm</option>
                    <option value="7" {{ $job->experience == 7 ? 'selected' : '' }}>7 năm</option>
                    <option value="8" {{ $job->experience == 8 ? 'selected' : '' }}>8 năm</option>
                    <option value="9" {{ $job->experience == 9 ? 'selected' : '' }}>9 năm</option>
                    <option value="10" {{ $job->experience == 10 ? 'selected' : '' }}>10 năm</option>
                    <option value="10_plus" {{ $job->experience == '10_plus' ? 'selected' : '' }}>Trên 10 năm</option>
                  </select>
                </div>

                <div class="mb-4">
                  <label for="keywords" class="mb-3 fs-5 fst-italic">Từ khóa</label>
                  <input type="text" id="keywords" name="keywords" class="form-control"
                    placeholder="Ví dụ: PHP, Java,..." value="{{ str_replace(['[', ']', '"'], '', $job->keywords) }}">
                </div>

                <div class="row form-group">
                  <label for="date" class="fs-5 fst-italic">Ngày hết hạn</labe1>
                    <input type="date" name="expiration_date" id="expiration_date" class="form-control mt-3"
                      value="{{ $job->expiration_date }}">
                    <p></p>
                </div>

                <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Chi tiết công ty</h3>

                <div class="row">
                  <div class="mb-4">
                    <label for="" class="mb-3 fs-5 fst-italic">Tên công ty<span class="req">*</span></label>
                    <input type="text" placeholder="Nhập tên công ty..." id="company_name" name="company_name"
                      class="form-control" value="{{ $job->company_name }}">
                    <p></p>
                  </div>

                  <div class="mb-4">
                    <label for="address" class="form-label mb-3 fs-5 fst-italic">Địa chỉ</label>
                    <div class="input-group mb-3">
                      <select class="form-select" id="province" name="province">
                        @if (!empty($job->province))
                          <option selected>{{ $job->province }}</option>
                        @else
                          <option selected>Chọn tỉnh / thành</option>
                        @endif
                      </select>
                      <input type="hidden" id="province_name" name="province_name">

                      <select class="form-select" id="district" name="district">
                        @if (!empty($job->district))
                          <option selected>{{ $job->district }}</option>
                        @else
                          <option selected>Chọn quận / huyện</option>
                        @endif
                      </select>
                      <input type="hidden" id="district_name" name="district_name">

                      <select class="form-select" id="wards" name="wards">
                        @if (!empty($job->wards))
                          <option selected>{{ $job->wards }}</option>
                        @else
                          <option selected>Chọn phường / xã</option>
                        @endif
                      </select>
                      <input type="hidden" id="ward_name" name="ward_name">
                    </div>
                    <label for="" class="mb-3 fs-5 fst-italic">Địa chỉ chi tiết</label>
                    <input type="text" class="form-control" id="location_detail" name="location_detail"
                      placeholder="Ví dụ: Tầng 14, Richy Tower, Phường Yên Hoà, Quận Cầu Giấy, Thành phố Hà Nội"
                      value="{{ $job->location_detail }}">
                  </div>

                </div>

                <div class="mb-4">
                  <label for="" class="mb-3 fs-5 fst-italic">Website</label>
                  <input type="text" placeholder="Nhập địa chỉ website..." id="company_website"
                    name="company_website" class="form-control" value="{{ $job->company_website }}">
                </div>
              </div>
              <div class="card-footer p-4">
                <button type="submit" class="btn btn-primary">Lưu công việc</button>
              </div>
            </div>
            <label for="" class="mb-2">Địa chỉ chi tiết</label>
            <input type="text" class="form-control" id="location_detail" name="location_detail"
              placeholder="Ví dụ: Tầng 14, Richy Tower, Phường Yên Hoà, Quận Cầu Giấy, Thành phố Hà Nội"
              value="{{ $job->location_detail }}">
        </div>

      </div>

      <div class="mb-4">
        <label for="" class="mb-2">Website</label>
        <input type="text" placeholder="Nhập địa chỉ website..." id="company_website" name="company_website"
          class="form-control" value="{{ $job->company_website }}">
      </div>
    </div>
    <div class="card-footer p-4">
      <button type="submit" class="btn btn-primary">Lưu công việc</button>
    </div>
    </div>
    </form>

    </div>
    </div>
    </div>
  </section>
@endsection

@section('customJs')
  <script type="text/javascript">
    $("#editJobForm").submit(function(e) {
      e.preventDefault();
      $("button[type=submit]").prop("disabled", true);
      $.ajax({
          url: '{{ route('account.updateJob', $job->id) }}',
          type: 'POST',
          dataType: 'json',
          data: $("#editJobForm").serializeArray(),
          success: function(response) {
            $("button[type=submit]").prop("disabled", false);
            if (response.status == true) {
              $("#title").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

              $("#category").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

              $("#jobType").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

              $("#vacancy").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

              $("#location").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

              $("#description").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

              <<
              <<
              << < HEAD
              $("#keyword").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html(''); ===
              ===
              =
              $("#expiration_date").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html(''); >>>
              >>>
              > user

              $("#company_name").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

              <<
              <<
              << < HEAD
              window.location.href = "{{ route('account.myJobs') }}";
            } else {
              var errors = response.errors; ===
              ===
              =
              window.location.href = "{{ route('account.myJobs') }}";
            } else {
              var errors = response.errors;

              toastr.warning('Có lỗi xảy ra, hãy kiểm tra lại !');

              // Title
              if (errors.title) {
                $("#title").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.title);
              } else {
                $("#title").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }
              // Category
              if (errors.category) {
                $("#category").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.category);
              } else {
                $("#category").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }
              // JobType
              if (errors.jobType) {
                $("#jobType").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.jobType);
              } else {
                $("#jobType").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }
              // Vacancy
              if (errors.vacancy) {
                $("#vacancy").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.vacancy);
              } else {
                $("#vacancy").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }
              // Location
              if (errors.location) {
                $("#location").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.location);
              } else {
                $("#location").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }
              // Description
              if (errors.description) {
                $("#description").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.description);
              } else {
                $("#description").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }

              if (errors.expiration_date) {
                $("#expiration_date").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.expiration_date);
              } else {
                $("#expiration_date").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }

              // Company_name
              if (errors.company_name) {
                $("#company_name").addClass('is-invalid')
                  .siblings('p')
                  .addClass('invalid-feedback')
                  .html(errors.company_name);
              } else {
                $("#company_name").removeClass('is-invalid')
                  .siblings('p')
                  .removeClass('invalid-feedback')
                  .html('');
              }
            } >>>
            >>>
            > user

            // Title
            if (errors.title) {
              $("#title").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.title);
            } else {
              $("#title").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
            // Category
            if (errors.category) {
              $("#category").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.category);
            } else {
              $("#category").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
            // JobType
            if (errors.jobType) {
              $("#jobType").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.jobType);
            } else {
              $("#jobType").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
            // Vacancy
            if (errors.vacancy) {
              $("#vacancy").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.vacancy);
            } else {
              $("#vacancy").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
            // Location
            if (errors.location) {
              $("#location").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.location);
            } else {
              $("#location").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
            // Description
            if (errors.description) {
              $("#description").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.description);
            } else {
              $("#description").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
            // Keywords
            if (errors.keyword) {
              $("#keyword").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.keyword);
            } else {
              $("#keyword").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
            // Company_name
            if (errors.company_name) {
              $("#company_name").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.company_name);
            } else {
              $("#company_name").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
            }
          }

        }
      });
    }); <<
    <<
    << < HEAD
  </script>

  <script>
    $(document).ready(function() {
      $.getJSON('/api/proxy/provinces', function(data_tinh) {
        if (data_tinh.error === 0) {
          $.each(data_tinh.data, function(key_tinh, val_tinh) {
            $("#province").append('<option value="' + val_tinh.id + '">' + val_tinh.full_name + '</option>');
          });



          // Khi chọn tỉnh
          $("#province").change(function(e) {
            var idtinh = $(this).val();
            var tentinh = $("#province option:selected").text();
            $("#province_name").val(tentinh); // Lưu tên tỉnh

            $.getJSON('/api/proxy/districts/' + idtinh, function(data_quan) {
              if (data_quan.error === 0) {
                $("#district").html('<option value="0">Chọn Quận / Huyện</option>');
                $("#wards").html('<option value="0">Chọn Phường / Xã</option>');

                $.each(data_quan.data, function(key_quan, val_quan) {
                  $("#district").append('<option value="' + val_quan.id + '">' + val_quan.full_name +
                    '</option>');
                });



                // Khi chọn quận
                $("#district").change(function(e) {
                  var idquan = $(this).val();
                  var tenquan = $("#district option:selected").text();
                  $("#district_name").val(tenquan); // Lưu tên huyện

                  $.getJSON('/api/proxy/wards/' + idquan, function(data_phuong) {
                    if (data_phuong.error === 0) {
                      $("#wards").html('<option value="0">Chọn Phường / Xã</option>');
                      $.each(data_phuong.data, function(key_phuong, val_phuong) {
                        $("#wards").append('<option value="' + val_phuong.id + '">' +
                          val_phuong.full_name + '</option>');
                      });



                      // Khi chọn xã
                      $("#wards").change(function(e) {
                        var tenxa = $("#wards option:selected").text();
                        $("#ward_name").val(tenxa); // Lưu tên xã
                      });
                    }
                  });
                });
              }
            });
          });
        }
      });
    });
  </script>
@endsection
=======
});
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const element = document.getElementById('choices-single-default');
    const choices = new Choices(element, {
      searchEnabled: true,
      placeholder: true,
      placeholderValue: 'Chọn ngành nghề',
      itemSelectText: 'Nhấn để chọn',
    });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Khởi tạo Choices cho input từ khóa
    const keywordInput = document.getElementById('keywords');
    const choices = new Choices(keywordInput, {
      removeItemButton: true, // Hiển thị nút xóa cho mỗi từ khóa
      uniqueItemText: 'Từ khóa này đã có', // Thông báo khi nhập trùng
      placeholder: true, // Hiển thị placeholder trong ô input
      placeholderValue: 'Nhập từ khóa (Ví dụ: PHP, Java)', // Giá trị placeholder
      delimiter: ',', // Dùng dấu "," làm phân cách giữa các từ khóa
      editItems: true, // Cho phép chỉnh sửa các từ khóa đã nhập
      removeItems: true // Cho phép xóa các từ khóa
    });
  });
</script>
@endsection
>>>>>>> user
