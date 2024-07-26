<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Kiểm tra xem người dùng đã tồn tại bằng google_id hay chưa
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // Nếu không tìm thấy, kiểm tra người dùng dựa trên email
                $user = User::where('email', $google_user->getEmail())->first();

                if (!$user) {
                    // Nếu không tìm thấy cả hai, tạo người dùng mới
                    $user = User::create([
                        'name' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'google_id' => $google_user->getId(),
                        'password' => bcrypt(Str::random(16)),
                    ]);
                } else {
                    // Nếu tìm thấy người dùng dựa trên email, cập nhật google_id
                    $user->update([
                        'google_id' => $google_user->getId(),
                    ]);
                }
            }

            // Đăng nhập người dùng
            Auth::login($user);

            return redirect()->intended('/user/dashboard');
        } catch (\Throwable $th) {
            return redirect('/login')->withErrors(['msg' => 'Something went wrong: ' . $th->getMessage()]);
        }
    }
}
