<?php

namespace MobileMoney\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mobilemoney\src\MobileMoney;
use Mtownsend\XmlToArray\XmlToArray;

class MobileMoneyController extends Controller
{

    public static function doTransaction($user_id,$compte,$transaction_type,$curlopt_url = null,$curlopt_postfields = null, $code = null, $password = null, $msisdn = null, $reference = null, $amount, $metadata = null)
    {
        switch ($transaction_type){
            case "mtn_money" :
                     return self::mtnTransaction($user_id,$compte,$curlopt_url,$code,$password,$msisdn,$reference,$amount,$metadata) ;
                break;
            case "orange_money" : ;
                break;
            case "moov_money" : ;
                break;
            default :
                return response()->json(['error'=>"Transaction echouee veuillez verifier vos parametres"]);

        }
    }

    public static function mtnTransaction($user_id,$compte,$curlopt_url, $code, $password, $msisdn, $reference, $amount, $metadata)
    {
        $type = "mtn mobile money";
        if ($curlopt_url && $code && $password && $msisdn && $reference && $amount && $metadata){
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
                CURLOPT_POSTFIELDS => "Code=".$code."&Password=".$password."MSISDN=".$msisdn."&Reference=".$reference."&Amount=".$amount."&MetaData=".$metadata,
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
                $responseCode = $xml['ResponseCode'];
                $responseMessage = $xml['ResponseMessage'];
                return self::saveTransaction($user_id,$compte,$amount,$msisdn,$type,$reference,$responseCode,$responseMessage);
            }

        }else{

            return response()->json(["error"=>"Veuillez renseigner correctement les differents parametres"],404);
        }

    }

    public static function orangeTransaction()
    {}

    public function moovTransaction()
    {}

    public static function saveTransaction($user_id,$compte,$amount,$phone_number,$mobile_money_type,$reference_id,$responseCode,$responseMessage)
    {
        $rechargement = new MobileMoney();
        $rechargement->compte = $compte;
        $rechargement->amount = $amount;
        $rechargement->phone_number = $phone_number;
        $rechargement->mobile_money_type = $mobile_money_type;
        $rechargement->reference_id = $reference_id;
        $rechargement->responseCode = $responseCode;
        $rechargement->responseMessage = $responseMessage;
        $rechargement->user_id = $user_id;
        return $rechargement->save();

    }
}
