<?php

namespace KalebClark\RestToken;

use Closure;

class ProcessTokens
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         $app_key    = getenv('APP_KEY');
 
        /* Check to see if api_key exists at all
         * ===================================== */
        if(!$request->has('api_key')) {
            return response([
                'error' => [
                    'code'  => 'NO_KEY',
                    'description'   => 'Must have AUTH key'
                ]
            ], 401);
        } else {
            $api_key = $request->input('api_key');
            if($api_key != $app_key) {
                return response([
                    'error' => [
                        'code'  => 'INVALID_KEY',
                        'description' => 'Key is not valid'
                    ]
                ], 401);
            }
 
        }
        return $next($request);
    }
}
