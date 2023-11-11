<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use App\Models\users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageUploadTrait;




class UsersController extends Controller
{
    use ImageUploadTrait;

    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'image' => ['required', 'image', 'max:4192'],
            'phone' => ['required', 'digits:10'],
            'password' => ['required'],

        ]);
        $users = new User();
        $imagePath = $this->uploadImage($request, 'image', 'uploads');
        $users->image = $imagePath;

        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->password = bcrypt($request->password);
        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(user $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);

        return view('Admin.pages.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'digits:10'],
           'image' => ['nullable', 'image', 'max:4192'],


        ]);
        $users =  User::findOrFail($id);
        $imagePath = $this->updateImage($request, 'image', 'uploads', $users->image);
        $users->image = empty(!$imagePath) ? $imagePath : $users->image;

        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;

        $users->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        if($users->image >= 1)
        $this->deleteImage($users->image);
        $users->delete();
        
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
