
<div class="row">
    <div class="col-md-12">
        <form id="form-payment" action="/subscribe/payment" method="post">
            {{ csrf_field() }}
            <h3>Escolher Método de Pagamento e Plano</h3>
            <div class="form-group row">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <label for="state">Método de Pagamento</label>
                    <select id="payment-method" class="form-control" name="method" data-live-search="true">
                        <option value="">Selecione</option>
                        @foreach($paymentMethods as $method)
                            <option data-view="{{$method->view}}" value="{{$method->id}}">{{$method->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <label for="state">Planos</label>
                    <select class="form-control" name="plan" data-live-search="true">
                        <option value="">Selecione</option>
                        @foreach($plans as $plan)
                            <option value="{{$plan->name}}">{{$plan->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 col-xs-12 col-lg-12">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input id="cpf" type="text" class="form-control" name="cpf" placeholder="CPF" value="">
                    </div>
                </div>
            </div>
            <input id="sender-hash" type="hidden" name="sender" value="">

            <div class="payment-method-form" id="boleto" style="display: none;">
                @include('subscribe.includes.payment-boleto')
            </div>
            <div class="payment-method-form" id="credit-cc" style="display: none;">
                @include('subscribe.includes.payment-cc')
                <input id="cc-brand" type="hidden" name="flag">
                <input id="cc-token" type="hidden" name="token">

            </div>



            <div class="form-group">
               <button type="submit" class="btn btn-default btn-success">Escolher</button>
            </div>
        </form>
    </div>
</div>

<script>
    function subscriptionPaymentPage(){
        $(function($){
            $("#cpf").mask("999.999.999-99",{placeholder:"000.000.000-00"});
            $("#cc-validade").mask("99/9999",{placeholder:"00/0000"});
        });

        $('#payment-method').on('change',function () {
            $('.payment-method-form').hide();
            var view = $('option:selected', this).data('view');
            $(view).show();
        });
        $('#form-payment').submit(function(event){

            event.preventDefault();
            $('#errors-alert').hide();
            var hash = PagSeguroDirectPayment.getSenderHash();
            $('#sender-hash').val(hash);

            getPaymentToken(function(token){
                console.log(token);
                $.ajax( {
                    type: "POST",
                    url: $('#form-payment').attr( 'action' ),
                    data: $('#form-payment').serialize(),
                    success: function(response){
                        console.log(response);
                        $('#confirm-pill').removeClass('disabled');
                        $('a[href="#confirm"]').tab('show');
                    },error: function(response){
                        subscriptionAjaxError(response);
                    }
                } );
            });
        });

        //mostrar bandeira
        $(function(){
            $('#cardBin').blur(function(){
                var flag = getCreditCardFlag();
            });

        });
        //pegar bandeira
        function getCreditCardFlag(){
            var card = $('#cardBin').val().replace(/[^0-9]+/g,'');
            console.log(card);
            PagSeguroDirectPayment.getBrand({
                cardBin: card,
                success: function(response) {
                    $('#cc-brand').val(response.brand.name);
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
        //pegar token de cc
        function getPaymentToken(callback){
            var validade = $('#cc-validade').val().split("/");
            var flag = $('#cc-brand').val();
            var param = {
                brand: flag,
                cardNumber: $("#cardBin").val(),
                cvv: $("input#cvv").val(),
                expirationMonth: validade[0],
                expirationYear: validade[1],
                success: function(response) {
                    $('#cc-token').val(response.card.token);
                    callback(response.card.token);
                },
                error: function(response) {
                    console.log(response);
                }
            };
            PagSeguroDirectPayment.createCardToken(param);
        }
    }
</script>