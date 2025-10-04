# How to Add/Update Country Maps

## Quick Guide for Adding Maps to Country Portals

### Step 1: Get Google Maps Embed URL

1. **Open Google Maps** in your browser
   - Go to: https://www.google.com/maps

2. **Search for the country/location**
   - Example: "Pakistan", "India", "Czech Republic"

3. **Click the "Share" button**
   - Located on the left panel or bottom of the map

4. **Select "Embed a map" tab**
   - You'll see an iframe code

5. **Copy the URL from the iframe**
   - Look for the `src="..."` part
   - Example: `https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766769...`

### Step 2: Update Database

#### Option A: Using SQL Query

```sql
-- Update map for a specific country
UPDATE country_portals 
SET maps = 'YOUR_GOOGLE_MAPS_EMBED_URL_HERE'
WHERE country_code = 'CON24';

-- Example for Pakistan
UPDATE country_portals 
SET maps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7334719.524977911!2d63.12794384999999!3d30.375321349999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d2f8fd751f%3A0x46b7a1f7e614925c!2sPakistan!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin'
WHERE country_name = 'Pakistan';
```

#### Option B: Using Database GUI (phpMyAdmin, TablePlus, etc.)

1. Open your database management tool
2. Navigate to `country_portals` table
3. Find the country row you want to update
4. Click on the `maps` column
5. Paste the Google Maps embed URL
6. Save the changes

### Step 3: Verify the Update

1. **Check the database**:
```sql
SELECT id, country_name, maps 
FROM country_portals 
WHERE country_name = 'Pakistan';
```

2. **Visit the country portal page**:
   - Example: `https://yoursite.com/portal/india-pakistan`
   - Click the map toggle button
   - Verify the map displays correctly

## Common Map URLs

### Pre-configured Map Examples

#### Pakistan
```
https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7334719.524977911!2d63.12794384999999!3d30.375321349999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d2f8fd751f%3A0x46b7a1f7e614925c!2sPakistan!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin
```

#### India
```
https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766769.397866964!2d60.96789011826587!3d19.72500300181898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1758963998299!5m2!1sen!2sin
```

#### Czech Republic (Prague)
```
https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163930.7278572508!2d14.4656836!3d50.05974005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b939c0970798b%3A0x400af0f66164090!2sPrague%2C%20Czechia!5e0!3m2!1sen!2sin!4v1758963754171!5m2!1sen!2sin
```

#### China
```
https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27217883.098464847!2d87.33333333333333!3d35.86166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31508e64e5c642c1%3A0x951daa7c349f366f!2sChina!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin
```

## Bulk Update Script

If you need to add multiple maps at once:

```sql
-- Update multiple countries at once
UPDATE country_portals SET maps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7334719.524977911!2d63.12794384999999!3d30.375321349999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d2f8fd751f%3A0x46b7a1f7e614925c!2sPakistan!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin' WHERE country_code = 'PAK';

UPDATE country_portals SET maps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766769.397866964!2d60.96789011826587!3d19.72500300181898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1758963998299!5m2!1sen!2sin' WHERE country_code = 'IND';

UPDATE country_portals SET maps = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d163930.7278572508!2d14.4656836!3d50.05974005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b939c0970798b%3A0x400af0f66164090!2sPrague%2C%20Czechia!5e0!3m2!1sen!2sin!4v1758963754171!5m2!1sen!2sin' WHERE country_code = 'CZE';
```

## Troubleshooting

### Problem: Map doesn't show up

**Solution 1**: Check if the URL is correct
```sql
-- Verify the maps column has data
SELECT country_name, maps FROM country_portals WHERE country_code = 'YOUR_CODE';
```

**Solution 2**: Check if the URL is a valid Google Maps embed URL
- Must start with: `https://www.google.com/maps/embed?`
- Must contain: `pb=!1m18!1m12!1m3!...`

**Solution 3**: Clear browser cache
- Press `Ctrl + Shift + R` (Windows/Linux)
- Press `Cmd + Shift + R` (Mac)

### Problem: Dropdown doesn't appear

**Reason**: Only one country has a map, or both countries don't have maps

**Expected Behavior**:
- ✅ Both countries have maps → Dropdown appears
- ✅ Only one country has map → No dropdown, shows that map directly
- ✅ No countries have maps → Shows "No maps available" message

### Problem: Wrong map displays

**Solution**: Check the bilateral portal configuration
```sql
-- Verify which countries are linked to the portal
SELECT 
    bp.slug,
    bp.title,
    pc.country_name as primary_country,
    sc.country_name as secondary_country
FROM byletral_portals bp
LEFT JOIN country_portals pc ON bp.primary_country_id = pc.id
LEFT JOIN country_portals sc ON bp.secondary_country_id = sc.id
WHERE bp.slug = 'your-portal-slug';
```

## Testing Checklist

After adding/updating maps, verify:

- [ ] Map URL is stored in database
- [ ] Map displays when clicking the map toggle button
- [ ] Dropdown appears if both countries have maps
- [ ] Dropdown switches between maps correctly
- [ ] Map is responsive on mobile devices
- [ ] Map loads without errors (check browser console)
- [ ] Button label shows correct country name(s)

## Advanced: Custom Map Views

You can customize the map view by modifying the URL parameters:

### Zoom Level
- Change `4f13.1` to adjust zoom (higher = more zoomed in)
- Example: `4f8.1` (zoomed out), `4f15.1` (zoomed in)

### Map Type
Add `&maptype=satellite` for satellite view:
```
https://www.google.com/maps/embed?pb=!1m18!...&maptype=satellite
```

Options:
- `roadmap` (default)
- `satellite`
- `terrain`
- `hybrid`

### Center Point
Modify the coordinates in the URL:
- `!2d[longitude]!3d[latitude]`

## Need Help?

If you encounter issues:

1. Check the browser console for JavaScript errors
2. Verify database connection
3. Ensure the `maps` column accepts long text (TEXT or LONGTEXT type)
4. Check if Google Maps API is accessible (not blocked by firewall)

---

**Quick Reference SQL Commands**

```sql
-- View all countries and their maps
SELECT id, country_name, country_code, 
       CASE 
         WHEN maps IS NULL THEN '❌ No Map'
         ELSE '✅ Has Map'
       END as map_status
FROM country_portals;

-- Add map to a country
UPDATE country_portals 
SET maps = 'YOUR_EMBED_URL' 
WHERE id = 1;

-- Remove map from a country
UPDATE country_portals 
SET maps = NULL 
WHERE id = 1;

-- Find countries without maps
SELECT country_name, country_code 
FROM country_portals 
WHERE maps IS NULL OR maps = '';
```

---

**Last Updated**: 2025-10-04
**Author**: Development Team
