<?php

namespace Arolitec\Mobilemoney;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mtownsend\XmlToArray\XmlToArray;

class MobileMoneyController extends Controller
{

    public static function doMtnTransaction($msisdn,$amount)
    {
        $reference = $msisdn.time();
        $metadata = "M-".time();
        $code = config('mobilemoney.credentials.MTN.code');
        $password = config('mobilemoney.credentials.MTN.password');
        if ($msisdn && $amount){
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_PORT => "8443",
                CURLOPT_URL => "https://billmap.mtn.ci:8443/WebServices/BillPayment.asmx/ProcessOnlinePayment_V1.4",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "Code=".$code."&Password=".$password."&MSISDN=".$msisdn."&Reference=".$reference."&Amount=".$amount."&MetaData=".$metadata,
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded",
                    "cache-control: no-cache"
                ),
            ));

            set_time_limit(360);
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {
                return "cURL Error #:" . $err;
            } else {
                $xml = XmlToArray::convert($response);
                $xml['reference'] = $reference;
                return $xml;
            }

        }else{

            return response()->json(["error"=>"Veuillez renseigner correctement les differents parametres"],404);
        }

    }

    public static function doOrangeTransaction()
    {}

    public function doMoovTransaction()
    {}
}
