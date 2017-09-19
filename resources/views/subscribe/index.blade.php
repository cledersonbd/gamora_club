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
                            <li class="disabled"><a data-toggle="pill" href="#payment">Pagamento</a></li>
                            <li class="disabled"><a data-toggle="pill" href="#comfirm">Confirmar</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="address" class="tab-pane fade in active">
                                @include('subscribe.includes.address')
                            </div>
                            <div id="payment" class="tab-pane fade">
                                <h3>Pagamento</h3>
                                <p>Some content in menu 1.</p>
                            </div>
                            <div id="comfirm" class="tab-pane fade">
                                <h3>Confirmar</h3>
                                <p>Some content in menu 2.</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
        <script>
            $(function(){
                $(function($){
                    $("#cep").mask("99999-999",{placeholder:"00000-000"});
//                    $("#phone").mask("(999) 999-9999");
//                    $("#tin").mask("99-9999999");
//                    $("#ssn").mask("999-99-9999");
                });
                $('.nav-pills li').click(function(event){
                    if ($(this).hasClass('disabled')) {
                        return false;
                    }
                });
                $('form').submit(function(event){
                   event.preventDefault();
                   return false;
                });
            });
        </script>
@endsection
