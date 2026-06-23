<?php

// app/Http/Controllers/Api/JobPostsController.php

namespace App\Http\Controllers\Api; // ← تأكد هذا موجود مش App\Http\Controllers

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostsController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobPost::with(['company:id,name,image', 'category:id,name,type'])
            ->when($request->status, fn($q) => $q->where('status', $request->status))
            ->when($request->work_type, fn($q) => $q->where('work_type', $request->work_type))
            ->when($request->search, fn($q) => $q->where('title', 'like', "%{$request->search}%"))
            ->latest()
            ->simplePaginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => $jobs,
        ]);
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

public function getByCategory(Request $request)
{
    $request->validate([
        'type' => 'required|in:part_time,freelance',
    ]);

    $jobs = JobPost::with([
            'company:id,name,image',
            'category:id,name,type',
        ])
        ->whereHas('category', fn($q) => $q->where('type', $request->type))
        ->latest()
        ->paginate($request->per_page ?? 15);

    return response()->json([
        'success' => true,
        'data'    => $jobs,
    ]);
}}