<?php namespace Sentinel\Controllers;//GroupController

use Vinkla\Hashids\HashidsManager;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\Paginator;
use Sentinel\FormRequests\GroupCreateRequest;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
use Sentinel\Traits\SentinelRedirectionTrait;
use Sentinel\Traits\SentinelViewfinderTrait;
use View, Input, Redirect;

use Illuminate\Http\Request;
use App\Akses;
use App\Group;

class GroupController extends BaseController
{

    /**
     * Traits
     */
    use SentinelRedirectionTrait;
    use SentinelViewfinderTrait;

    /**
     * Constructor
     */
    public function __construct(
        SentinelGroupRepositoryInterface $groupRepository,
        HashidsManager $hashids
    ) {
        $this->groupRepository = $groupRepository;
        $this->hashids         = $hashids;
        // debug_print_backtrace(6);
        // You must have admin access to proceed
        $this->middleware('sentry.admin');
    }

    /**
     * Display a paginated list of all current groups
     *
     * @return View
     */
    // public function index()
    // {
 
    //     // Paginate the existing users
    //     // exit('ach');
    //     $groups      = $this->groupRepository->all();
    //     // dd(get_class($this->groupRepository));
    //     // print_r($groups);
    //     // dd($groups);


    //     $perPage     = 15;
    //     $currentPage = Input::get('page') - 1;
    //     $pagedData   = array_slice($groups, $currentPage * $perPage, $perPage);
    //     $groups      = new Paginator($pagedData, $perPage, $currentPage);
    //     dd($groups->toArray());

    //     return $this->viewFinder('Sentinel::groups.index', ['groups' => $groups]);
    // }
      public function index()
    {
 
        // Paginate the existing users
        // exit('ach');
        $groups      = $this->groupRepository->all();
        // dd(get_class($this->groupRepository));
        // print_r($groups);
        // dd($groups);


        $perPage     = 15;
        $currentPage = Input::get('page') - 1;
        $pagedData   = array_slice($groups, $currentPage * $perPage, $perPage);
        $groups      = new Paginator($pagedData, $perPage, $currentPage);
        // dd($groups->toArray());

        return $this->viewFinder('Sentinel::groups.index', ['groups' => $groups]);
    }
    public function DataGroups()
    {
        // return 'db';
       $groups      = $this->groupRepository->all();
        // dd(get_class($this->groupRepository));
        // print_r($groups);
        // dd($groups);


        $perPage     = 15;
        $currentPage = Input::get('page') - 1;
        $pagedData   = array_slice($groups, $currentPage * $perPage, $perPage);
        $groups      = new Paginator($pagedData, $perPage, $currentPage);
        // dd($groups);
        $data['total']=count($groups->toArray());
        // dd($groups->toArray());
        $datagrab=$groups->toArray()['data'];
        foreach ($groups as $key => $group) {

           // dd( array_flip( $group->getPermissions()));
            $datagrab[$key]['id']=$group->hash;
            $datagrab[$key]['permissions']= implode(",",array_flip( $group->getPermissions()));
        }
        $data['rows']=$datagrab;
        return json_encode($data);
        // dd($data);

    }

    /**
     * Show the form for creating a group
     *
     * @return View
     */
    public function create()
    {
        return $this->viewFinder('Sentinel::groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Redirect
     */
    // public function store(GroupCreateRequest $request)
    public function store(GroupCreateRequest $request)
    {
        // Gather input
        $data = Input::all();

        // Store the new group
        $result = $this->groupRepository->store($data);
        // dd($result);

        return $this->redirectViaResponse('groups_store', $result);
    } 

    /**
     * Display the specified group
     *
     * @return View
     */
    public function show($hash)
    {
        $arrayactions=\Config::get('arrayactions');
        // $arrayactions=\Config::get('app.timezone');;
        // dd($arrayactions);
        // Decode the hashid
        $id = $this->hashids->decode($hash)[0];

        // Pull the group from storage
        $group = $this->groupRepository->retrieveById($id);

        // dd($group->akses()->where('table_id','=',1)->get());
        $listAkses=$this->ListAkses($group);

        return $this->viewFinder('Sentinel::groups.show', ['group' => $group])->with('listAkses',$listAkses);
    }

    public function ListAkses($group='')
    {
        // $group=$group->akses->toArray();
        $arrayactions=\Config::get('arrayactions');
        $tables=\Config::get('tables');
        return $this->viewFinder('Sentinel::groups.listAkses', ['group' => $group])->with('dataakses',$arrayactions)->with('tables',$tables);

        
    }
    public function ListDB()
    {
        $result['total']=0;
        $result['rows']='';

        $data=\Request::all();
        if(\Request::get('hash')){
            // dd($data);
            $tables=\Config::get('tables');
            $hash = $this->hashids->decode(\Request::get('hash'))[0];
            $i=0;
            foreach ($tables as $table) {
                $table['hash']=\Request::get('hash');
                $tables[$i]=$table;$i++;
            }
            // $tables['hash']=\Request::get('hash');
            // dd($tables);
            return $tables;
        }
        else{

            return json_encode($result);
        }



    }
    public function EditAkses()
    {
        // dd('EditAkses');
        $data=\Request::all();
        // dd($data);
        $arrayactions=\Config::get('arrayactions');
        // $arrayactions=\Config::get('app.timezone');;
        // dd($arrayactions);
        // Decode the hashid
        $table_id = \Request::get('table_id');
        $has_id = $this->hashids->decode(\Request::get('hash'))[0];//group id

        // Pull the group from storage
        $group = $this->groupRepository->retrieveById($has_id);

        $arrayactions=\Config::get('arrayactions');

        $aksess=$group->akses()->where('table_id','=',$table_id)->get();
        return view('Sentinel::groups.listAksesx')->with('dataakses',$arrayactions)->with('aksess',$aksess)
        ->with('table_id',$table_id)->with('group_id',$has_id);
        // $listAkses=$this->ListAkses($group);
        
    }
    /**
     * Show the form for editing the specified group.
     *
     * @return View
     */
    public function edit($hash)
    {
        // Decode the hashid
        $id = $this->hashids->decode($hash)[0];

        // Pull the group from storage
        $group = $this->groupRepository->retrieveById($id);

        return $this->viewFinder('Sentinel::groups.edit', [
            'group' => $group,
            'permissions' => $group->getPermissions()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Redirect
     */
    public function update($hash)
    {
        // Gather Input
        $data = Input::all();

        // Decode the hashid
        $data['id'] = $this->hashids->decode($hash)[0];

        // Update the group
        $result = $this->groupRepository->update($data);

        return $this->redirectViaResponse('groups_update', $result);
    }

    /**
     * Remove the specified group from storage.
     *
     * @return Redirect
     */
    public function destroy($hash)
    {
        // dd('destrpo');
        // Decode the hashid
        $id = $this->hashids->decode($hash)[0];

        // Remove the group from storage
        $result = $this->groupRepository->destroy($id);
        dd($result);
        

        return $this->redirectViaResponse('groups_destroy', $result);
    }

    public function insertakses(Request $request)
    {
        // print_r($request->get('data')[0]);
        // print_r($request->all());
        // exit();
        // $user =Akses::find(16);
        // echo  ($user==null)?'null': 'ada';
        // print_r($user);
        // exit();

        // $user->akses = '5';
        // $user->controller = 'cobaController';
        // $user->save();
        // print_r($user->save());
        // exit();
        // var_dump($request->all()['data']);
        $i=1;
        $group_id='';
        $table_id='';

        foreach ($request->all()['data'] as  $datas) {
            // dd($data);
            // $akses=Akses::find($data['id']);
            
            foreach ($datas as  $data) {
                    // echo "<pre> $i";
                    // var_dump($data);
                $group_id=$data['group_id'];
                $table_id=$data['table_id'];

                $akses=Akses::find($data['id']);
                if ($akses) {
                    // unset($data['id']);
                    // echo "##Update##";
                    // print_r($data);
                    $akses->group_id=$data['group_id'];
                    $akses->akses=$data['akses'];
                    $akses->arr_id=$data['arr_id'];
                    $akses->table_id=$data['table_id'];
                    $akses->save();
                }
                else{
                    unset($data['id']);
                    // echo "##create##";
                    Akses::create($data);
                }
            $i++;

            }


        }
        $groupName=Group::find($group_id)->toArray();
        $tableName=\Config::get('tables')[ $table_id];
        // var_dump($tableName);
        // dd($groupName);

        $data['msg']='Update akses menu Group : '.$groupName['name'].' pada table :'. $tableName['table'].' selesai';
        $data['code']='200';
        return $data;

        // exit();
            // return redirect()->back();

    }
    public function UpdateAkses()
    {
        echo __function__;
    }
}