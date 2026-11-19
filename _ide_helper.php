<?php
// ============================================================================
// IDE HELPER PARA LARAVEL 12 (PREVIENE ERRORES DE DIAGNÓSTICO EN EDITORES)
// ============================================================================
namespace {
    if (!function_exists('route')) {
        function route($name, $parameters = [], $absolute = true) { return ''; }
    }
    if (!function_exists('config')) {
        function config($key = null, $default = null) { return ''; }
    }
    if (!function_exists('asset')) {
        function asset($path, $secure = null) { return ''; }
    }
    if (!function_exists('csrf_token')) {
        function csrf_token() { return ''; }
    }
    if (!function_exists('auth')) {
        function auth($guard = null) { return null; }
    }
    if (!function_exists('response')) {
        function response($content = '', $status = 200, array $headers = []) { return null; }
    }
    if (!function_exists('redirect')) {
        function redirect($to = null, $status = 302, $headers = [], $secure = null) { return null; }
    }
    if (!function_exists('view')) {
        function view($view = null, $data = [], $mergeData = []) { return null; }
    }
    if (!function_exists('request')) {
        function request($key = null, $default = null) { return null; }
    }
    if (!function_exists('public_path')) {
        function public_path($path = '') { return ''; }
    }
    if (!function_exists('base_path')) {
        function base_path($path = '') { return ''; }
    }
}
