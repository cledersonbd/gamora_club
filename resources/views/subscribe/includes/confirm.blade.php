Parabéns
<div class="row">
    <div class="col-md-12">

    </div>
</div>
<script>
    function subscriptionPaymentConfirmationPage(){
        $(function($){
//            $("#cpf").mask("999.999.999-99",{placeholder:"000.000.000-00"});
        });
        $('#form-confirm').submit(function(event){
            $('#errors-alert').hide();
            var hash = PagSeguroDirectPayment.getSenderHash();
            $('#sender-hash').val(hash);
            formSubmit(event,this,function(response){
                $('#confirm-pill').removeClass('disabled');
                $('a[href="#confirm"]').tab('show');
            },subscriptionAjaxError);
            return false;
        });
    }
</script>
