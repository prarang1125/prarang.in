@extends('yellowpages::layout.script')

@section('title', __('messages.yellow_pages'))

@section('content')
<div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; min-height: 90vh; padding: 10px; background-color: #fff;">
    
    <!-- Text Content -->
    <div style="flex: 1; max-width: 600px; padding: 20px; box-sizing: border-box;">
      <h1 style="font-size: 2.5em; color: #333; margin-bottom: 20px; font-weight: bold;">यह सब एक डिजिटल बिजनेस कार्ड से शुरू होता है।</h1>
      <p style="font-size: 1.2em; color: #555; line-height: 1.5; margin-bottom: 20px;">
        क्विक वीकार्ड एक डिजिटल बिजनेस कार्ड निर्माता SAAS स्क्रिप्ट है, जो आपके संपर्कों को साझा करने और अपने पेशेवर संबंधों को बढ़ाने का एक आसान तरीका है।
      </p>
      <a href="{{ route('yp.plan') }}" style="padding: 12px 24px; background-color: #fedd59; color: #fff; border-radius: 8px; font-size: 1.2em; text-decoration: none; font-weight: bold;">
        योजना देखे
      </a>
    </div>
    <!-- Image Content -->
    <div style="flex: 1; max-width: 400px; padding: 20px; box-sizing: border-box; text-align: center;">
      <img src="{{ asset('assets/Vcard/vcard.png') }}" alt="Digital Business Card" style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
    </div>
  </div>
    <!-- First Step -->
    <div class="container" style="padding: 0px 0; background-color: #f9f9f9;">
      <h2 style="text-align: center; font-size: 2.5em; margin-bottom: 40px; font-weight: bold; color: #333;">यह काम किस प्रकार करता है?</h2>
      <div class="row justify-content-center">
          <!-- Column 1 -->
          <div class="col-lg-4 col-md-6 text-center" style="margin-bottom: 30px;">
              <div class="icon-box">
                  <!-- Icon -->
                  <div class="icon-box-circle" style="display: inline-block; position: relative; margin-bottom: 20px;">
                      <div class="icon-box-circle-inner" style="width: 80px; height: 80px; border-radius: 50%; background-color: #fedd59; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 3em;">
                          <i class="fas fa-qrcode"></i> <!-- Corrected icon class -->
                      </div>
                  </div>
                  <!-- Text -->
                  <h3 style="font-size: 1.5em; margin-bottom: 15px; font-weight: bold; color: #333;">डिजिटल बिजनेस कार्ड बनाएं</h3>
                  <p style="font-size: 1em; color: #555; line-height: 1.5;">
                      अपने विज़िटिंग कार्ड के लिए आसानी से QR कोड बनाएँ और पहली बार में ही शानदार प्रभाव डालें। अपना प्रोफ़ाइल भरें—यह बहुत आसान है!
                  </p>
              </div>
          </div>
  
          <!-- Column 2 -->
          <div class="col-lg-4 col-md-6 text-center" style="margin-bottom: 30px;">
              <div class="icon-box">
                  <!-- Icon -->
                  <div class="icon-box-circle" style="display: inline-block; position: relative; margin-bottom: 20px;">
                      <div class="icon-box-circle-inner" style="width: 80px; height: 80px; border-radius: 50%; background-color: #fedd59; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 3em;">
                          <i class="fas fa-share-alt"></i> <!-- Corrected icon class -->
                      </div>
                  </div>
                  <!-- Text -->
                  <h3 style="font-size: 1.5em; margin-bottom: 15px; font-weight: bold; color: #333;">अपना कार्ड किसी के साथ साझा करें</h3>
                  <p style="font-size: 1em; color: #555; line-height: 1.5;">
                      QR कोड, ईमेल, लिंक और अन्य चीज़ों का उपयोग करके आसानी से अपना डिजिटल बिज़नेस कार्ड शेयर करें। आसानी से शेयर करें और कनेक्शन बढ़ाएँ।
                  </p>
              </div>
          </div>
  
          <!-- Column 3 -->
          <div class="col-lg-4 col-md-6 text-center" style="margin-bottom: 30px;">
              <div class="icon-box">
                  <!-- Icon -->
                  <div class="icon-box-circle" style="display: inline-block; position: relative; margin-bottom: 20px;">
                      <div class="icon-box-circle-inner" style="width: 80px; height: 80px; border-radius: 50%; background-color: #fedd59; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 3em;">
                          <i class="fas fa-users"></i> <!-- Corrected icon class -->
                      </div>
                  </div>
                  <!-- Text -->
                  <h3 style="font-size: 1.5em; margin-bottom: 15px; font-weight: bold; color: #333;">अधिक ग्राहक प्राप्त करें</h3>
                  <p style="font-size: 1em; color: #555; line-height: 1.5;">
                      आपके ग्राहक आप तक पहुँचने का कोई न कोई रास्ता ढूँढ़ ही लेंगे। उन्हें बस आपका QR कोड स्कैन करना होगा और कनेक्ट होने का सबसे अच्छा तरीका चुनना होगा।
                  </p>
              </div>
          </div>
      </div>
  </div>
  

      <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; min-height: 70vh; padding: 20px; background-color: #fff;">
    
            <!-- Image Content -->
            <div style="flex: 1; max-width: 400px; padding: 20px; box-sizing: border-box; text-align: center;">
                <img src="{{ asset('assets/Vcard/vcard-1.png') }}" alt="Digital Business Card" style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
              </div>
        <!-- Text Content -->
        <div style="flex: 1; max-width: 600px; padding: 20px; box-sizing: border-box;">
          <h1 style="font-size: 2.5em; color: #333; margin-bottom: 20px; font-weight: bold;">संपर्क रहित डिजिटल बिज़नेस कार्ड</h1>
          <p style="font-size: 1.2em; color: #555; line-height: 1.5; margin-bottom: 20px;">
            क्विक वीकार्ड एक आदर्श संपर्क रहित अनुभव के साथ किसी भी नए सैनिटरी घर्षण को आसानी से दूर करने और इसके वायरल फीचर्स के साथ आपके पेशेवर संबंधों को बढ़ाने में मदद करता है। वर्चुअल बिजनेस कार्ड भेजने या प्राप्त करने के लिए किसी भौतिक संपर्क की आवश्यकता नहीं है। आप जितने चाहें उतने बिजनेस कार्ड बना सकते हैं, प्रत्येक कार्ड पर अलग-अलग जानकारी के साथ। अपने कार्य संपर्कों के लिए एक कार्ड बनाएं, एक क्लाइंट या ग्राहकों के लिए और एक अपने दोस्तों के लिए।
          </p>
        </div>
      </div>

      <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: center; min-height: 70vh; padding: 20px; background-color: #fff;">
    
        <!-- Text Content -->
        <div style="flex: 1; max-width: 600px; padding: 20px; box-sizing: border-box;">
          <h1 style="font-size: 2.5em; color: #333; margin-bottom: 20px; font-weight: bold;">अपना कार्ड किसी के साथ साझा करें</h1>
          <p style="font-size: 1.2em; color: #555; line-height: 1.5; margin-bottom: 20px;">
            क्यूआर कोड का उपयोग करके आसानी से अपने डिजिटल बिजनेस कार्ड को किसी के साथ साझा करें या इसे ईमेल, लिंक आदि के माध्यम से भेजें। आप क्यूआर कोड डाउनलोड कर सकते हैं और इसे फ्लायर्स, न्यूज़लेटर्स या बिलबोर्ड जैसी किसी भी चीज़ पर प्रिंट कर सकते हैं।
          </p>
        
        </div>
    
        <!-- Image Content -->
        <div style="flex: 1; max-width: 400px; padding: 20px; box-sizing: border-box; text-align: center;">
          <img src="{{ asset('assets/Vcard/vcard-2.png') }}" alt="Digital Business Card" style="width: 100%; height: auto; border-radius: 15px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
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
        document.getElementById("price-display").innerText = "₹100/Monthly";
        document.getElementById("selected-plan-amount").value = "100";
    } else {
        document.getElementById("price-display").innerText = "₹1000/Yearly";
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
