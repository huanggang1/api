<?php

namespace App\Http\Controllers\api;

use App\Model\Member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller {

    private $salt;

    public function __construct() {
        $this->salt = config("api.sgin");
    }

    /**
     * 接口登录
     * @param Request $request
     * @return type
     */
    public function login(Request $request) {
        requestLog($request);
        if (!$request->has('username') || !$request->has('password')) {
            return ajaxReturn(config("api.return.param_error"), $request);
        }
        $user = Member::where('username', '=', $request->input('username'))->where('password', '=', sha1($this->salt . $request->input('password')))->first();
        if (!$user) {
            return ajaxReturn(config("api.return.login_error"), $request);
        }
        $token = str_random(60);
        $user->api_token = $token;
        $user->save();
        return ajaxReturn(config("api.return.login_success"), $request, ['token' => $user->api_token]);
    }

    /**
     * 接口注册
     * @param Request $request
     * @return string
     */
    public function register(Request $request) {
        requestLog($request);
        if (!$request->has('username') || !$request->has('password') || !$request->has('email') || !$request->input('phone')) {
            return ajaxReturn(config("api.return.param_error"), $request);
        }
        $user = new Member;
        $user->username = $request->input('username');
        $user->password = sha1($this->salt . $request->input('password'));
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->api_token = str_random(60);
//             dd($user);
        if (!$user->save()) {
            return ajaxReturn(config("api.return.register_error"), $request);
        }
        return ajaxReturn(config("api.return.register_success"), $request);
    }

    /**
     * 列表展示
     * @param Request $request
     * @return type
     */
    public function info(Request $request) {
        return ajaxReturn(config("api.return.login_success"), $request, Auth::User());
//        return Auth::User();
    }

}
