<?

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;

class SetLanguage
{
    public function handle($request, Closure $next)
    {
        if ($request->hasCookie('lang')) {
            $lang = $request->cookie('lang');
        } else {
            $languages = explode(',', $request->header('Accept-Language'));
            $languages = explode(';', $languages[0]);
            $lang = explode('-', $languages[0])[0];
        }

        app()->setLocale($lang);

        $response = $next($request);

        $cookie = Cookie::make('lang', $lang, null);

        $response->withCookie($cookie);

        return $response;
    }
}
