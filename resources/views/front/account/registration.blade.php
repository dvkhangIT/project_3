@extends('front.layouts.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Đăng ký</h1>
                    <form action="" name="registrationForm" id="registrationForm">
                        <div class="mb-3">
                            <label for="" class="mb-2">Họ và tên <span style="color: red">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ và tên...">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email <span style="color: red">*</span></label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email...">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Mật khẩu <span style="color: red">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu...">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Xác nhận mật khẩu <span style="color: red">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu...">
                            <p></p>
                        </div> 
                        <button class="btn btn-primary mt-2">Đăng ký</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Bạn đã có tài khoản? <a  href="{{ route("account.login") }}">Đăng nhập</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script>
    $("#registrationForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route("account.processRegistration") }}',
            type: 'post',
            data: $('#registrationForm').serializeArray(),
            dataType: 'json',
            success: function (response) {
                if (response.status == false) {
                    var errors = response.errors;
                    // Name
                    if (errors.name) {
                        $("#name").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.name);
                    } else {
                        $("#name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');
                    }
                     // Email
                    if (errors.email) {
                        $("#email").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.email);
                    } else {
                        $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');
                    }
                    // Password
                    if (errors.password) {
                        $("#password").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.password);
                    } else {
                        $("#password").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');
                    }
                    // Comfirm_password
                    if (errors.confirm_password) {
                        $("#confirm_password").addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.confirm_password);
                    } else {
                        $("#confirm_password").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');
                    }
                } else {
                    $("#name").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');

                    $("#email").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');

                    $("#password").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');

                    $("#confirm_password").removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('');
                    window.location.href='{{ route("account.login") }}';
                }
            }
        });
    })
</script>
@endsection