<?php namespace Sentinel\Middleware;

use Closure, Session, Sentry;
use Illuminate\Contracts\Routing\Middleware;
use App\Group;
use App\Log;

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
        // exit('handle');
        // First make sure there is an active session
        // dd(debug_print_backtrace(2));
        // dd($request->segment(3));
        // dd($request->all());
        // dd(Sentry::check());
        if ( !Sentry::check())
        {
        // return $next($request);
            // exit('tidak login');
            if ($request->ajax())
            {
                // return response('Unauthorized.', 400);
                $response['code']=400;
                $response['msg']="Anda harus Login";
                // return $response;
                return response('Anda Harus Login lebih dahulu', 401);
                

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
            // dd('admin');
            return $next($request);

        }
        // dd($request->route()->getActionName());//"App\Http\Controllers\ExcelController@getIndex"

        if ( !Sentry::getUser()->hasAccess('admin'))
        {
           

            // echo 'masukkk bukan admin<br>';
            // dd(\Sentry::getUser()->getGroups()[0]->pivot->group_id);
            //ambil group_id lewat user_id -> lewat pivot users_group
            $group_id=\Sentry::getUser()->getGroups()[0]->pivot->group_id;
            // dd(\Sentry::getUser()->toArray());
            // dd($group_id);
            //melalui group model dengan id diatas => untuk mengambil akses menu  ( menghasilkan list akses menu)
            $akses = Group::find($group_id)->akses()->get()->toArray();
            // $akses = Group::find($group_id)->akses->get()->toArray();
            // dd($akses);
            $arrayactions=\Config::get('arrayactions');
            $tables=\Config::get('tables');
            $tableSegment=$request->segment(3);            

            // echo $akses;
            $currentRoute=$request->route()->getActionName();
             // dd($currentRoute).'-----<br>';
            // dd($akses);
            foreach ($akses as $key => $value) {
                // echo 'loop';
                    //tandai segment true or false 
                        $tandaSegment=false;
                        foreach ($tables as $table) {
                            if ($table['id']==$value['table_id']) {
                                if($tableSegment==$table['table'] ){
                                    // echo "masuk tandaSegment";
                                    // exit();
                                    $tandaSegment=true;
                                }
                            }
                        }

                    // $action=$value['controller'].'@'.$value['controller_method'];
                    $action= $arrayactions[$value['arr_id']]['Controllers'].'@'.$arrayactions[$value['arr_id']]['methode'];
                    // $action=$value['controller'];
                    // echo $action.'--'.$currentRoute.'<br>';

                    if ($action==$currentRoute && $tandaSegment) {
                        if(  $value['akses']==1){
                            // exit('masuk');
                            // var_dump( $currentRoute  );
                            // var_dump(  $action );
                            // var_dump( $currentRoute == $action );
                            // exit();
                            $log=new Log;
                            $log->users_id=  \Sentry::getUser()->id;
                            $log->group_id=  $group_id ;
                            $log->arr_id=  $value['arr_id'];
                            $log->table=  $tableSegment;
                            $log->action_name=  $arrayactions[$value['arr_id']]['name'];
                            $log->catatan=  'Ok';
                            $log->save();
                            return $next($request);
                        }
                        else{
                            // exit('tidak bisa');

                           $log=new Log;
                           $namaTabel=ucfirst($tableSegment);
                            $log->users_id=  \Sentry::getUser()->id;
                            $log->group_id=  $group_id ;
                            $log->arr_id=  $value['arr_id'];
                            $log->table=  $tableSegment;
                            $log->action_name=  $arrayactions[$value['arr_id']]['name'];
                            $log->catatan=  'Gagal';
                            $log->save();
                            $response['code']=404;
                            $response['msg']="Anda tidak memiliki akses menu pada Tabel \" $namaTabel \"!!!".$arrayactions[$value['arr_id']]['name'];
                            // return $response;
                            return response($response['msg'], 402);

                            // // exit();
                        }
                    }

            }
            // $log=new Log;
            // $log->users_id=  \Sentry::getUser()->id;
            // $log->group_id=  $group_id ;
            // $log->arr_id=  $value['arr_id'];
            // $log->table=  $table;
            // $log->action_name=  $arrayactions[$value['arr_id']]['name'];
            // $log->catatan=  'Gagal ';
            // $log->save();
            
            // return response('Unauthorized.', 401);
            return response('Anda Harus Login lebih dahulu', 401);

        }
        // dd(Sentry::getUser()->hasAccess('admin'));
        // dd(Sentry::getId());
        // dd(Sentry::getGroups());

        // All clear - we are good to move forward
        // return $next($request);
        if ($request->ajax())
        {
            // dd('ajaxx');
            return response('Unauthorized.', 401);
        }
        else
        {
            Session::flash('error', trans('Sentinel::users.noaccess'));
            return redirect()->route('sentinel.login');
        }
    }

}
