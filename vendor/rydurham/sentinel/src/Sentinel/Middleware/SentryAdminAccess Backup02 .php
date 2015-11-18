<?php namespace Sentinel\Middleware;

use Closure, Session, Sentry;
use Illuminate\Contracts\Routing\Middleware;
use App\Group;

class SentryAdminAccess implements Middleware {

    /**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        // exit();
        // First make sure there is an active session
        // dd(debug_print_backtrace(2));

        // dd(Sentry::check());
        if ( !Sentry::check())
        {
        // return $next($request);
            exit('tidak login');
            if ($request->ajax())
            {
                return response('Unauthorized.', 401);
            }
            else
            {
                return redirect()->guest(route('sentinel.login'));
            }
        }

        // Now check to see if the current user has the 'admin' permission
         // dd(get_class(Sentry::getUser()));
         // dd(Sentry::getUser()->hasAccess('admin'));//Sentinel\Models\User

        if (  Sentry::getUser()->hasAccess('admin'))
        {
            dd('admin');
            return $next($request);

        }
        // dd($request->route()->getActionName());//"App\Http\Controllers\ExcelController@getIndex"

        if ( !Sentry::getUser()->hasAccess('admin'))
        {
           

            // echo 'masukkk bukan admin<br>';
            // dd(\Sentry::getUser()->getGroups()[0]->pivot->group_id);
            //ambil group_id lewat user_id -> lewat pivot users_group
            $group_id=\Sentry::getUser()->getGroups()[0]->pivot->group_id;
            // dd($group_id);
            //melalui group model dengan id diatas => untuk mengambil akses menu  ( menghasilkan list akses menu)
            $akses = Group::find($group_id)->akses()->get()->toArray();
            // $akses = Group::find($group_id)->akses->get()->toArray();
            // dd($akses);
            // echo $akses;
            $currentRoute=$request->route()->getActionName();
             // dd($currentRoute).'-----<br>';

            foreach ($akses as $key => $value) {

                    $action=$value['controller'].'@'.$value['controller_method'];
                    // $action=$value['controller'];
                    if( $action==$currentRoute && $value['akses']==1){
                        // var_dump( $currentRoute == $action );
                        return $next($request);
                    }
            }

            
            return response('Unauthorized.', 401);
            
            

        }
        // dd(Sentry::getUser()->hasAccess('admin'));
        // dd(Sentry::getId());
        // dd(Sentry::getGroups());

        // All clear - we are good to move forward
        // return $next($request);
        if ($request->ajax())
        {
            dd('ajaxx');
            return response('Unauthorized.', 401);
        }
        else
        {
            Session::flash('error', trans('Sentinel::users.noaccess'));
            return redirect()->route('sentinel.login');
        }
	}

}
