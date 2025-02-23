<?php


namespace App\Http\Controllers;

use App\Helpers\QrHelper;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use OTPHP\TOTP;

class QRCodeController extends Controller
{

    // generate prima iz requesta, professor id, classrom id, kolegij id,


    public function generate(Request $request)
    {

        $validated = $request->validate([
            'classroom_id' => ['required'],
            'subject_id' => ['required'],
            'professor_id' => ['required'],
        ]);

        // Generate TOTP Secret
        $totp = TOTP::generate();
        $validated['totp_secret'] = $totp->getSecret(); // Store secret


        $encryptedText = QrHelper::encrypt($validated);


        return response()->json(['value'=>$encryptedText]);
    }


    public function show(Request $request, $value)
    {
        // Decrypt the received value
        $decryptedData = QrHelper::decrypt($value);

        // Retrieve the stored TOTP secret
        $totpSecret = $decryptedData['totp_secret'] ?? null;

        if (!$totpSecret) {
            return response()->json(['error' => 'Invalid QR code'], 400);
        }

        // Regenerate the TOTP
        $totp = TOTP::createFromSecret($totpSecret);
        $currentCode = $totp->now();

        // Generate QR with new TOTP
        $qr = QrCode::format('png')
            ->size(400)
            ->generate('http://pzi.test:3000/table?v=' . $value . '&otp=' . Crypt::encrypt($currentCode));

        return response($qr)->header('Content-Type', 'image/png');
    }


    public function showUrl(Request $request, $value)
    {
        // Decrypt the received value
        $decryptedData = QrHelper::decrypt($value);

        // Retrieve the stored TOTP secret
        $totpSecret = $decryptedData['totp_secret'] ?? null;

        if (!$totpSecret) {
            return response()->json(['error' => 'Invalid QR code'], 400);
        }

        // Regenerate the TOTP
        $totp = TOTP::createFromSecret($totpSecret);
        $currentCode = $totp->now();

        return redirect('http://pzi.test:3000/table?v=' . $value . '&otp=' . Crypt::encrypt($currentCode));

        // Generate QR with new TOTP
        // $qr = QrCode::format('png')
            // ->size(400)
            // ->generate('http://pzi.test:3000/table?v=' . $value . '&otp=' . Crypt::encrypt($currentCode));

        // return response($qr)->header('Content-Type', 'image/png');
    }
}
