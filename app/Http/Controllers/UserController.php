<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $data = DB::table('users')
                ->select('id', 'name', 'email', 'created_at', 'updated_at')
                ->orderBy('created_at');

            return datatables()->of($data)
                ->addcolumn('action', function(){
                    return '
                    <a class="btn btn-xs btn-success edit" title="edit"> </a>';
                })
                ->addcolumn('delete', function(){
                    return '
                    <a class="btn btn-xs btn-danger delete" title="delete">  </a>';
                })->rawcolumns(['delete'=> 'delete', 'action'=>'action'])
                ->make(true);
        }
        return view('auth.showUsers');
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
        $validator = Validator::make($request->all(), [
            'user'=>'required',
            'email'=>'required'
    ]);

        if($validator->fails()){
            return response()->json(['errors'=> $validator->errors()->all()]);
        }

        $user = User::find($request->input('id'));

        $user->name = $request->input('user');
        $user->email = $request->input('email');
        $user->save();

        return response()->json(['success'=>'Data is successfully added']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete($id);

        return response()->json([

            'success' => 'Record deleted successfully!'
        ]);
    }
}
