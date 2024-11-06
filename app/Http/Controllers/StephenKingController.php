<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStephenKingRequest;
use App\Http\Requests\UpdateStephenKingRequest;
use App\Models\StephenKing;
use Http;

class StephenKingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stephen = Http::get("https://stephen-king-api.onrender.com/api/books");

        $data = collect($stephen->json());
        return view("stephen-king", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStephenKingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StephenKing $stephenKing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StephenKing $stephenKing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStephenKingRequest $request, StephenKing $stephenKing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StephenKing $stephenKing)
    {
        //
    }
}
