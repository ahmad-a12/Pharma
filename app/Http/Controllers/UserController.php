<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function emailRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:4|max:64',
            'email' => 'required|email|unique:users,email|min:10|max:256',
            'phone_number' => 'required|unique:users,phone_number|regex:/^09[0-9]{8}$/',
            'password' => 'required|min:8',
            'pharmacy_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'license_certificate' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],[
            'email.required'=> 'هذا الحقل مطلوب',
            'email.unique'=> 'الايميل مسجل مسبقاً',
            'email.min'=> 'الايميل يجب أن يتألف من 10 محارف أو أكثر',
            'phone_number.required'=> 'هذا الحقل مطلوب',
            'phone_number.unique'=> 'الرقم مسجل مسبقاً',
            'phone_number.regex'=> 'يجب أن يتكون الرقم من 10 خانات وأن يبدأ ب 09',
            'name.required'=> 'هذا الحقل مطلوب',
            'name.min'=> 'الاسم يجب أن يتألف من 4 محارف أو أكثر',
            'password.required'=> 'هذا الحقل مطلوب',
            'password.min'=> 'كلمة السر يجب أن تتألف من 8 أحرف أو أكثر',
            'pharmacy_name.required' => 'اسم الصيدلية مطلوب',
            'city.required' => 'المدينة مطلوبة',
            'address.required' => 'العنوان مطلوب',
            'license_certificate.required' => 'شهادة الترخيص مطلوبة',
            'image.required' => 'الصورة مطلوبة',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        } else {
            return response()->json(['image' => 'Image file is required'], 200);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'pharmacy_name' => $request->pharmacy_name,
            'city' => $request->city,
            'address' => $request->address,
            'license_certificate' => $request->license_certificate,
            'image' => $imagePath,
            'activated' => false,
            'fcm_token' => $request->fcm_token,
            'activated_at'=>null,
        ]);

        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        return response()->json([
            'user' => [$user],
            'token' => $token,
        ], 201);
    }

    public function emailLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'exists:users,email|min:10|required',
            'password'=>'required|min:8',
        ], [
            'email.exists' => 'الايميل ليس مسجلاً',
            'email.required' => 'هذا الحقل مطلوب',
            'email.min' => 'الايميل يجب أن يتألف من 10 محارف أو أكثر',
            'password.required'=>'هذا الحقل مطلوب',
            'password.min'=>'كلمة السر يجب أن تتألف من 8 محارف أو أكثر',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 200);
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

            if ($user) {
                $data['token'] = $user->fcm_token; 
            }
            $user->fcm_token = $request->fcm_token;
            $user->save();
            return response()->json([
                'user' => [$user],
                'token' => $token,
            ], 200);
        }

        return response()->json('كلمة السر خاطئة', 200);
    }

    public function logout(Request $request)
    {
        Auth::guard('sanctum')->user()->tokens()->delete();
        return response()->json('You have been logged out', 200);
    }

    public function index()
    {
        $users=User::get();
        return view('User.UserTable',compact('users'));
    }

    public function show(string $id)
    {
        $services=User::find($id);
        return view('User.ShowUser',compact('users'));
    }

    public function activate($id)
{
    $user = User::find($id);

    if ($user) {
        $user->activated = true;
        $user->activated_at = now();
        $user->save();

        return redirect()->route('user')->with('status', 'User account has been activated.');
    }

    return redirect()->back()->with('error', 'User not found or Account is Active.');
}

    public function deactivate($id)
{
    $user = User::find($id);

    if ($user) {
        $user->activated = false;
        $user->save();

        return redirect()->route('user')->with('status', 'User account has been deactivated.');
    }

    return redirect()->back()->with('error', 'User not found or Account is not Active.');
}


}
