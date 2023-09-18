<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\BookService;
use App\Models\Payment;
use App\Models\Provider;
use App\Models\Service;
use App\Models\User;
use App\Notifications\BookServiceNotification;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class RazorpayController extends Controller
{
    public function UserDetails(Request $request)
    {
        // dd('Razorpay');
        // dd($request);
        $input = $request->all();
        // dd($input);
        if ($request->razorpay_payment_id) {
            // dd('if');
            // $input = $request->all();
            // dd($input);

            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $payment = $api->payment->fetch($input['razorpay_payment_id']);


            if (count($input)  && !empty($input['razorpay_payment_id'])) {
                try {
                    $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                } catch (\Exception $e) {
                    return  $e->getMessage();
                    \Session::put('error', $e->getMessage());
                    return redirect()->back();
                }
            }
            $data = [
                'razorpay_id' => $payment->id,
                'method' => $payment->method,
                'currency' => $payment->currency,
                'json_response' => "Success",
                'service_id' => $input['service_id'],
                'user_id' => Auth::guard('web')->user()->id,
                'amount' => $payment->amount / 100,
            ];

            $pay = new Payment($data);
            $pay->save();



            $uid = Auth::guard('web')->user()->id;
            // dd($uid);
            $bookservice = new BookService($input);
            $bookservice->user_id = $uid;

            // dd($bookservice);
            $bookservice->save();

            $service = Service::where('id', $bookservice->service_id)->first();
            $cashback = $service->cashback;

            if ($cashback != '' || $cashback != null) {
                $userwallet = Auth::guard('web')->user()->user_wallet;
                $user_new = User::find($uid);
                // dd($userwallet);
                if ($request->temp != '' || $request->temp != null) {
                    // dd($request->temp);
                    $userwallet = $request->temp + $cashback;
                    $user_new->user_wallet = $userwallet;
                    $user_new->update();
                } else {
                    $userwallet = $userwallet + $cashback;
                    $user_new->user_wallet = $userwallet;
                    $user_new->update();
                }

                // dd($userwallet);
            } else {
                $userwallet = Auth::guard('web')->user()->user_wallet;
                $user_new = User::find($uid);
                if ($request->temp != '' || $request->temp != null) {
                    $userwallet = $request->temp;
                    // dd($userwallet);
                    $user_new->user_wallet = $userwallet;
                    $user_new->update();
                } else {
                    $userwallet = $userwallet;
                    // dd($userwallet);
                    $user_new->user_wallet = $userwallet;
                    $user_new->update();
                }
            }
            $provider = Provider::where('id', $service->provider_id)->first();
            // dd($provider);
            $admin = Admin::orderBy('id', 'desc')->first();
            // dd($admin);
            $provider->notify(new BookServiceNotification($bookservice));
            $admin->notify(new BookServiceNotification($bookservice));
            // dd($admin);
            // dd('done');
        } else {
            // dd('else');
            // $input = $request->all();
            $uid = Auth::guard('web')->user()->id;
            // dd($uid);
            $bookservice = new BookService($input);
            $bookservice->user_id = $uid;

            // dd($bookservice);
            $bookservice->save();

            $service = Service::where('id', $bookservice->service_id)->first();
            $cashback = $service->cashback;

            // if ($cashback != '' || $cashback != null) {
            //     Auth::guard('web')->user()->user_wallet = $input['user_wallet'];
            //     $u_wallet = Auth::guard('web')->user()->user_wallet;
            //     $u_wallet = $u_wallet + $cashback;
            //     $user_new = User::find($uid);
            //     // dd($u_wallet);
            //     $user_new->user_wallet = ($u_wallet);
            //     $user_new->update();
            //     dd($user_new);
            // }
            if ($cashback != '' || $cashback != null) {
                $userwallet = Auth::guard('web')->user()->user_wallet;
                $user_new = User::find($uid);
                // dd($userwallet);
                if ($request->temp != '' || $request->temp != null) {
                    $userwallet = $request->temp + $cashback;
                    $user_new->user_wallet = $userwallet;
                    $user_new->update();
                } else {
                    $userwallet = $userwallet + $cashback;
                    $user_new->user_wallet = $userwallet;
                    $user_new->update();
                }

                // dd($userwallet);
            } else {
                $userwallet = Auth::guard('web')->user()->user_wallet;
                $user_new = User::find($uid);
                $userwallet = $request->temp;
                // dd($userwallet);
                $user_new->user_wallet = $userwallet;
                $user_new->update();
            }

            $provider = Provider::where('id', $service->provider_id)->first();
            // dd($provider);
            $admin = Admin::orderBy('id', 'desc')->first();
            // dd($admin);
            $provider->notify(new BookServiceNotification($bookservice));
            $admin->notify(new BookServiceNotification($bookservice));
            // dd($admin);
            // dd('done');
        }

        return response()->json(['success' => true, 'msg' => "Service booked successfully."]);
    }

    public function adjust_wallet(Request $request)
    {
        // dd($request->all());
        $uid = Auth::guard('web')->user()->id;
        $u_wallet = Auth::guard('web')->user()->user_wallet;

        if ($u_wallet >= $request->serviceamount) {
            $price = ($u_wallet) - ($request->serviceamount);
            $u_wallet = $price;
            $grandtotal = '0';
        } else if ($u_wallet <= $request->serviceamount) {
            $price = ($request->serviceamount) - ($u_wallet);
            $u_wallet = '0';
            $grandtotal = $price;
            // dd($grandtotal);
        }

        return response()->json(['success' => true, 'grandtotal' => $grandtotal,  'u_wallet' => $u_wallet]);
    }
}
