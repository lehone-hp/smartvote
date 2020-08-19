<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Jwplayer\JwplatformAPI;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfParser\StreamReader;
use setasign\FpdiProtection\FpdiProtection;

class HomeController extends Controller
{


    private $api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->api_context = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AVShglxmKX5v9pPB2g6Y_vBzgyZGfNoM_XMEDsh4pAoFpCYDAHQ5rkE7mVekJaXa7HY9vWYdEmytovAG',     // ClientID
                'EFKtig3xmWfVh2gO_MM_Bx87yeVUXKRykhFh1hV3NYsoqyLZdTjbJu_lUsMuzN69X6i9gUlvQ2ptDjiD'      // ClientSecret
            )
        );

        $this->api_context->setConfig(
            array(
                'mode'                   => env('PAYPAL_MODE', 'sandbox'),
                'http.ConnectionTimeOut' => 1000,
                'log.LogEnabled'         => true,
                'log.FileName'           => storage_path() . '/logs/paypal.log',
                'log.LogLevel'           => 'ERROR'
            )
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function paypalForm()
    {
        return view('paypal');
    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(1);

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('paywithpaypal.status'))
            ->setCancelUrl(route('paywithpaypal.status'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        //dd($payment->create($this->api_context));
        //exit;

        try {
            $payment->create($this->api_context);
        } catch (PayPalConnectionException $ex) {
            if (\Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                //dump($ex);
                return redirect()->route('paywithpaypal');
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return redirect()->route('paywithpaypal');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return redirect()->away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return redirect()->route('paywithpaypal');
    }

    public function getPaymentStatus(Request $request)
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            Session::put('error', 'Payment failed');
            return redirect()->route('paywithpaypal');
        }
        $payment = Payment::get($request->get('paymentId'), $this->api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->api_context);

        if ($result->getState() == 'approved') {
            Session::put('success', 'Payment success');
            return redirect()->route('paywithpaypal');
        }

        Session::put('error', 'Payment failed');
        return redirect()->route('paywithpaypal');
    }

    public function try()
    {
        $password = 'info@domain.com';
        //name of the original file (unprotected)
        $origFile = asset('books/box.pdf');
        $fileContent = file_get_contents($origFile, 'rb');

        //name of the destination file (password protected and printing rights removed)
        $destFile = 'book_protected.pdf';

        $pdf = new FpdiProtection();

        //calculate the number of pages from the original document
        $pageCount = $pdf->setSourceFile(StreamReader::createByString($fileContent));

        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            // import a page
            $templateId = $pdf->importPage($pageNo);

            $pdf->AddPage();
            // use the imported page and adjust the page size
            $pdf->useTemplate($templateId, ['adjustPageSize' => true]);

            $pdf->SetFont('Helvetica');
            $pdf->SetXY(5, 5);
        }

        // protect the new pdf file, and allow no printing, copy etc and leave only reading allowed
        $ownerPassword = $pdf->setProtection(
            [],
            'password',
            $password
        );
        $pdf->Output($destFile, 'F');

        //return $destFile;

    }

    public function deleteEmailAlerts()
    {

        $alerts = [];//json_decode(file_get_contents('/home/lehone/Desktop/ms1-queue'), true);

        return view('delete_email', compact('alerts'));
    }

    function deleteAlert(Request $request)
    {

        $ch = curl_init('https://www.njorku.com/api/deleteEmailAlerts?email=' . $request->email);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = json_decode(curl_exec($ch));
        curl_close($ch);

        return response()->json($response);

    }

    function uploadChunks(Request $request)
    {
        if ($request->file('file')) {

            $dzuuid = $request->get('dzuuid');
            $chunk_index = $request->get('dzchunkindex');

            $name = $dzuuid . '_' . $chunk_index . '.part';
            $path = Storage::putFileAs('/public/uploads', $request->file('file'), $name);

            return response()->json([
                'status' => 'success',
                'path'   => $path
            ]);
        }
        return response()->json([
            'status' => 'failed'
        ]);
    }

    function concatChunks(Request $request)
    {
        $dzuuid = $request->get('dzuuid');
        $chunk_count = $request->get('chunk_count');

        $file_name = 'dzone/' . time().time().($request->get('ext') ? '.'.$request->get('ext') : '');

        for ($i = 0; $i < $chunk_count; $i++) {
            $chunk_path = 'public/uploads/' . $dzuuid . '_' . $i . '.part';
            Storage::append($file_name, Storage::get($chunk_path));
            Storage::delete($chunk_path);
        }

        return response()->json([
            'status' => 'success',
            'path'   => $file_name
        ]);
    }

    function uploadToJW(Request $request) {

        $jwplatform_api = new JwplatformAPI(
            '3zXqk1W4',
            'zLnsniU0ToHPgb9JHZracKt2'
        );

        $target_file = storage_path('app/'.$request->get('filename'));
        //dump($target_file);
        $params = array();
        $params['title'] = 'File Test 325';
        $params['description'] = 'Video description here';

        // Create video metadata
        $create_response = json_encode($jwplatform_api->call('/videos/create', $params));
        $decoded = json_decode(trim($create_response), TRUE);
        $upload_link = $decoded['link'];

        $upload_response = $jwplatform_api->upload($target_file, $upload_link);

        return response()->json($upload_response);

    }
}
