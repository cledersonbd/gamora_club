@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('status-error'))
                        <div class="alert alert-danger">
                            {{ session('status-error') }}
                        </div>
                    @endif
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#address">Localização</a></li>
                            <li id="payment-pill" class="disabled"><a data-toggle="pill" href="#payment">Pagamento</a></li>
                            <li class="disabled"><a data-toggle="pill" href="#comfirm">Confirmar</a></li>
                        </ul>
                        <div style="display: none;" id="errors-alert" class="alert alert-danger">

                        </div>
                        <div class="tab-content">
                            <div id="address" class="tab-pane fade in active">
                                @include('subscribe.includes.address')
                            </div>
                            <div id="payment" class="tab-pane fade">
                                @include('subscribe.includes.payment')
                            </div>
                            <div id="comfirm" class="tab-pane fade">
                                @include('subscribe.includes.confirm')
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script type="text/javascript">
        PagSeguroDirectPayment.setSessionId('{{$paymentSession}}');
    </script>
    <script>
            $('#payment-pill').removeClass('disabled');
            $('a[href="#payment"]').tab('show');
            function subscriptionAjaxError(response){
                $('#errors-alert').show();
                $('#errors-alert').html('');
                $.each(response.responseJSON.errors,function(key,value){
                    $.tmpl( "<li>${message}</li>", { "message" : value }).appendTo( '#errors-alert' );
                });
                console.log(response.responseJSON.errors);
            }

            $(function(){
                $('.nav-pills li').click(function(event){
                    if ($(this).hasClass('disabled')) {
                        return false;
                    }
                });

                subscriptionAddressPage();
                subscriptionPaymentPage();
//                subscriptionPaymentConfirmationPage();
            });
        </script>

        <script id="errors-template">

        </script>
@endsection
