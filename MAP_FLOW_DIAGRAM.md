# Country Portal Maps - Flow Diagram

## System Architecture

```
┌─────────────────────────────────────────────────────────────────┐
│                         DATABASE LAYER                          │
├─────────────────────────────────────────────────────────────────┤
│  Table: country_portals                                         │
│  ┌──────┬──────────────┬──────────────┬──────────────────────┐ │
│  │  id  │ country_name │ country_code │        maps          │ │
│  ├──────┼──────────────┼──────────────┼──────────────────────┤ │
│  │  1   │   India      │    CON24     │  https://maps...     │ │
│  │  2   │   China      │    CON25     │  https://maps...     │ │
│  │  3   │   Czech      │    CON1      │  NULL                │ │
│  └──────┴──────────────┴──────────────┴──────────────────────┘ │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│                      CONTROLLER LAYER                           │
├─────────────────────────────────────────────────────────────────┤
│  PortalController::bilateralCountriesPortal()                   │
│                                                                  │
│  1. Fetch BiletralPortal by slug                                │
│  2. Load primaryCountry relationship                            │
│  3. Load secondaryCountry relationship                          │
│  4. Pass to view: $main, $primary, $secondary                   │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│                         VIEW LAYER                              │
├─────────────────────────────────────────────────────────────────┤
│  country.blade.php                                              │
│                                                                  │
│  PHP Logic:                                                     │
│  ┌────────────────────────────────────────────────────────┐    │
│  │ $primaryHasMap = !empty($primary->maps);               │    │
│  │ $secondaryHasMap = !empty($secondary->maps);           │    │
│  │ $showDropdown = $primaryHasMap && $secondaryHasMap;    │    │
│  └────────────────────────────────────────────────────────┘    │
└─────────────────────────────────────────────────────────────────┘
                              ↓
┌─────────────────────────────────────────────────────────────────┐
│                    RENDERING DECISION TREE                      │
└─────────────────────────────────────────────────────────────────┘

                    Both Countries Have Maps?
                              │
                ┌─────────────┴─────────────┐
               YES                          NO
                │                            │
        ┌───────────────┐          Only Primary Has Map?
        │ Show Dropdown │                   │
        │ + Both Maps   │         ┌─────────┴─────────┐
        │ (one hidden)  │        YES                  NO
        └───────────────┘         │                    │
                            ┌─────────────┐    Only Secondary Has Map?
                            │ Show Primary│            │
                            │  Map Only   │    ┌───────┴────────┐
                            └─────────────┘   YES               NO
                                              │                  │
                                        ┌─────────────┐   ┌──────────────┐
                                        │Show Secondary│   │ Show "No Maps│
                                        │   Map Only   │   │  Available"  │
                                        └─────────────┘   └──────────────┘

## User Interaction Flow

```
┌─────────────────────────────────────────────────────────────────┐
│                        USER ACTIONS                             │
└─────────────────────────────────────────────────────────────────┘

1. Page Load
   │
   ├─→ JavaScript initializes
   │   ├─→ Get map elements (primary-map, secondary-map)
   │   ├─→ Get dropdown element (map-select)
   │   └─→ Set default map visibility
   │
2. User Clicks "Map Toggle Button"
   │
   ├─→ JavaScript adds 'header-map--active' class
   └─→ Map overlay slides down and becomes visible
       │
       ├─→ If dropdown exists:
       │   │
       │   └─→ User sees dropdown with country options
       │       │
       │       └─→ User selects different country
       │           │
       │           └─→ JavaScript switchMap() function
       │               ├─→ Hide current map iframe
       │               └─→ Show selected map iframe
       │
       └─→ If no dropdown:
           └─→ User sees single map directly

3. User Clicks "Close Map Button"
   │
   └─→ JavaScript removes 'header-map--active' class
       └─→ Map overlay slides up and becomes hidden
```

## Code Execution Flow

```
┌─────────────────────────────────────────────────────────────────┐
│                    BLADE TEMPLATE RENDERING                     │
└─────────────────────────────────────────────────────────────────┘

Step 1: Check Map Availability
┌────────────────────────────────────────────────────────────┐
│ @php                                                       │
│   $primaryHasMap = !empty($primary->maps);                 │
│   $secondaryHasMap = !empty($secondary->maps);             │
│   $showDropdown = $primaryHasMap && $secondaryHasMap;      │
│ @endphp                                                    │
└────────────────────────────────────────────────────────────┘
                            ↓
Step 2: Render Dropdown (Conditional)
┌────────────────────────────────────────────────────────────┐
│ @if($showDropdown)                                         │
│   <select id="map-select">                                 │
│     <option value="primary">{{ $primary->country_name }}   │
│     <option value="secondary">{{ $secondary->country_name }}│
│   </select>                                                │
│ @endif                                                     │
└────────────────────────────────────────────────────────────┘
                            ↓
Step 3: Render Map Iframes
┌────────────────────────────────────────────────────────────┐
│ @if($primaryHasMap)                                        │
│   <iframe id="primary-map" src="{{ $primary->maps }}">    │
│ @endif                                                     │
│                                                            │
│ @if($secondaryHasMap)                                      │
│   <iframe id="secondary-map" src="{{ $secondary->maps }}">│
│ @endif                                                     │
└────────────────────────────────────────────────────────────┘
                            ↓
Step 4: JavaScript Event Listeners
┌────────────────────────────────────────────────────────────┐
│ document.addEventListener('DOMContentLoaded', function() { │
│   mapSelect.addEventListener('change', function() {        │
│     switchMap(this.value);                                 │
│   });                                                      │
│ });                                                        │
└────────────────────────────────────────────────────────────┘
```

## Map Switching Logic

```javascript
function switchMap(mapType) {
    if (primaryMap && secondaryMap) {
        if (mapType === 'primary') {
            primaryMap.style.display = 'block';   // Show Primary
            secondaryMap.style.display = 'none';  // Hide Secondary
        } else if (mapType === 'secondary') {
            primaryMap.style.display = 'none';    // Hide Primary
            secondaryMap.style.display = 'block'; // Show Secondary
        }
    }
}
```

## Button Label Logic

```
Map Toggle Button Label Decision:

IF ($showDropdown) 
    → Display: "Country Maps"
    
ELSE IF ($primaryHasMap)
    → Display: "{{ $primary->country_name }} MAP"
    
ELSE IF ($secondaryHasMap)
    → Display: "{{ $secondary->country_name }} MAP"
    
ELSE
    → Hide Button (no maps available)
```

## Example Scenarios

### Scenario A: India + China (Both Have Maps)
```
Database:
├─ India (id=2):  maps = "https://maps.google.com/...india"
└─ China (id=3):  maps = "https://maps.google.com/...china"

Result:
├─ Dropdown: ☑ Visible
│  ├─ Option 1: "India MAP"
│  └─ Option 2: "China MAP" (selected)
├─ Primary Map (India): Hidden initially
├─ Secondary Map (China): Visible initially
└─ Button Label: "Country Maps"
```

### Scenario B: India Only (China Has NULL)
```
Database:
├─ India (id=2):  maps = "https://maps.google.com/...india"
└─ China (id=3):  maps = NULL

Result:
├─ Dropdown: ☐ Not Visible
├─ Primary Map (India): Visible
├─ Secondary Map (China): Not Rendered
└─ Button Label: "India MAP"
```

### Scenario C: No Maps Available
```
Database:
├─ India (id=2):  maps = NULL
└─ China (id=3):  maps = NULL

Result:
├─ Dropdown: ☐ Not Visible
├─ Primary Map: Not Rendered
├─ Secondary Map: Not Rendered
├─ Info Message: "No maps available for these countries yet."
└─ Button: Hidden
```

## Performance Considerations

1. **Lazy Loading**: Maps use `loading="lazy"` attribute
2. **Conditional Rendering**: Only render iframes if map data exists
3. **CSS Display Toggle**: Use display:none/block instead of DOM manipulation
4. **Single Event Listener**: One change listener for dropdown
5. **No External API Calls**: Maps loaded directly from Google's CDN

## Security Notes

- Map URLs are stored in database (validated on admin input)
- iframes use `referrerpolicy="no-referrer-when-downgrade"`
- No user input directly affects map rendering
- XSS protection via Blade's {{ }} escaping

---

**Last Updated**: 2025-10-04
**Version**: 1.0
**Status**: ✅ Implemented & Tested
