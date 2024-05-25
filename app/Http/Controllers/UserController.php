<?php

namespace App\Http\Controllers;

use App\Exports\ExportUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{
    public function viewuser(Request $request)
    {
        $data = User::all();
        return view('user/user',compact('data'),[
            'data' => $data,

        ]);
    }

    public function create(Request $request)
    {
        return view('user/useradd',[
        ]);
    }

    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            // 'nama'=>'required',
            // 'username'=>'required',
            'jenis_kelamin'=>'required',
            // 'email'=>'required',
            'role'=>'required',
            'password'=>'required',   
            
        ]);
        //jika valid gagal
        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        //terima dan kirim
        
            $data['name']            = $request->nama;
            $data['username']        = $request->username;
            $data['password']        = $request->password;
            $data['jenis_kelamin']   = $request->jenis_kelamin;
            $data['email']           = $request->email;
            $data['role']            = $request->role;


        
        // create
        if($user = User::create($data)){
            if ($request->role === 'Administrator') {
                $user->assignRole('Administrator');
            }else if ($request->role === 'Operator'){
                $user->assignRole('Operator');            
            }else if ($request->role === 'Petugas'){
                $user->assignRole('Petugas');            
            }
            return redirect()->route('user')->with('success', 'Data User berhasil ditambahkan');
        }else{
            return redirect()->route('user')->with('fail', 'Data User gagal ditambahkan');
        }
    }
    
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        return view('user/useredit',[
            'data' => $data,
        ]);
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            // 'nama'=>'required',
            // 'username'=>'required',
            // 'jenis_kelamin'=>'required',
            // 'email'=>'required',
            // 'role'=>'required',
            // 'password'=>'required',          
        ]);
    
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $data = User::find($id);
        $data->name = $request->nama;
        $data->username = $request->username;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->email = $request->email;
        $data->role = $request->role;
        if($request->password){
            $data->password = Hash::make($request->password);
        }

        if($data->save()){

            if($data->role === 'Administrator')
            { 
                $data->assignRole('Administrator');
                return redirect()->route('user')->with('success-update', 'Data Siswa berhasil diedit');
            }
            else if ($data->role === 'Operator'){
                $data->assignRole('Administrator');
                return redirect()->route('user')->with('success-update', 'Data Guru berhasil diedit');            
            }
            else if ($data->role === 'Petugas'){
                $data->assignRole('Administrator');
                return redirect()->route('users')->with('success-update', 'Data Admin berhasil diedit');        
            }
        }

        else{
            return redirect()->route('user')->with('fail', 'Data Siswa gagal diedit');
        }
    }

    public function export(){
        return Excel::download(new ExportUser, "user.xlsx");
    }
    
    public function destroy($id)
    {
        //
        $data = user::findOrFail($id);
        $namasiswa = $data->id;

        if($data->delete()){
            return redirect()->back()->with('success-delete', 'Data Siswa '.$namasiswa.' berhasil dihapus');
        }else{
            return redirect()->back()->with('fail', 'Data Siswa gagal '.$namasiswa.' dihapus');
        }
    }
}
