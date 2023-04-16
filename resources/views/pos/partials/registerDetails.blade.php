

        <div class="row justify-content-end">
            <div class="col-md-1 px-0">
                <button type="button" class="btn btn-primary" >Print</button>
            </div>
            <div class="col-md-1 px-0">
                <button type="button" class="btn btn-primary" >Excel</button>
            </div>
            <div class="col-md-1 px-0">
                <button type="button" class="btn btn-primary" >CSV</button>
            </div>
            <div class="col-md-1 px-0">
                <button type="button" class="btn btn-primary" >PDF</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <h5 class="font-weight-bold">User:</h5>
                <h5 class="font-weight-bold">Opening Time :</h5>
            </div>
            <div class="col-md-9">
                <h5 class="font-weight-bold">{{ Auth()->user()->name }}</h5>
                <h5 class="font-weight-bold">{{$register->created_at}}</h5>
            </div>
        </div>
        <div class="row px-1 text-center" id="registerDetails">
            <div class="col-md-3">
                <h4 class="">Sn</h4>
            </div>
            <div class="col-md-3">
                <h4 class="">Payment Method</h4>
            </div>
            <div class="col-md-3">
                <h4 class="">Transactions</h4>
            </div>
            <div class="col-md-3">
                <h4 class="">Amount</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>1</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Cash</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="cash_opening" value="{{$register->cash}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="cash_purchase" value="{{$register_amount['cash']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="cash_sale" value="{{$register_amount['cash']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="cash_due" value="{{$register_amount['cash']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="cash_expense" value="{{$register_amount['cash']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="cash_closing" value="" placeholder="0.00" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>2</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Bkash</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bkash_opening" value="{{$register->bkash}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bkash_purchase" value="{{$register_amount['bkash']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bkash_sale" value="{{$register_amount['bkash']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bkash_due" value="{{$register_amount['bkash']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bkash_expense" value="{{$register_amount['bkash']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bkash_closing" value="{{$register->cash}}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>3</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Rocket</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="rocket_opening" value="{{$register->rocket}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="rocket_purchase" value="{{$register_amount['rocket']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="rocket_sale" value="{{$register_amount['rocket']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="rocket_due" value="{{$register_amount['rocket']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="rocket_expense" value="{{$register_amount['rocket']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="rocket_closing" value="{{$register->cash}}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>4</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Nagad</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="nagad_opening" value="{{$register->nagad}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="nagad_purchase" value="{{$register_amount['nagad']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="nagad_sale" value="{{$register_amount['nagad']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="nagad_due" value="{{$register_amount['nagad']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="nagad_expense" value="{{$register_amount['nagad']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="nagad_closing" value="{{$register->cash}}" readonly>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>5</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Credit</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="credit_opening" value="{{$register->credit}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="credit_purchase" value="{{$register_amount['credit']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="credit_sale" value="{{$register_amount['credit']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="credit_due" value="{{$register_amount['credit']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="credit_expense" value="{{$register_amount['credit']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="credit_closing" value="{{$register->cash}}" readonly>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>6</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Debit</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="debit_opening" value="{{$register->debit}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="debit_purchase" value="{{$register_amount['debit']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="debit_sale" value="{{$register_amount['debit']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="debit_due" value="{{$register_amount['debit']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="debit_expense" value="{{$register_amount['debit']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="debit_closing" value="{{$register->cash}}" readonly>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>7</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Check</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="check_opening" value="{{$register->check}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="check_purchase" value="{{$register_amount['check']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="check_sale" value="{{$register_amount['check']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="check_due" value="{{$register_amount['check']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="check_expense" value="{{$register_amount['check']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="check_closing" value="{{$register->cash}}" readonly>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 mt-1">
                <h6>8</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Bank Transfer</h6>
            </div>
            <div class="col-md-3 mt-1">
                <h6>Opening Balance(+)</h6>
                <p class="font-size-base">Purchase (-)</p>
                <p class="font-size-base">Sale (+)</p>
                <p class="font-size-base">Due Payment (-)</p>
                <p class="font-size-base">Expense (-)</p>
                <p class="font-size-base font-weight-bold">Closing Balance</p>
            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bank_opening" value="{{$register->bank_transfer}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bank_purchase" value="{{$register_amount['bank_transfer']['purchases']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bank_sale" value="{{$register_amount['bank_transfer']['sales']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bank_due" value="{{$register_amount['bank_transfer']['payments']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bank_expense" value="{{$register_amount['bank_transfer']['expenses']}}" readonly>
                <input type="number" class="font-size-base text-center border-0 pt-0" id="bank_closing" value="{{$register->cash}}" readonly>
            </div>
        </div>


        <div class="row">
            <div class="col-md-3 mt-1">

            </div>
            <div class="col-md-3 mt-1">
                <h4 class="font-size-base font-weight-bold">Total</h4>
            </div>
            <div class="col-md-3 mt-1">

            </div>
            <div class="col-md-3 mt-1">
                <input type="number" class="font-size-base text-center border-0 pt-0" id="register_total" value="" readonly>
            </div>
        </div>
