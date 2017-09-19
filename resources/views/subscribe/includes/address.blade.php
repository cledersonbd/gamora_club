<div class="row">
    <div class="col-md-12">
        <form id="address">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="street">Rua</label>
                <input type="text" class="form-control" name="street" placeholder="Rua" value="">
            </div>
            <div class="form-group">
                <label for="number">Número</label>
                <input type="text" class="form-control" name="number" placeholder="Número" value="">
            </div>
            <div class="form-group">
                <label for="extra">Complemento</label>
                <input type="text" id="extra" class="form-control" name="extra" placeholder="Complemento" value="">
            </div>
            <div class="form-group">
                <label for="cep">CEP</label>
                <input type="text" id="cep" class="form-control" name="cep" placeholder="CEP" value="">
            </div>
            <div class="form-group row">
                <div class="col-md-10 col-xs-8 col-lg-10">
                    <label for="city">Cidade</label>
                    <input type="text" class="form-control" name="city" placeholder="City" value="">
                </div>
                <div class="col-md-2 col-xs-4 col-lg-2">
                    <label for="state">Estado</label>
                        <select class="form-control" name="state" data-live-search="true">
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-default btn-success">Confirmar Endereço</button>
        </form>
    </div>
</div>