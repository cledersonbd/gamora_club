
<div class="row">
    <div class="col-md-12">
        <form id="form-payment" action="/subscribe/payment">
            {{ csrf_field() }}
            <h3>Escolher Método de Pagamento e Plano</h3>
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
                    <label for="state">Método de Pagamento</label>
                    <select id="payment-method" class="form-control" name="method" data-live-search="true">
                        <option value="">Selecione</option>
                        @foreach($paymentMethods as $method)
                            <option value="{{$method->id}}">{{$method->description}}</option>
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
            <div class="payment-method-form" id="boleto" style="display: none;">
                @include('subscribe.includes.payment-boleto')
            </div>
            <div class="payment-method-form" id="credit-card" style="display: none;">
                @include('subscribe.includes.payment-cc')

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
        });

        var hash = PagSeguroDirectPayment.getSenderHash();

        $('#payment-method').on('change',function () {
            $('.payment-method-form').hide();
            $('#'+$(this).val()).show();
        });
        $('#form-payment').submit(function(event){
            $('#errors-alert').hide();
            formSubmit(event,this,function(response){
                $('#payment-pill').removeClass('disabled');
                $('a[href="#payment"]').tab('show');
            },subscriptionAjaxError);
            return false;
        });
    }
</script>