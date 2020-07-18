
<form action="{{ route('paywithpaypal') }}" method="POST">
    @csrf

    <button type="submit">Pay With Paypal</button>
</form>

@if ($message = session()->get('success'))
    <div class="w3-panel w3-green w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
              class="w3-button w3-green w3-large w3-display-topright">&times;</span>
        <p>{!! $message !!}</p>
    </div>
    <?php session()->forget('success');?>
@endif
@if ($message = session()->get('error'))
    <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
              class="w3-button w3-red w3-large w3-display-topright">&times;</span>
        <p>{!! $message !!}</p>
    </div>
    <?php session()->forget('error');?>
@endif