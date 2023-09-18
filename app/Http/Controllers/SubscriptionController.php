<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::orderBy('id', 'desc')->get();
        return view('admin.subscription.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.subscription.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'plan' => 'required|unique:subscription,plan',
            'startdate' => 'required',
            'enddate' => 'required',
            'amount' => 'required',
        ]);

        $subscription = new Subscription($request->input());

        if ($request->paid == 'checked') {

            $subscription->paid = 1;
            $subscription->unpaid = 0;
        } elseif ($request->unpaid == 'checked') {

            $subscription->unpaid = 1;
            $subscription->paid = 0;
        }
        // dd($subscription);
        $subscription->save();

        return redirect()->route('adminsubscription.index')->with('success', 'added successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $subscription = Subscription::find($id);
        return view('admin.subscription.edit', compact('subscription'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'plan' => 'required|unique:subscription,plan,' . $id,
            'startdate' => 'required',
            'enddate' => 'required',
            'amount' => 'required',
        ]);

        $subscription = Subscription::find($id);

        if ($request->paid == 'checked') {

            $subscription->paid = 1;
            $subscription->unpaid = 0;
        } elseif ($request->unpaid == 'checked') {

            $subscription->unpaid = 1;
            $subscription->paid = 0;
        }
        $input = $request->all();
        $subscription->update($input);

        return redirect()->route('adminsubscription.index')
            ->with('success', 'updated successfully');
    }

    public function destroy(string $id)
    {
        $subscription = Subscription::find($id);

        $subscription->delete();
        return redirect()->route('adminsubscription.index')->with('success', 'deleted successfully.');
    }
}
