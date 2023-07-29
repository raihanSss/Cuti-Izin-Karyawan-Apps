<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    $users = DB::table('users')
    // ->join('karyawan','users.id','=','karyawan.user_id')
    ->select('users.id','users.name','users.email','users.password','users.role')
    ->get();
    
    return view('pages.users.index',['users' => $users]);
}



public function create($id)

    {
        $users = DB::table('users')
        // ->join('karyawan','users.id','=','karyawan.user_id')
        ->select('users.id','users.name','users.email','users.password','users.role')
        ->where('users.id',$id)
        ->get();

        return view('pages.users.FormTambah',['users' => $users]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'role' => 'nullable',
        ]);

        $validatedData['user_id'] = auth()->user()->id;


        User::create($validatedData);
        return redirect('views/users')->with('sukses', 'Data user berhasil ditambah');
    }

    public function save(Request $request){
        if($request->ajax()){
            if(auth()->user()->id){
                // $user_id = $request->post();
//                dd($request->post('user_id'));
                $users = DB::table('users')
                    // ->selectRaw('count(1) as count_user')
                    // ->where('user_id', $request->post('user_id'))
                    ->get();
                if($users[0]->count_user === 1){
                    return response()->json([
                       "status" => -1,
                       "data" => [
                           "success" => 0
                       ],
                       "message" => "Data sudah ada di dalam database!"
                    ]);
                }else{
                    DB::table('users')->insert(
                       [
                           'user_id' => $request->post('user_id'),
                           'name' => $request->post('name'),
                           'email' => $request->post('email'),
                           'password' => $request->post('password'),
                           'role' => $request->post('role')
                       ]
                    );
                    return response()->json([
                        "status" => -1,
                        "data" => [
                            "success" => 1
                        ],
                        "message" => "Berhasil menambahkan data!"
                    ]);
                }
            }
        }
    }

}