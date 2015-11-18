<?php namespace App\Http\Middleware;

use Closure, Session, Sentry;
use Illuminate\Contracts\Routing\Middleware;
use App\Group;
use App\Log;

class SentryAdminAccess
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request-> segments()[2]);
        // $name = $request->route()->getName();
        // dd($request->route()->getActionName());
        // dd($request->route()->getPath());
        // dd($name);
        // dd(get_class($request));
        // First make sure there is an active session
        if (!Sentry::check()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(route('sentinel.login'));
            }
        }

        // Now check to see if the current user has the 'admin' permission
        if (Sentry::getUser()->hasAccess('admin')) {
            if ($request->ajax()) {
                return $next($request);    
                // return response('Unauthorized.', 401);
            } else {
                // Session::flash('error', trans('Sentinel::users.noaccess'));
                return $next($request);
                // return redirect()->route('sentinel.login');
            }
        }
        // dd(get_class(Sentry::getUser()));
        if ( !Sentry::getUser()->hasAccess('admin', false))
        {
            // dd(\Sentry::getUser()->getGroups()[0]->pivot->group_id);
            //ambil group_id lewat user_id -> lewat pivot users_group
            $group_id=\Sentry::getUser()->getGroups()[0]->pivot->group_id;
            // dd(\Sentry::getUser()->toArray());
            // dd($group_id);
            //melalui group model dengan id diatas => untuk mengambil akses menu  ( menghasilkan list akses menu)
            $akses_s = Group::find($group_id)->akses()->get()->toArray();
            // dd($akses_s);
            // $akses = Group::find($group_id)->akses->get()->toArray();
            // dd($akses_s);
            $config=\Config::get('arrayactions');
            $tables=\Config::get('tables');
            $tableSegment=$request->segment(3);
            $table_log=$tableSegment;
            // print_r($request->segment(1));
            // print_r($request->segment(2));
            // dd($table_log);
            $key_table=array_search($tableSegment, $tables);
            $pesan=''; 
            // print_r($tableSegment);
            // dd($key_table);

            // echo $akses;

            $currentRoute=$request->route()->getActionName();
            $currentRouteName=$request->route()->getName();
            // dd($request->route());
               // return $next($request);
            // dd($currentRouteName);
             // dd($currentRoute).'-----<br>';
            // echo "<pre>";
            // dd($akses_s);
            // echo "</pre>";
            //  dd($config);
            // print_r($currentRoute);echo '_currentRoute##';
            // print_r($currentRouteName);echo 'currentRouteName%%';
            // print_r($akses_s);
            foreach ($akses_s as $key => $akses) {
                // print_r($akses);
                // dd($akses);
                // echo 'loop';
                    //tandai segment true or false 
                        // $tandaSegment=false;
                        // foreach ($tables as $table) {
                        //     if ($table['id']==$akses['table_id']) {
                        //         $table_log=$table['table'];
                        //         if($tableSegment==$table['table'] ){
                        //             // echo "masuk tandaSegment";
                        //             // exit();
                        //             $tandaSegment=true;
                        //         }
                        //     }
                        // }

                    // $action=$value['controller'].'@'.$value['controller_method'];
                    $NamespaceAction= $config[$akses['arr_id']]['Controllers'].'@'.$config[$akses['arr_id']]['controller_method'];
                    $routeName=$config[$akses['arr_id']]['route_name'];
                    // $action=$value['controller'];

                    // if ($action==$currentRoute && $tandaSegment) {
                    if ( $currentRouteName == $routeName or $NamespaceAction==$currentRoute ) {
                            $pesan=$config[$akses['arr_id']]['ket'];
                            // echo $action.'--'.$currentRoute.'<br>';
                            // dd('cocok');
                            // print_r($akses);
                        if(  $akses['akses']==1 && $akses['table_id']==$key_table ){
                            // exit('masuk');
                            // var_dump(== $currentRoute  );
                            // var_dump(  $action );
                            // var_dump( $currentRoute == $action );
                            // exit();
                            // $log=new Log;
                            // $log->users_id=  \Sentry::getUser()->id;
                            // $log->group_id=  $group_id ;
                            // $log->arr_id=  $akses['arr_id'];
                            // $log->table=  $tableSegment;
                            // $log->action_name=  $config[$akses['arr_id']]['name'];
                            // $log->catatan=  'Ok';
                            // $log->save();
                            return $next($request);
                        }
                        // else{
                        //     // exit('tidak bisa');
                        //     // dd($table);
                        //   $log=new Log;
                        //   $log->users_id=  \Sentry::getUser()->id;
                        //   $log->groups_id=  $group_id ;
                        //   $log->arr_id=  $akses['arr_id'];
                        //   $log->table=  $table_log;
                        //   $log->action_name=  $config[$akses['arr_id']]['route_name'];
                        //   // $log->action_name=  $config[$akses['arr_id']]['route_name'];
                        //   $log->catatan=  'Gagal';
                        //   $log->save();
                        //     $response['code']=400;
                        //     $response['msg']="Anda tidak memiliki akses menu  tabel ".$table_log." (".$config[$akses['arr_id']]['route_name']."), Aksi : ".$config[$akses['arr_id']]['ket']."  ";
                        //     // return $response;
                        //     return response($response['msg'], 401);
                        //     // return $response;
                        // }
                    }
                /* jika route tidak ditemukan dalam list maka ijinkan ======================================================================*/
                // return $next($request);
                    // else{
                    //         return $next($request);
                    // }


            }
            $log=new Log;
            $log->users_id=  \Sentry::getUser()->id;
            $log->groups_id=  $group_id ;
            $log->arr_id=  $akses['arr_id'];
            $log->table=  $table_log;
            $log->action_name=  $config[$akses['arr_id']]['route_name'];
            // $log->action_name=  $config[$akses['arr_id']]['route_name'];
            $log->catatan=  'Gagal Aksi : '.$pesan;
            $log->save();
              $response['code']=400;
              $response['msg']="Anda tidak memiliki akses menu  tabel ".$table_log." (".$pesan."), Aksi : ".$pesan."  ";
              // return $response;
              return response($response['msg'], 401);
            // $log=new Log;
            // $log->users_id=  \Sentry::getUser()->id;
            // $log->group_id=  $group_id ;
            // $log->arr_id=  $akses['arr_id'];
            // $log->table=  $table;
            // $log->action_name=   $config[$akses['arr_id']].$config[$akses['route_name']];
            // $log->catatan=  'Gagal ';
            // $log->save();
            
            // return response('Unauthorized.', 401);
            $response['code']=400;
            $response['msg']="Anda tidak memiliki akses menu tabel ".$table_log." (".$config[$akses['arr_id']]['route_name']."), Aksi : ".$config[$akses['arr_id']]['ket']."  ";
            return response($response['msg'], 402);
            // return $response;

        }

        // All clear - we are good to move forward
        // return $next($request);
    }

}
