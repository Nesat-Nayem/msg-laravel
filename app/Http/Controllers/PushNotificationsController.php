<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PushNotificationsController extends Controller
{
    public function index()
    {
        return view('admin.push-notifications');
    }

    public function create()
    {
        return view('admin.send-announcements');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
