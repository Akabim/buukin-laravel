<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use Midtrans\Snap;

use NumberFormatter;
use App\Models\Booking;
use App\Models\Resto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function checkout(Request $request)
    {
        // Validasi input di sini sesuai kebutuhan
    
        $restos = Resto::find($request->restaurant_id);
    
        $booking = new Booking();
        $booking->user_id = auth()->user()->id; // ID pengguna yang login
        $booking->restaurant_id = $request->restaurant_id; // ID restoran yang dipilih
        $booking->table_count = $request->table_count;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->selected_seats = $request->selected_seats;
        $booking->total_price = $restos->price * $request->table_count;
    
        $request->request->add(['status' => 'Pending']);
    
        $booking->save();
    
        // Initialize $snapToken
        $snapToken = null;
    
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    
        $params = array(
            'transaction_details' => array(
                'order_id' => $booking->id,
                'gross_amount' => $booking->total_price,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
            ),
        );
    
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        // dd(request()->order_id);
    
        return view('checkout', compact('snapToken', 'booking', 'restos'));

    }
    

    public function history()
    {
        $userID = Auth::user()->id;

        $bookings = Booking::with('restaurant')
            ->where('user_id', $userID)
            ->get();

        return view('history', ['bookings' => $bookings]);
    }

    public function show($id) {
        $restos = Resto::find($id);
        return view('details', compact('restos'));
    }
    
    public function invoice($id) {
        $booking = Booking::findOrFail($id);
    
        // Find the corresponding restaurant based on the booking's restaurant_id
        $resto = Resto::findOrFail($booking->restaurant_id);
    
        return view('invoice', compact('resto', 'booking'));
    }

    public function callback(Request $request) {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' or $request->transaction_status == 'settlement') {
                $booking = Booking::find($request->order_id);
                $booking->update(['status' => 'Success']);
            }
           
        }
    }
}
