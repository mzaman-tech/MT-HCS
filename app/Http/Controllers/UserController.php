<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers()
    {
        $users = User::select(['id', 'name', 'email', 'role', 'created_at']);
        return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    return '<a href="#view-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-folder-open"></i></a> <a href="#edit-'.$user->id.'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i></a> <a href="#delete-'.$user->id.'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i></a>';
                })
                ->editColumn('created_at', function ($user) {
                    return $user->created_at->format('Y/m/d H:i:s');
                })
                ->editColumn('role', function(User $user) {
                    return ($user->role == 10)? 'Project Administrator' : '';
                })
                ->removeColumn('id')
                ->make(true);
    }
    
}
