@extends('front.layouts.app')

@section('main')
<section class="section-0 lazy d-flex bg-image-style dark align-items-center "   class="" data-bg="assets/images/banner5.jpg">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1>Tìm công việc mơ ước của bạn</h1>
                <p>Hàng ngàn công việc đang chờ bạn.</p>
                <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Khám phá ngay</a></div>
            </div>
        </div>
    </div>
</section>

<section class="section-1 py-5 "> 
    <div class="container">
        <div class="card border-0 shadow p-5">
            <div class="row">
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Từ khoá">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <input type="text" class="form-control" name="search" id="search" placeholder="Địa điểm">
                </div>
                <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                    <select name="category" id="category" class="form-control">
                        <option value="">Chọn lĩnh vực</option>
                        <option value="">Tester</option>
                        <option value="">Developer</option>
                        <option value="">Công nghệ thông tin</option>
                        <option value="">Thiết kế thời trang</option>
                    </select>
                </div>
                
                <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                    <div class="d-grid gap-2">
                        <a href="jobs.html" class="btn btn-primary btn-block">Tìm kiếm</a>
                    </div>
                    
                </div>
            </div>            
        </div>
    </div>
</section>

<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Công việc phổ biến</h2>
        <div class="row pt-5">
            @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-xl-3 col-md-6">
                        <div class="single_catagory">
                            <a href="jobs.html"><h4 class="pb-2">{{ $category->name }}</h4></a>
                            <p class="mb-0"> <span>50</span> vị trí còn trống</p>
                        </div>
                    </div>
                @endforeach
            @endif           
        </div>
    </div>
</section>

<section class="section-3  py-5">
    <div class="container">
        <h2>Công việc nổi bật</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($featureJobs->isNotEmpty())
                            @foreach ($featureJobs as $featureJob)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $featureJob->title }}</h3>
                                            <p>{{ Str::words($featureJob->description, 5) }}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $featureJob->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $featureJob->jobType->name }}</span>
                                                </p>
                                                @if (is_null($featureJob->salary))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $featureJob->salary }}</span>
                                                    </p>
                                                @endif                                              
                                            </div>
        
                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail',$featureJob->id) }}" class="btn btn-primary btn-lg">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                        @endif              
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 bg-2 py-5">
    <div class="container">
        <h2>Công việc mới nhất</h2>
        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">

                        @if ($latesJobs->isNotEmpty())
                            @foreach ($latesJobs as $latesJob)
                                <div class="col-md-4">
                                    <div class="card border-0 p-3 shadow mb-4">
                                        <div class="card-body">
                                            <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latesJob->title }}</h3>
                                            <p>{{ Str::words($latesJob->description, 5) }}</p>
                                            <div class="bg-light p-3 border">
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                                    <span class="ps-1">{{ $latesJob->location }}</span>
                                                </p>
                                                <p class="mb-0">
                                                    <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                                    <span class="ps-1">{{ $latesJob->jobType->name }}</span>
                                                </p>
                                                @if (!is_null($latesJob->salary))
                                                    <p class="mb-0">
                                                        <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                                        <span class="ps-1">{{ $latesJob->salary }}</span>
                                                    </p>
                                                @endif                                              
                                            </div>
        
                                            <div class="d-grid mt-3">
                                                <a href="{{ route('jobDetail',$latesJob->id) }}" class="btn btn-primary btn-lg">Chi tiết</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                        @endif  

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection