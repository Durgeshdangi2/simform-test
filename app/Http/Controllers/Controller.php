<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Function for return current route and route controller.
     *
     * @return array
     */
    public function getOptions()
    {
        $options = [];
        $options['route_name'] = Route::current()->getName();;
        $options['route_controller'] = str_replace('.' . self::method(), '', self::name());
        return $options;
    }

    /**
     * Function for getting current route name.
     *
     * @return string
     */
    public static function name(): string
    {
        return Route::current()->getName();
    }

    /**
     * Function for getting current controller method.
     *
     * @return string
     */
    public static function method(): string
    {
        return substr(Route::currentRouteAction(), strpos(Route::currentRouteAction(), "@") + 1);
    }
}
