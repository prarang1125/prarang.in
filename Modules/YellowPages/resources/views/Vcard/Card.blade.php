@extends('yellowpages::layout.vcard.vcard')
@section('title', 'Manage VCard')
@section('content')

<div class="container my-5">
    <br><br>
    <h2 class="text-center mt-6 mb-4">वीकार्ड प्रबंधित करें</h2>
    <div class="row">
        <!-- Left Card: Form -->
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="mb-4 d-flex align-items-center">
                        <span>वीकार्ड सूचना</span>
                        <div class="ms-3" style="border: 1px solid #ccc; border-radius: 4px;">
                            <a href="{{ url('yellow-pages/vcard/view/', ) }}" target="_blank">
                                <i class='bx bx-show' title="View Card" style="font-size: 24px;"></i>
                            </a>
                        </div>
                    </h5>                  
                    <form action="{{ route('vCard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="color_code" class="form-label">रंग पसंद करो</label>
                            <input type="color" class="form-control form-control-color" id="color_code" name="color_code" value="#007bff">
                        </div>
                        <div class="mb-3">
                            <label for="banner_img" class="form-label">बैनर अपलोड करें</label>
                            <input type="file" class="form-control" id="banner_img" name="banner_img">
                        </div>

                        <!-- Upload Logo -->
                        <div class="mb-3">
                            <label for="logo" class="form-label">लोगो अपलोड करें</label>
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>

                        <!-- Slug -->
                        <div class="mb-3">
                            <label for="slug" class="form-label">काउंटर</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter unique slug value">
                        </div>

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">शीर्षक</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
                        </div>

                        <!-- Subtitle -->
                        <div class="mb-3">
                            <label for="subtitle" class="form-label">उपशीर्षक</label>
                            <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter subtitle">
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">विवरण</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                        </div>

                          <!-- Dynamic Fields will be appended here -->
                          <div id="dynamic-fields"></div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary"value="Save_VCard" name="action">वीकार्ड सहेजें</button>
                        </div>
                    </form>
                </div>              
            </div>
        </div>

        <!-- Right Card: Add New Information -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <h5 class="mb-4">नई जानकारी जोड़ें</h5>
                    <div class="icon-box row gx-3 gy-3 justify-content-center">
                          <!-- Iterate icons and their corresponding labels -->
                        <div class="col-3 text-center" onclick="addField('Phone', 'phone')">
                            <i class='bx bx-phone' title="Phone" style="font-size: 24px;"></i>
                            <p class="mt-1">फ़ोन</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Email', 'email')">
                            <i class='bx bx-envelope' title="Email" style="font-size: 24px;"></i>
                            <p class="mt-1">ईमेल</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Address', 'address')">
                            <i class='bx bx-map' title="Address" style="font-size: 24px;"></i>
                            <p class="mt-1">पता</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Email', 'email')">
                            <i class='bx bx-globe' title="Website" style="font-size: 24px;"></i>
                            <p class="mt-1">वेबसाइट</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('text', 'Text')">
                            <i class='bx bx-message-square-dots' title="Text" style="font-size: 24px;"></i>
                            <p class="mt-1">मूलपाठ</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Facebook', 'facebook')">
                            <i class='bx bxl-facebook' title="Facebook" style="font-size: 24px;"></i>
                            <p class="mt-1">फेसबुक</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Twitter', 'twitter')">
                            <i class='bx bxl-twitter' title="Twitter" style="font-size: 24px;"></i>
                            <p class="mt-1">ट्विटर</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Instagram', 'instagram')">
                            <i class='bx bxl-instagram' title="Instagram" style="font-size: 24px;"></i>
                            <p class="mt-1">इंस्टाग्राम</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('WhatsApp', 'whatsapp')">
                            <i class='bx bxl-whatsapp' title="WhatsApp" style="font-size: 24px;"></i>
                            <p class="mt-1">व्हाट्सएप्प</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Telegram', 'telegram')">
                            <i class='bx bxl-telegram' title="Telegram" style="font-size: 24px;"></i>
                            <p class="mt-1">टेलीग्राम</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Skype', 'skype')">
                            <i class='bx bxl-skype' title="Skype" style="font-size: 24px;"></i>
                            <p class="mt-1">स्काइप</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('WeChat', 'wechat')">
                            <i class='bx bxl-wechat' title="WeChat" style="font-size: 24px;"></i>
                            <p class="mt-1">वीचैट</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Signal', 'signal')">
                            <i class='bx bxl-signal' title="Signal" style="font-size: 24px;"></i>
                            <p class="mt-1">संकेत</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Snapchat', 'snapchat')">
                            <i class='bx bxl-snapchat' title="Snapchat" style="font-size: 24px;"></i>
                            <p class="mt-1">स्नैपचैट</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('LinkedIn', 'linkedin')">
                            <i class='bx bxl-linkedin' title="LinkedIn" style="font-size: 24px;"></i>
                            <p class="mt-1">लिंक्डइन</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Pinterest', 'pinterest')">
                            <i class='bx bxl-pinterest' title="Pinterest" style="font-size: 24px;"></i>
                            <p class="mt-1">पिंटरेस्ट</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Soundcloud', 'soundcloud')">
                            <i class='bx bxl-soundcloud' title="Soundcloud" style="font-size: 24px;"></i>
                            <p class="mt-1">साउंडक्लाउड</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Vimeo', 'vimeo')">
                            <i class='bx bxl-vimeo' title="Vimeo" style="font-size: 24px;"></i>
                            <p class="mt-1">वीमियो</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Dribbble', 'dribbble')">
                            <i class='bx bxl-dribbble' title="Dribbble" style="font-size: 24px;"></i>
                            <p class="mt-1">ड्रिब्बल</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Behance', 'behance')">
                            <i class='bx bxl-behance' title="Behance" style="font-size: 24px;"></i>
                            <p class="mt-1">बेहांस</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Flickr', 'flickr')">
                            <i class='bx bxl-flickr' title="Flickr" style="font-size: 24px;"></i>
                            <p class="mt-1">फ़्लिकर</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('YouTube', 'youtube')">
                            <i class='bx bxl-youtube' title="YouTube" style="font-size: 24px;"></i>
                            <p class="mt-1">यूट्यूब</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Tiktok', 'tiktok')">
                            <i class='bx bxl-tiktok' title="TikTok" style="font-size: 24px;"></i>
                            <p class="mt-1">टिकटॉक</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Discord', 'discord')">
                            <i class='bx bxl-discord' title="Discord" style="font-size: 24px;"></i>
                            <p class="mt-1">Discord</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('Twitch', 'Twitch')">
                            <i class='bx bxl-twitch' title="Twitch" style="font-size: 24px;"></i>
                            <p class="mt-1">Twitch</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('GitHub', 'github')">
                            <i class='bx bxl-github' title="GitHub" style="font-size: 24px;"></i>
                            <p class="mt-1">GitHub</p>
                        </div>
                        <div class="col-3 text-center" onclick="addField('PayPal', 'paypal')">
                            <i class='bx bxl-paypal' title="PayPal" style="font-size: 24px;"></i>
                            <p class="mt-1">PayPal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    // Define the addField function globally
    function addField(label, fieldName) {
    const fieldHTML = `
        <div class="mb-3">
            <label for="${fieldName}" class="form-label">${label}</label>
            <input type="text" class="form-control" id="${fieldName}" name="data[]" placeholder="Enter ${label.toLowerCase()}">
            <input type="hidden" name="name[]" value="${label}">
        </div>
    `;
    const dynamicFields = document.getElementById('dynamic-fields');
    if (dynamicFields) {
        dynamicFields.insertAdjacentHTML('beforeend', fieldHTML);
    }
}

    // Ensure the script runs after DOM is loaded
    document.addEventListener("DOMContentLoaded", function () {
        console.log('Page fully loaded and DOM is ready.');
    });
</script>

