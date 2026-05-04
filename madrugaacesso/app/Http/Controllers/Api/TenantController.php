<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return \App\Models\Tenant::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apartment' => 'required|string|max:255',
            'block' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:tenants,email',
            'rfid_tag' => 'nullable|string|unique:tenants,rfid_tag',
            'status' => 'nullable|in:active,inactive',
        ]);

        return \App\Models\Tenant::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(\App\Models\Tenant $tenant)
    {
        return $tenant;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Tenant $tenant)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'apartment' => 'sometimes|required|string|max:255',
            'block' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:tenants,email,' . $tenant->id,
            'rfid_tag' => 'nullable|string|unique:tenants,rfid_tag,' . $tenant->id,
            'status' => 'nullable|in:active,inactive',
        ]);

        $tenant->update($validated);
        return $tenant;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Tenant $tenant)
    {
        $tenant->delete();
        return response()->noContent();
    }
}
