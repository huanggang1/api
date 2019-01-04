<?php

//公共方法

/**
 * 返回参数记录日志
 * @param type $code
 * @param type $data
 * @param type $request
 * @return type
 */
function ajaxReturn($code, $request, $data = "") {
    $return = [
        'result' => $code,
        'data' => $data
    ];
//参数日志
//file_put_contents('log/crm_return_' . date('Y-m-d') . '.txt', "[ " . date('Y-m-d H:i:s') . "] : " . json_encode($return, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);
    file_put_contents(base_path() . '/log/crm_return_' . date('Y-m-d') . '.txt', "[ " . date('Y-m-d H:i:s') . " method : " . $request->route()[1]['as'] . "] : " . json_encode($return, JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);
    return response()->json($return);
}
/**
 * 请求日志记录
 * @param type $request
 */
function requestLog($request) {
    file_put_contents(base_path() . '/log/crm_request_' . date('Y-m-d') . '.txt', "[ " . date('Y-m-d H:i:s') . " method : " . $request->route()[1]['as'] . "] : " . json_encode($request->input(), JSON_UNESCAPED_UNICODE) . PHP_EOL, FILE_APPEND);
}
