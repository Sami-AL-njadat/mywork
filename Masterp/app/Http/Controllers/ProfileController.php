<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\orderItems;
use App\Models\User;
use App\Models\shipments;
use App\Models\orders;
use App\Traits\ImageUploadTrait;


class ProfileController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user= User::where('id')->get();
        $userId = auth()->user()->id;
        $address = shipments::where('customerId', $userId)->get();
        $orders = Orders::where('customerId', $userId)->get();
        
        $orderItems = [];

        foreach ($orders as $item) {
            $orderItems[] = OrderItems::where('customerId', $userId)
                ->where('orderId', $item->id)
                ->with('product')
                ->get();
         }
 

        return view('pagess.profile1.sami', [
            'user' => $request->user(),
            'orderItems' => $orderItems,
            'orders' => $orders,
            'address'  => $address,
            'user'  =>  $user,

        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        logger($request->all());
        
        if ($request->hasFile('image')) {
            // dd("dddddddddddddd");
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(''), $imageName);
            $request->user()->image = $imageName;
        }

        if ($request->filled('name')) {
            $request->user()->name = $request->input('name');
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        session()->flash('success', 'profile edit successfully!');

        return Redirect::route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
  


    public function destroyAccount(Request $request): RedirectResponse
    {
      // Validate the request to ensure the user provides their password
    $request->validate([
        'password' => ['required', 'current-password'],
    ]);

    // Get the authenticated user
    $user = auth()->user();

    // Log out the user
    Auth::logout();

     User::where('id', $user->id)->delete();

     $request->session()->invalidate();
    $request->session()->regenerateToken();
    session()->flash('success', 'Account deleted successfully!');
     return redirect()->to('/');
}

    }






