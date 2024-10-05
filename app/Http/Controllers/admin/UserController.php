<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function getUser()
  {
    $users = User::where('role', 'user')->latest()->paginate(5);
    return view('admin.user.list', compact('users'));
  }
  public function editUser($id)
  {
    $users = User::where('role', 'user')->latest()->paginate(5);
    $user = User::where('role', 'user')->where('id', $id)->first();
    return view('admin.user.edit', compact('users', 'user'));
  }
  public function updateUser(Request $request, $id)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'fullname' => 'required|min:5|max:200',
        'email' => 'required|email',
        'mobile' => ['required', 'regex:/^([0-9]{10})$/', 'starts_with:0'],
        'status' => 'required',
      ],
      [
        'fullname.required' => 'Vui lòng nhập họ và tên.',
        'fullname.min' => 'Họ và tên cần có ít nhất 5 ký tự.',
        'fullname.max' => 'Họ và tên không được vượt quá 200 ký tự.',
        'email.required' => 'Vui lòng nhập địa chỉ email.',
        'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
        'mobile.required' => 'Vui lòng nhập số điện thoại của bạn.',
        'mobile.regex' => 'Số điện thoại không hợp lệ, vui lòng nhập đúng 10 chữ số.',
        'mobile.starts_with' => 'Số điện thoại phải bắt đầu bằng số 0.',
        'status.required' => 'Vui lòng chọn trạng thái.',
      ]
    );
    if ($validator->passes()) {
      $user = User::find($id);
      $user->fullname = $request->fullname;
      $user->email = $request->email;
      $user->mobile = $request->mobile;
      $user->status = $request->status;
      $user->save();
      toastr()->success("Cập nhật thành công.", ' ');
      return redirect()->route('admin.user');
    } else {
      return redirect()->back()->withErrors($validator)->withInput();
    }
  }
  public function deleteUser($id)
  {
    $user = User::find($id);
    if ($user == null) {
      toastr()->error("Tên người dùng không tồn tại", " ");
      return redirect()->back();
    }
    $user->delete();
    toastr()->success("Xóa thành công", " ");
    return redirect()->route('admin.user');
  }
}
