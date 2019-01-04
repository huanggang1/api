<?php

return [
    //token加密参数
    'sgin' => "userloginregister",
    //返回参数语言保提示
    'return' => [
        //成功提示
        'login_success' => [
            'code' => 200,
            'Message' => '请求成功'
        ],
        //登录失败提示
        'login_error' => [
            'code' => 100,
            'Message' => '用户名或密码不正确,登录失败'
        ],
        //参数缺少提示
        'param_error' => [
            'code' => 101,
            'Message' => '参数不全'
        ],
        //验证toekn提示
        'token_error' => [
            'code' => 102,
            'Message' => '请求失败'
        ],
        //权限提示
        'rules_error' => [
            'code' => 103,
            'Message' => '没有权限'
        ],
        //注册失败提示
        'register_error' => [
            'code' => 104,
            'Message' => '注册失败'
        ],
        //注册成功提示
        'register_success' => [
            'code' => 200,
            'Message' => '注册成功'
        ],
    ],
];

