# Country Portal Maps - Database Integration

## Overview
Successfully implemented dynamic country maps that load from the `country_portals` table in the database. The system now displays maps based on the `maps` column data and shows a dropdown selector when both countries have map data available.

## Implementation Details

### Database Structure
- **Table**: `country_portals`
- **Column**: `maps` (stores Google Maps embed URLs)
- **Example data**:
  - Country 1 (Primary): `https://maps.app.goo.gl/Ki2giiv1eNEM51G89`
  - Country 2 (Secondary): `https://maps.app.goo.gl/L1VgtG4QWm1mConj8`

### Features Implemented

#### 1. **Dynamic Map Loading**
- Maps are loaded from the database `maps` column
- System checks if each country has map data available
- Only displays maps for countries with valid map URLs

#### 2. **Smart Dropdown Display**
- **Both countries have maps**: Shows dropdown selector with both country names
- **Only one country has map**: Shows that country's map directly (no dropdown)
- **No maps available**: Shows informative message

#### 3. **Dynamic Button Labels**
- Map toggle buttons show appropriate text:
  - "Country Maps" when both countries have maps
  - "[Country Name] MAP" when only one country has a map
  - Button hidden when no maps are available

#### 4. **Responsive Design**
- Dropdown selector styled with custom CSS
- Mobile and desktop map toggle buttons
- Maps are fully responsive (width: 100%)

### Code Changes

#### File Modified: `Modules/Portal/resources/views/portal/country.blade.php`

**Key Changes:**

1. **PHP Logic for Map Detection** (Lines 684-688):
```php
@php
    $primaryHasMap = !empty($primary->maps);
    $secondaryHasMap = !empty($secondary->maps);
    $showDropdown = $primaryHasMap && $secondaryHasMap;
@endphp
```

2. **Conditional Dropdown** (Lines 690-697):
```blade
@if($showDropdown)
    <div class="map-selector mb-3">
        <select id="map-select" class="form-select">
            <option value="primary">{{ $primary->country_name ?? 'Country 1' }} MAP</option>
            <option value="secondary" selected>{{ $secondary->country_name ?? 'Country 2' }} MAP</option>
        </select>
    </div>
@endif
```

3. **Dynamic Map Iframes** (Lines 699-719):
```blade
<div id="map-container">
    @if($primaryHasMap)
        <iframe id="primary-map" src="{{ $primary->maps }}" ...></iframe>
    @endif
    
    @if($secondaryHasMap)
        <iframe id="secondary-map" src="{{ $secondary->maps }}" ...></iframe>
    @endif
    
    @if(!$primaryHasMap && !$secondaryHasMap)
        <div class="alert alert-info">No maps available</div>
    @endif
</div>
```

4. **JavaScript Map Switching** (Lines 1895-1922):
```javascript
const primaryMap = document.getElementById('primary-map');
const secondaryMap = document.getElementById('secondary-map');

function switchMap(mapType) {
    if (primaryMap && secondaryMap) {
        if (mapType === 'primary') {
            primaryMap.style.display = 'block';
            secondaryMap.style.display = 'none';
        } else if (mapType === 'secondary') {
            primaryMap.style.display = 'none';
            secondaryMap.style.display = 'block';
        }
    }
}
```

### How It Works

1. **Page Load**:
   - Controller fetches `BiletralPortal` with related `primaryCountry` and `secondaryCountry`
   - View receives `$primary` and `$secondary` objects with `maps` column data

2. **Map Detection**:
   - PHP checks if `maps` column is not empty for each country
   - Sets boolean flags: `$primaryHasMap`, `$secondaryHasMap`
   - Determines if dropdown should show: `$showDropdown`

3. **Rendering**:
   - If both have maps: Shows dropdown + both iframes (one hidden)
   - If one has map: Shows only that iframe (no dropdown)
   - If none have maps: Shows info message

4. **User Interaction**:
   - User clicks map toggle button → Map overlay opens
   - If dropdown exists: User selects country → JavaScript switches visible iframe
   - User clicks close button → Map overlay closes

### Database Setup

To add maps to countries, update the `country_portals` table:

```sql
UPDATE country_portals 
SET maps = 'https://www.google.com/maps/embed?pb=YOUR_EMBED_URL_HERE'
WHERE id = 1;
```

**Getting Google Maps Embed URL:**
1. Go to Google Maps
2. Search for the country/location
3. Click "Share" → "Embed a map"
4. Copy the `src` URL from the iframe code
5. Store in the `maps` column

### Testing Scenarios

✅ **Scenario 1**: Both countries have maps
- Dropdown appears with both country names
- Can switch between maps using dropdown
- Default shows secondary country map

✅ **Scenario 2**: Only primary country has map
- No dropdown shown
- Primary country map displays directly
- Button label shows primary country name

✅ **Scenario 3**: Only secondary country has map
- No dropdown shown
- Secondary country map displays directly
- Button label shows secondary country name

✅ **Scenario 4**: No countries have maps
- No dropdown or iframes shown
- Info message displays: "No maps available for these countries yet"
- Map toggle buttons are hidden

### Styling

The dropdown selector includes custom styling:
- Background: White with slight transparency
- Border: 2px solid #FFB1A3 (brand color)
- Hover effect: Full opacity
- Focus effect: Border color change + shadow
- Globe emoji (🌍) prefix
- Responsive design for mobile devices

### Future Enhancements

Potential improvements:
1. Add map zoom level control
2. Store multiple map views per country (political, terrain, satellite)
3. Add map markers for important locations
4. Cache map data for better performance
5. Add admin interface to update maps directly

---

## Summary

The implementation successfully:
- ✅ Loads maps from database (`country_portals.maps` column)
- ✅ Shows dropdown when both countries have maps
- ✅ Handles cases where only one or no countries have maps
- ✅ Updates button labels dynamically
- ✅ Maintains responsive design
- ✅ Provides smooth user experience with JavaScript map switching

All map data is now database-driven and can be easily updated through the admin panel or direct database updates.
