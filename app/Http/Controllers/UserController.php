<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if(filled($user->pic)) {
            $pic = $user->pic->file_path;
        }else{
            $pic = 'storage/public/profile/default.jpg';
        }
//        dd($pic);
        return view('dashboard.profile.index',compact('user','pic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrders()
    {
        $user = Auth::user();
        $orders = $user->orders;

        return view('dashboard.profile.myorders',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRole(Request $request,User $user)
    {
//        dd($user);
        if($user->roles()){
            $user->roles()->sync($request->role);
        }else {
            $user->roles()->attach($request->role);
        }

        return redirect()-> route('users.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsers()
    {
        $users = User::all();
        return view('dashboard.users.user_index',compact('users'));
    }

    public function assignmentRole(User $user)
    {
        return view('dashboard.users.assignment_role',compact('user'));
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
    public function update(Request $request,User $user,File $file)
    {
//        dd($request);
        $user->name = $request->name;
        $user->email = $request->user_email;
        $user->save();

        if(filled($user->pic)){
            storage::delete($user->pic->file_path.'/'.$user->pic->name);
            $user->pic()->delete();
        }
        if($request->hasFile('image')){

            $pic = $request->file('image');
            $path = 'profile';
            $fileName = time().'_'.$pic->getClientOriginalName();
            $pic->storeAs('public/'.$path,$fileName);

            $file = new File([
                'name'=> $fileName,
                'file_path'=> $path.'/'.$fileName,
            ]);
            $user->pic()->save($file);
        }
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.show');
    }
}
