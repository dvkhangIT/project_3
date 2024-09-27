<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\JobType;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    // Show find job page
    public function index(Request $request) {

        $categories = Category::where('status', 1)->get();
        $jobTypes = JobType::where('status', 1)->get();

        $jobs = Job::where('status', 1);

        // Search using keyword
        if (!empty($request->keyword)) {
            $jobs = $jobs->where(function($query) use ($request) {
                $query->orwhere('title','like','%'.$request->keyword.'%');
                $query->orwhere('keywords','like','%'.$request->keyword.'%');
            });
        }

        // Search using location
        if (!empty($request->location)) {
            $jobs = $jobs->where('location',$request->location);
        }

        // Search using careers
        if (!empty($request->category)) {
            $jobs = $jobs->where('category_id',$request->category);
        }

        $jobTypeArray = [];
        // Search using jobType
        if (!empty($request->jobType)) {
            $jobTypeArray = explode(',',$request->jobType);
            $jobs = $jobs->whereIn('job_type_id',$jobTypeArray);
        }

        // Search using experience
        if (!empty($request->experience)) {
            $jobs = $jobs->where('experience',$request->experience);
        }


        $jobs = $jobs->with(['jobType','category']);

        if($request->sort == '0') {
            $jobs = $jobs->orderBy('created_at','ASC');
        } else {
            $jobs = $jobs->orderBy('created_at','DESC');
        }

        $jobs = $jobs->paginate(9);

        return view('front.jobs', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'jobTypeArray' => $jobTypeArray,
        ]);
    }

    // Show job detail page
    public function detail($id) {

        $job = Job::where([
                                    'id' => $id, 
                                    'status' => 1,
                                  ])->with(['jobType','category'])->first();

        if ($job == null) {
            abort(404);
        }

        return view('front.jobDetail',[
            'job' => $job,
        ]);
    }

    public function applyJob(Request $request) {
        $id = $request->id;
    
        $job = Job::where('id', $id)->first();
    
        // If job not found in db
        if ($job == null) {
            $message = "Không tìm thấy công việc";
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        }
    
        // You can't apply on your own job
        $employer_id = $job->user_id;
    
        if ($employer_id == Auth::user()->id) {
            $message = "Bạn không thể nộp đơn vào công việc của riêng bạn";
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        }
    
        // You can't apply on a job twice
        $jobApplicationCount = JobApplication::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id
        ])->count();
    
        if ($jobApplicationCount > 0) {
            $message = "Bạn đã nộp đơn công việc này";
            return response()->json([
                'status' => false,
                'message' => $message,
            ]);
        }
    
        $application = new JobApplication();
        $application->job_id = $id;
        $application->user_id = Auth::user()->id;
        $application->employer_id = $employer_id;
        $application->applied_date = now();
        $application->save();
    
        $message = "Nộp đơn thành công";
    
        return response()->json([
            'status' => true,
            'message' => $message,
        ]);
    }
    
}
