
<div class="row">
    <div class="col-md-12">
        <form id="form-payment" action="/subscribe/payment">
            {{ csrf_field() }}
            <h3>Concluir com Boleto</h3>
            <div class="form-group">
                <label for="cpf-boleto">CPF</label>
                <input type="text" id="cpf-boleto" class="form-control" name="cpf-boleto" placeholder="CPF">
            </div>
            <button type="submit" class="btn btn-default btn-success">Escolher</button>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" class="form-control" name="cep" placeholder="CEP" value="{{$address->cep}}">
            </div>
            <button type="submit" class="btn btn-default btn-success">Cartão de crédito</button>
        </form>
    </div>
</div>

<script>
    function subscriptionPaymentPage(){
        $(function($){
            $("#cpf-boleto").mask("999.999.999-99",{placeholder:"000.000.000-00"});
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