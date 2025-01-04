function collectAndSendInformation() {
    // Author: Vivek Yadav (dev.vivek16@gmail.com)
    // Copyright: Prarang

    const currentUrl = window.location.href;

    // Fetch IP address using ipify API
    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(async data => {
            const ipAddress = data.ip;
            let latitude = null;
            let longitude = null;

            // Check if geolocation is available and fetch the coordinates
            if (navigator.geolocation) {
                try {
                    // Wait for the geolocation to be fetched asynchronously
                    const position = await new Promise((resolve, reject) => {
                        navigator.geolocation.getCurrentPosition(resolve, reject);
                    });

                    latitude = position.coords.latitude;
                    longitude = position.coords.longitude;
                } catch (error) {
                    console.log("Error getting geolocation: " + error.message);
                }
            } else {
                console.log("Geolocation is not supported by this browser.");
            }

            const browserInfo = navigator.userAgent;
            const language = navigator.language;
            const screenWidth = screen.width;
            const screenHeight = screen.height;

            // Prepare the data as query parameters
            const queryParams = new URLSearchParams({
                currentUrl: currentUrl,
                ipAddress: ipAddress,
                latitude: latitude,
                longitude: longitude,
                // browserInfo: browserInfo,
                language: language,
                screenWidth: screenWidth,
                screenHeight: screenHeight,
                timestamp: new Date().toISOString() // Add timestamp
            }).toString();

            console.log(queryParams); // Log the query parameters to verify

            // Send the data using GET request with query parameters
            try {
                const response = await fetch(`/visitor-location?${queryParams}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                });

                const responseData = await response.json();
                console.log('Data sent successfully:', responseData);
            } catch (error) {
                console.log('Error sending data:', error);
            }
        })
        .catch(error => {
            console.log("Error fetching IP address: " + error);
        });
}

// Trigger the function when the page loads
window.onload = collectAndSendInformation;
