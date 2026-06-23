<?php

namespace App\Http\Controllers;

use App\Models\job_posts;
use App\Http\Requests\Storejob_postsRequest;
use App\Http\Requests\Updatejob_postsRequest;

class JobPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storejob_postsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(job_posts $job_posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(job_posts $job_posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatejob_postsRequest $request, job_posts $job_posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job_posts $job_posts)
    {
        //
    }
}
