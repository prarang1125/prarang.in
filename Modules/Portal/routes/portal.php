<?php

use Illuminate\Support\Facades\Route;
use Modules\Portal\Http\Controllers\PortalController;


Route::get('/{portal:slug}', [PortalController::class, 'portal'])
    ->where('portal', '^(?!yp|yellow-pages|partner-api|prapi|india-czech).*')
    ->name('portal');
Route::get('/india-czech', function () {
    $portal = [
        'slug' => 'india-czech',
        'city_name' => 'India-Czech',
        'city_name_local' => 'इंडिया-चेक',
        'city_slogan' => 'Bridging India and Czech Republic',
        'map_link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45505.81152951167!2d77.18209824985552!3d28.52733321546363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1e70a9b21689%3A0x132742497b7643e!2sCzech%20Republic%20Embassy!5e0!3m2!1sen!2sin!4v1665815340359!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
        'header_image' => 'prarang-1.jpg',
        'footer_image' => 'prarang-2.jpg.gif',
        'local_matrics' => '<p>Local metrics for India-Czech relations.</p>',
        'news_widget_code' => '',
        'weather_widget_code' => '',
        'local_lang' => 'hi',
        'header_scripts' => '',
        'footer_scripts' => ''
    ];
    return view('portal::portal.india-czech', compact('portal'));
})->name('portal.india-czech');
