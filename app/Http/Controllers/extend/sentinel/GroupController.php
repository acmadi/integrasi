<?php   namespace App\Http\Controllers\extend\sentinel;

use  Sentinel\Controllers\GroupController as SentinelGroup;

use Vinkla\Hashids\HashidsManager;
// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\Paginator;
// use Sentinel\FormRequests\GroupCreateRequest ;
use App\FormRequests\GroupCreateRequest ;
use Sentinel\Repositories\Group\SentinelGroupRepositoryInterface;
// use Sentinel\Traits\SentinelRedirectionTrait;
    // use Sentinel\Traits\AchmadiRedirectionTrait;
    use App\Traits\AchmadiRedirectionTrait;

use Sentinel\Traits\SentinelViewfinderTrait;
use View, Input, Redirect;

use Illuminate\Http\Request;
use App\Akses;
use App\Group;

class GroupController extends SentinelGroup
{

    /**
     * Traits
     */
    // use SentinelRedirectionTrait;
    use AchmadiRedirectionTrait;
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
    //     // Paginate the existing groups
    //     $groups      = $this->groupRepository->all();
    //     $perPage     = 15;
    //     $currentPage = Input::get('page') - 1;
    //     $pagedData   = array_slice($groups, $currentPage * $perPage, $perPage);
    //     $groups      = new Paginator($pagedData, $perPage, $currentPage);

    //     return $this->viewFinder('Sentinel::groups.index', ['groups' => $groups]);
    // }

    public function getGroups($value='')
    {
       

        /* supply data=======================================================-============================*/
        $groups_all       = $this->groupRepository->all();
        // dd(count($groups));
        $perPage     = 10;
        $currentPage = Input::get('page') - 1;
        $pagedData   = array_slice($groups_all, $currentPage * $perPage, $perPage);
        $groups       = new Paginator($pagedData, $perPage, $currentPage);

        $rows=[];
        
        foreach ($groups as $i => $group){
           
                $permissions = $group->getPermissions();
                $keys = array_keys($permissions);
                $last_key = end($keys);
                $v_permisson='';
                // dd($permissions);
                foreach ($permissions as $key => $value){
                    // dd($key);
                     $v_permisson .=ucfirst($key) . ($key == $last_key ? '' : ', ') ;
                   }
                $rows[$i]['id']=$group->hash;
                $rows[$i]['name']=$group->name;
                $rows[$i]['permission']=$v_permisson;
                $rows[$i]['token']=\Session::getToken();
                $i++;
        }
        /* return for view =======================================================1*/
        $total=count($groups_all);
        $data['rows']=$rows;
        $data['total']=$total;
        return $data;
    }
    public function EditPermission($hash)
    {
        // dd('EditAkses');
        $data=\Request::all();
        // dd($data);
        $configPermission=\Config::get('arrayactions');
        // dd($configPermission);
        // Decode the hashid
        
        $has_id = $this->hashids->decode($hash);//group id
        // dd($has_id);
        // Pull the group from storage
        $group = $this->groupRepository->retrieveById($has_id)[0];
        // dd($group);
        $tables=\Config::get('tables');

    // dd(get_class($this->groupRepository));
        // $permit=$group->akses()->where('table_id','=',$table_id)->get();
        $permit=$group->akses()->get();
        // dd($permit);
        return view('Sentinel::groups.formPermission')->with('config_permits',$configPermission)->with('tables',$tables)->with('permissions',$permit)
        ->with('group_id',$hash);
        // ->with('group_id',$has_id);
    }
    public function CreateUpdatePermission(Request $request,$hash)
    {
        // dd($hash);
        // print_r($request->get('data')[0]);
        // dd($request->all()['data'][0]);
        // $user =Akses::find(16);
        foreach ($request->all()['data'] as  $data) {
            // dd($data);
            // $akses=Akses::find($data['id']);
            
            // foreach ($datas as $key => $data) {
                    // echo $key.'---';
                    // echo "<pre> $i";
                    // var_dump($data);
                // $group_id=$data['group_id'];
                // $table_id=$data['table_id'];
                
                // if (isset($data['akses'])) {
                //     # code...
                // }

                // if (!empty($data['id'])) {
                    foreach ($data as $key => $datax) {
                        // dd($datax);
                        // dd($datax['id']);

                        $akses=Akses::find($datax['id']);
                        // dd($akses);
                        $group_id=$this->hashids->decode($datax['group_id'])[0];
                        $datax['akses']=isset($datax['akses'])?1:0;
                        if ($akses) {
                            // dd('update');
                            // unset($data['id']);
                            // echo "##Update##";
                            // print_r($data);

                            $akses->group_id=$group_id;
                            // $akses->group_id=$this->hashids->decode($datax['group_id']);
                            $akses->akses=$datax['akses'];
                            $akses->arr_id=$datax['arr_id'];
                            $akses->table_id=$datax['table_id'];
                            $akses->save();
                        }
                        else{

                            // dd('create');
                            $datax['group_id']=$group_id;
                            Akses::create($datax);
                        }
                    }
                // }
                // else{
                //     // dd($data);
                //     // $group=$data['group_id'];
                //     foreach ($data as $key => $datax) {
                //         // unset($data[$key]['id']);
                //         // dd($datax['group_id'].'--'. $data[$key]['group_id']);
                //         // echo ' no '.$key.'--'.$this->hashids->decode($datax['group_id'])[0];
                //         // $this->hashids->decode($datax['group_id'])[0];
                //         // $data[$key]['akses']=(isset($datax['akses']) && $datax['akses']=='on')?'1':'0';
                //         // $data[$key]['group_id']=$this->hashids->decode($datax['group_id'])[0];
                //         $datax['akses']=isset($datax['akses'])?1:0;
                //         $datax['group_id']=$this->hashids->decode($datax['group_id'])[0];
                //     Akses::create($datax);
                //     }
                //     // $data['group_id']=$this->hashids->decode($data['group_id'])[0];
                //     // echo "##create##";
                //     // dd($data);
                // }

            // }


        }
        // dd($hash);
        // $groupName=Group::find($this->hashids->decode($hash));
        // dd($this->hashids->decode($hash));
        $groupName=Group::find($this->hashids->decode($hash)[0]);
        // $tableName=\Config::get('tables')[ $table_id];
        // var_dump($tableName);
        // dd($groupName);

        $data['msg']='Update akses menu Group : '.$groupName['name'].'  selesai';
        $data['code']='200';
        return $data;

        // exit();
            // return redirect()->back();

    }

    /**
     * Show the form for creating a group
     *
     * @return View
     */
    // public function create()
    // {
    //     return $this->viewFinder('Sentinel::groups.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @return Redirect
     */
    // public function store(GroupCreateRequest $request)
    // {
    //     parent::store($request);
    // }
    public function storeX(GroupCreateRequest $request)
    {
        parent::store($request);
        // // Gather input
        // $data = Input::all();

        // // Store the new group
        // // dd(get_class($this->groupRepository));
        // $result = $this->groupRepository->store($data);
        // // dd($result);
        // return $this->redirectViaResponse('groups_store', $result);
    }


    /**
     * Display the specified group
     *
     * @return View
     */
    // public function show($hash)
    // {
    //     // Decode the hashid
    //     $id = $this->hashids->decode($hash)[0];

    //     // Pull the group from storage
    //     $group = $this->groupRepository->retrieveById($id);

    //     return $this->viewFinder('Sentinel::groups.show', ['group' => $group]);
    // }

    /**
     * Show the form for editing the specified group.
     *
     * @return View
     */
    // public function edit($hash)
    // {
    //     // Decode the hashid
    //     $id = $this->hashids->decode($hash)[0];

    //     // Pull the group from storage
    //     $group = $this->groupRepository->retrieveById($id);

    //     return $this->viewFinder('Sentinel::groups.edit', [
    //         'group' => $group,
    //         'permissions' => $group->getPermissions()
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @return Redirect
     */
    // public function update($hash)
    // {
    //     // Gather Input
    //     $data = Input::all();

    //     // Decode the hashid
    //     $data['id'] = $this->hashids->decode($hash)[0];

    //     // Update the group
    //     $result = $this->groupRepository->update($data);

    //     return $this->redirectViaResponse('groups_update', $result);
    // }

    /**
     * Remove the specified group from storage.
     *
     * @return Redirect
     */
    // public function destroy($hash)
    // {
    //     // Decode the hashid
    //     $id = $this->hashids->decode($hash)[0];

    //     // Remove the group from storage
    //     $result = $this->groupRepository->destroy($id);

    //     return $this->redirectViaResponse('groups_destroy', $result);
    // }

}