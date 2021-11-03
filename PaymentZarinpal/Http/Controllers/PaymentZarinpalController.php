<?php

namespace Modules\PaymentZarinpal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Mockery\Exception;
use Modules\FinanceSimple\Entities\Finance;

class PaymentZarinpalController extends Controller
{
    public function verifyPayment(Request $request){
        $dbFinance = Finance::where('authority' , $request->Authority)->with('getPackage')->with('getUser')->with('getProduct')->firstorfail();
        $resultVerify = \zarinpal::verifyTransAction($dbFinance->amount);
//        return $resultVerify;
        $route = route('site.index');
        if ($resultVerify['Status'] === 100){
            try {
                $dbFinance->isSuccess = true;
                $dbFinance->RefID = $resultVerify['RefID'];
                $dbFinance->message = $resultVerify['Message'];
                $dbFinance->save();
                return view('paymentzarinpal::backPayment' , compact('resultVerify' , 'dbFinance' , 'route'));
            }catch (Exception $exception){
                $resultVerify['Message'] = 'مشکلی در ثبت اطلاعات پرداخت شما وجود دارد لطفا با پشتیبانی تماس بگیرید';
                return view('paymentzarinpal::backPayment' , compact('resultVerify' , 'dbFinance' , 'route'));
            }
        }else{
            // fail transAction
            $dbFinance->message = $resultVerify['Message'];
            $dbFinance->save();
            return view('paymentzarinpal::backPayment' , compact('resultVerify' , 'dbFinance' , 'route'));
        }
    }
}
