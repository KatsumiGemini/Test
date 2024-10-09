<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Import the QrCode facade
use Auth;

class QrCodeController extends Controller
{
    public function generate(Request $request)
    {
        $user = Auth::user();

        // Generate the URL for the evaluation form
        $url = route('form', ['office_id' => $user->office_id]);

        // Generate the QR code
        $qr_code = QrCode::size(300)->generate($url);

        return view('user.user_profile', compact('qr_code', 'user'));
    }
}
