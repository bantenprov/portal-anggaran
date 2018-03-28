<?php

namespace Bantenprov\Anggaran\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BudgetAbsorption\Facades\AnggaranFacade;

/* Models */
use Bantenprov\Anggaran\Models\Bantenprov\Anggaran\Anggaran;
use Bantenprov\GroupEgovernment\Models\Bantenprov\GroupEgovernment\GroupEgovernment;
use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\SectorEgovernment;
use App\User;

/* Etc */
use Validator;

/**
 * The AnggaranController class.
 *
 * @package Bantenprov\Anggaran
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AnggaranController extends Controller
{  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $group_egovernmentModel;
    protected $sector_egovernment;
    protected $anggaran;
    protected $user;

    public function __construct(Anggaran $anggaran, GroupEgovernment $group_egovernment,SectorEgovernment $sector_egovernment, User $user)
    {
        $this->anggaran      = $anggaran;
        $this->group_egovernmentModel    = $group_egovernment;
        $this->sector_egovernment    = $sector_egovernment;
        $this->user             = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->anggaran->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->anggaran->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->with('group_egovernment')->with('sector_egovernment')->with('user')->paginate($perPage);

        /*foreach($response as $group_egovernment){
            array_set($response->data, 'group_egovernment', $group_egovernment->group_egovernment->label);
        }

        foreach($response as $sector_egovernment){
            array_set($response->data, 'sector_egovernment', $sector_egovernment->sector_egovernment->label);
        }

        foreach($response as $user){
            array_set($response->data, 'user', $user->user->name);
        }*/

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $group_egovernment = $this->group_egovernmentModel->all();
        $sector_egovernment = $this->sector_egovernment->all();
        $users = $this->user->all();

        foreach($users as $user){
            array_set($user, 'label', $user->name);
        }

        $response['group_egovernment'] = $group_egovernment;
        $response['sector_egovernment'] = $sector_egovernment;
        $response['user'] = $users;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anggaran = $this->anggaran;

        $validator = Validator::make($request->all(), [
            'group_egovernment_id'      => 'required',
            'sector_egovernment_id'     => 'required',
            'user_id'                   => 'required',
            'label'                     => 'required',
            'description'               => 'required',
        ]);

        if($validator->fails()){
            $check = $anggaran->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $anggaran->group_egovernment_id = $request->input('group_egovernment_id');
                $anggaran->sector_egovernment_id = $request->input('sector_egovernment_id');
                $anggaran->user_id = $request->input('user_id');
                $anggaran->label = $request->input('label');
                $anggaran->description = $request->input('description');
                $anggaran->save();

                $response['message'] = 'success';
            }
        } else {
            $anggaran->group_egovernment_id = $request->input('group_egovernment_id');
            $anggaran->sector_egovernment_id = $request->input('sector_egovernment_id');
            $anggaran->user_id = $request->input('user_id');
            $anggaran->label = $request->input('label');
            $anggaran->description = $request->input('description');
            $anggaran->save();
            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggaran = $this->anggaran->findOrFail($id);

        $response['anggaran'] = $anggaran;
        $response['group_egovernment'] = $anggaran->group_egovernment;
        $response['sector_egovernment'] = $anggaran->sector_egovernment;
        $response['user'] = $anggaran->user;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggaran = $this->anggaran->findOrFail($id);

        array_set($anggaran->user, 'label', $anggaran->user->name);

        $response['anggaran'] = $anggaran;
        $response['group_egovernment'] = $anggaran->group_egovernment;
        $response['sector_egovernment'] = $anggaran->sector_egovernment;
        $response['user'] = $anggaran->user;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = array();
        $message  = array();

        $anggaran = $this->anggaran->findOrFail($id);
        {
            $validator = Validator::make($request->all(), [
                'label'                 => 'required',
                'description'           => 'required',
                'group_egovernment_id'  => 'required',
                'sector_egovernment_id' => 'required',
                'user_id'               => 'required',
                'link'                  => 'required',
            ]);

             if($validator->fails()){

                foreach($validator->messages()->getMessages() as $key => $error){
                    foreach($error AS $error_get) {
                        array_push($message, $error_get. "\n");
                    }                
                } 
                $response['message'] = $message;

            } else {
                $anggaran->label                    = $request->input('label');
                $anggaran->description              = $request->input('description');
                $anggaran->link                     = $request->input('link');
                $anggaran->group_egovernment_id     = $request->input('group_egovernment_id');
                $anggaran->sector_egovernment_id    = $request->input('sector_egovernment_id');
                $anggaran->user_id                  = $request->input('user_id');
                $anggaran->save();

                $response['message'] = 'success';
            }

        $response['status'] = true;

        return response()->json($response);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anggaran  $anggaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggaran = $this->anggaran->findOrFail($id);

        if ($anggaran->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
