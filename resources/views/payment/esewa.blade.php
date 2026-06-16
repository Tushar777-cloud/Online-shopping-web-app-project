<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">eSewa Payment</div>
            <div class="card-body text-center">
                <img src="https://esewa.com.np/img/logo.png" alt="eSewa" style="height: 60px;">
                <p class="mt-3">You will be redirected to eSewa to complete your payment.</p>
                <form action="{{ config('services.esewa.test_mode') ? 'https://uat.esewa.com.np/epay/main' : 'https://esewa.com.np/epay/main' }}" method="POST" id="esewa-form">
                    <input type="hidden" name="amt" value="{{ $tAmt }}">
                    <input type="hidden" name="txAmt" value="0">
                    <input type="hidden" name="psc" value="0">
                    <input type="hidden" name="pAmt" value="{{ $tAmt }}">
                    <input type="hidden" name="tAmt" value="{{ $tAmt }}">
                    <input type="hidden" name="pid" value="{{ $pid }}">
                    <input type="hidden" name="scd" value="{{ $scd }}">
                    <input type="hidden" name="su" value="{{ $su }}">
                    <input type="hidden" name="fu" value="{{ $fu }}">
                </form>
                <button class="btn btn-primary" onclick="document.getElementById('esewa-form').submit();">
                    Pay with eSewa
                </button>
            </div>
        </div>
    </div>
</div>