<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccessLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \App\Models\AccessLog::with('tenant')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'device_name' => 'nullable|string|max:255',
            'direction' => 'required|in:in,out',
        ]);

        return \App\Models\AccessLog::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\AccessLog $accessLog)
    {
        return $accessLog->load('tenant');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return response()->json(['message' => 'Access logs cannot be updated.'], 405);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json(['message' => 'Access logs cannot be deleted.'], 405);
    }
}
