<?php

namespace App\Http\Controllers;

use App\Models\reviwes;
use Illuminate\Http\Request;
use App\DataTables\ReviewsDataTable;

class ReviwesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReviewsDataTable $dataTable  )
    {
        return $dataTable->render('Admin.pages.review.index');

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
    public function store(Request $request,$id )
    {
        $review = $request->all();
        $review['customerId'] = auth()->user()->id;
        $review['productId']  = $id;
 
        reviwes::create($review);
        session()->flash('success', 'review successfully added!');

        return redirect()->back();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function show(reviwes $reviwes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function edit(reviwes $reviwes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reviwes $reviwes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reviwes  $reviwes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = reviwes::findOrFail($id);
        
        $review->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    
    }
}
