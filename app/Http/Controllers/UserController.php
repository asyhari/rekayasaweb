<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Http\Requests\UserRequest;
use Storage,Session,PDF;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_list = User::all();
        return view('user.index',compact('user_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $input = $request->all();

        //upload foto
        if($request->hasFile('fotoa')){
            $input['fotoa']  = $this->uploadFoto($request);
        }       

        //hash password
        $input['password'] = bcrypt($input['password']);

        User::create($input);        
        Session::flash('flash_message', 'Data user berhasil disimpan,');

        return redirect('user');
    }

    private  function uploadFoto(UserRequest $request){
         $fotoa = $request->file('fotoa');
            $ext  = $fotoa->getClientOriginalExtension();
            if($request->file('fotoa')->isValid()){
                $foto_name  = date('YmdHis'). ".$ext";
                $upload_path    = 'profilepics';
                $request->file('fotoa')->move($upload_path, $foto_name);
                return $foto_name;
            }
            return false;
    }

    private function hapusFoto(User $user){
          $exist   = Storage::disk('fotoa')->exists($user->fotoa);
          
            if(isset($teknisi->foto) && $exist){
                $delete = Storage::disk('fotoa')->delete($user->fotoa);
                    if($delete){
                        return true;
                    }
                 return false;
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {      
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {       
        $input   = $request->all();

       //cek apkah ada foto baru di form
         if($request->hasFile('fotoa')){
            //hapus foto lama 
           $this->hapusFoto($user);        
            //Upload foto baru
           $input['fotoa']   = $this->uploadFoto($request);            
        } 

        //cek ada pasword baru di form
        if ($request->has('password')) {
            // Hash password.
            $input['password'] = bcrypt($input['password']);
        } else {
            // Hapus password (password tidak diupdate).
            $input = array_except($input, ['password']);
        }

        $user->update($input);
        Session::flash('flash_message', 'Data user berhasil diupdate.');

        return redirect('user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    { 
        $this->hapusFoto($user);       
        $user->delete();
        Session::flash('flash_message', 'Data user berhasil dihapus.');
        Session::flash('penting', true);
        return redirect('user');
    }

    public function pdf()
    {
        $user_list= User::all();     
        $pdf = PDF::loadView('laporan.laporan_user',compact('user_list'));                      
        return $pdf->stream('lap_user.pdf');
    }


     public function cetak(){
        $user_list = User::all();
        return view('laporan.laporan_user', compact('user_list'));
    }
}
