<?php

namespace App\Http\Controllers\Users;
use App\Http\Requests;
use App\Http\Requests\FormSignupValidate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchan;
use Exception;


class UserController extends Controller
{
    public function login(){
     
        return view('website.user.sign-in');
    }
    public function SignUp(){
        return view('website.user.sign-up');
    }
    public function profile(){
        $user = Auth::user();
        $products = Purchan::join('products','purchans.product_id','=','products.id')
        ->select('products.*','purchans.created_at as day_purchan','purchans.product_id')
        ->where('purchans.user_id','=',$user->id)
        ->groupBy('purchans.product_id')
        ->get();
        return view('website.user.profile',compact('user','products'));
    }
    public function change_info(Request $request){
        $user = Auth::user();
        $user->firstname  = $request->firstname;
        $user->lastname  = $request->lastname; 
        $user->save();
        return Redirect()->back();
    }
    public function Fpassword(){
        return view('website.user.forgot-password');
    }
    public function create(FormSignupValidate $request){       
        $user = new User();
        $user->firstname  = $request->firstname;
        $user->lastname  = $request->lastname;    
        $user->username  = $request->username;
        $user->email     = $request->email;
        $password        = Hash::make($request->password);
        $user->password  = $password;

        $saved = false;
        try {
            $saved = $user->save();
        } catch (Exception $e) {
            
        }

        if( $saved ){
            $message = 'Đăng ký thành công, đăng nhập ngay.';
            $request->session()->flash('success', $message);
            return redirect()->route('login');
        }else{
            $message = 'Đăng ký không thành công, email không hợp lệ hoặc đã được sử dụng.';
            $request->session()->flash('fail_signup', $message);
            return redirect()->route('SignUp');
        }
    }
    public function postLogin(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            if($user->role == 'User'){
                return redirect()->route('Home');
            }else{
                return redirect()->route('Admin');
            }        
            
        }else{
            $message = 'Email và mật khẩu không hợp lệ!';
            $request->session()->flash('fail-login', $message);
            return redirect()->route('login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    
}
