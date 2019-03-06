<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Validator;

class UserController extends Controller
{
	 /**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
    public function index()
    {
        $users = User::all();
        return view('user.show',['users'=> $users, 'users' => $users]);
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
    public function storeOrUpdate(Request $request)
    {
        $verifyUser = User::find($request->id);
        $user = new User();
 
        if($verifyUser == null){
 
            $name = $request->name;
            $email = $request->email; 
            $password = $request->password;
            $email_verified_at = $request->email_verified_at;
            $miles = $request->miles;
            $rut = $request->rut;
            return $rut;
            $role_id = Role::find($request->role_id);

            if(!(is_numeric($name)) and !(is_numeric($email))
            and !(is_numeric($password)) and !(is_numeric($rut))
            and is_numeric($miles) and $miles > 0
            and $role_id != null){

                $user->updateOrCreate([
                    'name' => $name, 
                    'email' => $email, 
                    'password' => $password,
                    'email_verified_at' => $email_verified_at,
                    'miles' => $miles,
                    'rut' => $rut,
                    'role_id' => $request->role_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
            
        }
        else{

            $name = $request->name;
            $email = $request->email; 
            $password = $request->password;
            $email_verified_at = $request->email_verified_at;
            $miles = $request->miles;
            $rut = $request->rut;
            $role_id = Role::find($request->role_id);

            if(!(is_numeric($name)) and !(is_numeric($email))
            and !(is_numeric($password)) and !(is_numeric($rut))
            and is_numeric($miles) and $miles > 0
            and $role_id != null){

                $user->updateOrCreate([
                    'id' => $request->id
                ],
                [
                    'name' => $name, 
                    'email' => $email, 
                    'password' => $password,
                    'email_verified_at' => $email_verified_at,
                    'miles' => $miles,
                    'rut' => $rut,
                    'role_id' => $request->role_id
     
                ]);

            }

            else{
                return "Error en los parametros ingresados";
            }
        }
 
        return User::all();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::find($id);
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
        $user = User::find($id);
        $user->delete();
        return "Se ha eliminado un usuario";
    }
}
