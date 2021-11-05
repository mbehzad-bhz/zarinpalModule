<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Back Payment</title>
    <link rel="shortcut icon" href="{{ route('site.showImage' , ['filename' => \App\Http\Controllers\Environment::adminLogo]) }}">
    <link href="{{ Module::asset('paymentzarinpal:bootstrap/css/bootstrap.rtl.min.css') }}" rel="stylesheet"/>
    <style>
        body{
            background: url('{{ Module::asset('paymentzarinpal:Image/bgpayment.jpg') }}');
        }
        .bg{
            height: 100vh;

        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center bg" >
        <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
            @if($resultVerify['Status'] === 100)
                <div class="card shadow bg-light">
                    <img src="{{ Module::asset('paymentzarinpal:Image/pay-success.gif') }}" class="card-img-top" style="max-width: 50%;display: block;margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-success">{{ $resultVerify['Message'] }}</h5>
                        <div class="card-text container-fluid">
                            <div class="row justify-content-between ">
                                <div class="col-12 col-sm-6 col-md mt-3" style="min-width: 100px"><b>مبلغ : </b> <span>{{ number_format($resultVerify['Amount']) }}</span> تومان</div>
                                <div class="col-12 col-sm-6 col-md mt-3" style="min-width: 100px"><b>پکیچ : </b> <span>{{ $dbFinance->getPackage->name }}</span></div>
                                <div class="col-12 col-sm-6 col-md mt-3" style="min-width: 100px"><b>کدپیگیری : </b> <span>{{ $resultVerify['RefID'] }}</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ $route }}" class="btn btn-warning" style="width: 170px">ادامه</a>
                    </div>
                </div>
            @else
                <div class="card shadow bg-light">
                    <img src="{{ Module::asset('paymentzarinpal:Image/pay-error.gif') }}" class="card-img-top" style="max-width: 50%;display: block;margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center text-danger">{{ $resultVerify['Message'] }}</h5>
                        <div class="card-text container-fluid">
                            <div class="row justify-content-between ">
                                <div class="col-12 col-sm-6 col-md mt-3" style="min-width: 100px"><b>مبلغ : </b> <span>{{ number_format($resultVerify['Amount']) }}</span> تومان</div>
                                <div class="col-12 col-sm-6 col-md mt-3" style="min-width: 100px"><b>پکیچ : </b> <span>{{ $dbFinance->getPackage->name }}</span></div>
                                <div class="col-12 col-sm-6 col-md mt-3" style="min-width: 100px"><b>کدپیگیری : </b> <span>---</span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ $route }}" class="btn btn-warning" style="width: 170px">ادامه</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


<script src="{{ Module::asset('paymentzarinpal:bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
