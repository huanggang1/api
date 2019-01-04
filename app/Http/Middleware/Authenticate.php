<?php

namespace App\Http\Middleware;

use Closure;
use GroupRules;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate {

    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth) {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        requestLog($request);
        if ($this->auth->guard($guard)->guest()) {
            return ajaxReturn(config("api.return.token_error"),$request);
        }
        //用户信息
        $userExtend = json_decode($request->user(), true);

        if (GroupRules::groupList($userExtend['id'])->isEmpty()) {
            return ajaxReturn(config("api.return.rules_error"),$request);
        }
        if (GroupRules::rulesList()->isEmpty()) {
            return ajaxReturn(config("api.return.rules_error"),$request);
        }

        $rulesData = GroupRules::Roles();
        if ($rulesData->isEmpty()) {
            return ajaxReturn(config("api.return.rules_error"),$request);
        }
        $ruleUrl = $request->route()[1]['as'];
        $urlData = json_decode($rulesData, true);
        if (!in_array($ruleUrl, $urlData)) {
            return ajaxReturn(config("api.return.rules_error"),$request);
        }
        return $next($request);
    }

}
