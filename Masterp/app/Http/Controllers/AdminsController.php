<?php

namespace App\Http\Controllers;

use App\DataTables\AdminsDataTable;
use App\Models\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

use App\Traits\ImageUploadTrait;

class AdminsController extends Controller

{
    use ImageUploadTrait;











    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminsDataTable $dataTable)
    {
        return $dataTable->render('Admin.pages.admins.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.admins.create');
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
            'image' => ['required', 'image', 'max:4192'],
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'digits:10'],
            'password' => ['required'],
        ]);

        $admin = new admins();

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

        $admin->image = $imagePath;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);

        // $admin->password = Hash::make('password');
        $admin->save();

        toastr('Updated Successfully', 'success');
        return redirect()->route('admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show(admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = admins::findOrFail($id);

        return view('Admin.pages.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => [ 'image', 'max:4192'],
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'digits:10'],
        ]);

        // Check if the admin with the given email already exists
        $admin = admins::where('id', $id)->first();

        // If an admin with the email exists, it's an update; otherwise, create a new admin
        if ($admin) {
            // Perform update
            if ($request->hasFile('image')) {
                // Update image if a new one is provided
                $imagePath = $this->uploadImage($request, 'image', 'uploads');
                $admin->image = $imagePath;
            }

            $admin->name = $request->name;
            $admin->phone = $request->phone;

            // You can update the password if needed
            // $admin->password = Hash::make($request->password);
        } else {
            // Perform create
            $imagePath = $this->uploadImage($request, 'image', 'uploads');

            $admin = new admins();
            $admin->image = $imagePath;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            // $admin->password = Hash::make($request->password);
            $admin->password = bcrypt($request->password);

        }

        $admin->save();

        toastr('Admin ' . ($admin ? 'Updated' : 'Created') . ' Successfully', 'success');
        return redirect()->route('admins.index');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = admins::findOrFail($id);
        $this->deleteImage($admin->image);
        $admin->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
