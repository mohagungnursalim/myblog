<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (Auth::user()->username == 'Moh.Agung') 
        {
            $users = User::select("*")
            ->whereNotNull('last_seen')
            ->orderBy('last_seen', 'DESC');

            if(request('search'))
            {
            $users->where('username', 'like', '%' . request('search'). '%')->
                orWhere('name','like','%' . request('search'). '%')->
                orWhere('email','like','%' . request('search'). '%');
                
            }

            $data = $users->paginate(10);
            return view('dashboard.userlist.index',compact('data'));

       
      
        }else {
            
            $request->session(Alert::error('error','Maaf anda tidak memiliki akses ke halaman tersebut'));

            return redirect('/dashboard');
        }
       
           
           
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
    
        // $validatedData = $request->validate([
 
        //      'is_admin' => 'required|max:2'
        // ]);
 
        // User::create($validatedData);
 
        // $request->session(Alert::success('success', 'Admin has been added!'));
 
        // return redirect('/dashboard/userlist');
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
       

        if (Auth::user()->username == 'Moh.Agung')  
        {
            $validatedData = $request->validate([
                'is_admin'=> 'required'
           ]);    
    
           User::whereId($id)->update($validatedData);
    
           $request->session(Alert::success('success', 'Access has been changed!'));
           return redirect('/dashboard/manajemen-user');
        }else{
            $request->session(Alert::error('error','Maaf anda tidak memiliki akses ke halaman tersebut'));

            return redirect('/dashboard');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        if (Auth::user()->username == 'Moh.Agung') 
        {
            User::destroy($id);

            $request->session(Alert::success('success', 'User has been deleted!'));
            return redirect('/dashboard/manajemen-user');
        } else{
            $request->session(Alert::error('error','Maaf anda tidak memiliki akses ke halaman tersebut'));

            return redirect('/dashboard');
        }
    }

    public function navsetting()
    {
        return view('dashboard.navsetting.index',[
            'title' => 'Navbar setting'
        ]);
    }

    public function navadd()
    {
        
        
    }
}
