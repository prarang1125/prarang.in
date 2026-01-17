@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
<style>
  @media (max-width:640px) {

    /* Division */
    .main>div {
      display: flex;
      transform: translatex(0px) translatey(0px);
      flex-direction: column;
      padding-top: 99px !important;
    }

    /* Division */
    .main div div {
      padding-top: 49px !important;
    }

    /* Link */
    .main div a {
      width: 100%;
    }

  }
</style>
<div
  style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; min-height: 90vh; padding: 10px; background-color: #fff;">

  <!-- Text Content -->
  <div style="flex: 1; max-width: 600px; padding: 20px; box-sizing: border-box;">
    <h1 style="font-size: 2.5em; color: #333; margin-bottom: 20px; font-weight: bold;">{{ __('yp.create_webpage_hindi')
      }}</h1>
    <p style="font-size: 1.2em; color: #555; line-height: 1.5; margin-bottom: 20px;">
      {{ __('yp.online_business_msg') }}
    </p>
    <a href="{{ route('yp.newAccount') }}"
      style="padding: 12px 24px; background-color: #fedd59; color: #fff; border-radius: 8px; font-size: 1.2em; text-decoration: none; font-weight: bold;">
      {{ __('yp.create_webpage_btn') }}
    </a>
  </div>
  <!-- Image Content -->
  <div style="flex: 1; max-width: 400px; padding: 20px; box-sizing: border-box; text-align: center;">
    <img src="{{ asset('assets/Vcard/vcard.png') }}" alt="Digital Business Card"
      style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
  </div>
</div>


<script>
  document.getElementById("monthly").addEventListener("click", function() {
    updatePrice("monthly");
  });

document.getElementById("yearly").addEventListener("click", function() {
    updatePrice("yearly");
});

function updatePrice(plan) {
    if (plan === "monthly") {
        document.getElementById("price-display").innerText = "{{ __('yp.monthly_price') }}";
        document.getElementById("selected-plan-amount").value = "100";
    } else {
        document.getElementById("price-display").innerText = "{{ __('yp.yearly_price') }}";
        document.getElementById("selected-plan-amount").value = "1000";
    }
}

document.getElementById('checkout-button').addEventListener('click', function () {
    const amount = document.getElementById('selected-plan-amount').value;

    fetch('/create-checkout-session', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ amount: amount }),
    })
    .then(response => response.json())
    .then(session => {
        const stripe = Stripe('your_stripe_public_key');
        stripe.redirectToCheckout({ sessionId: session.id });
    })
    .catch(error => console.error('Error:', error));
});

</script>
@endsection
@push('scripts')
@endpush