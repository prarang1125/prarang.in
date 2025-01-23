function collectAndSendInformation(postId, city) {
    // Author: Vivek Yadav (dev.vivek16@gmail.com)
    // Copyright: Prarang

    const currentUrl = window.location.href;

    // Helper function to get a cookie value
    const getCookie = (name) => {
        const cookies = document.cookie.split('; ');
        for (let cookie of cookies) {
            const [key, value] = cookie.split('=');
            if (key === name) return value;
        }
        return null;
    };

    // Helper function to set a cookie
    const setCookie = (name, value, days) => {
        const date = new Date();
        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
        document.cookie = `${name}=${value};expires=${date.toUTCString()};path=/`;
    };

    // Function to get geolocation
    const getGeolocation = async () => {
        return new Promise((resolve, reject) => {
            if (!navigator.geolocation) {
                return reject(new Error("Geolocation is not supported by this browser."));
            }
            navigator.geolocation.getCurrentPosition(
                (position) => resolve(position),
                (error) => reject(error)
            );
        });
    };

    // Fetch IP address using ipify API
    const fetchIpAddress = async () => {
        try {
            const response = await fetch('https://api.ipify.org?format=json');
            if (!response.ok) throw new Error(`Failed to fetch IP: ${response.status}`);
            const data = await response.json();
            return data.ip;
        } catch (error) {
            console.error("Error fetching IP address:", error.message);
            return null;
        }
    };

    const sendVisitorData = async () => {
        let latitude = null;
        let longitude = null;

        // Fetch IP address
        const ipAddress = await fetchIpAddress();

        // Track visits using localStorage
        const visitCount = parseInt(localStorage.getItem('visitCount') || '0', 10) + 1;
        localStorage.setItem('visitCount', visitCount);

        // Check if location permission is denied
        const locationDenied = getCookie('locationDenied');

        if (visitCount >= 3 && !locationDenied) {
            try {
                const position = await getGeolocation();
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
            } catch (error) {
                console.error("Error getting geolocation:", error.message);

                // Handle specific geolocation errors
                if (error.code === error.PERMISSION_DENIED) {
                    console.warn("Location access denied by the user.");
                    setCookie('locationDenied', 'true', 30);
                } else if (error.code === error.POSITION_UNAVAILABLE) {
                    console.warn("Location information is unavailable.");
                } else if (error.code === error.TIMEOUT) {
                    console.warn("The request to get user location timed out.");
                } else {
                    console.warn("An unknown geolocation error occurred.");
                }
            }
        } else {
            console.log("Location permission not requested due to conditions.");
        }

        // Gather other data
        const browserInfo = navigator.userAgent;
        const language = navigator.language;
        const screenWidth = screen.width;
        const screenHeight = screen.height;

        // Prepare the data as query parameters
        const queryParams = new URLSearchParams({
            city: city,
            post_id: postId,
            current_url: currentUrl,
            ip_address: ipAddress || 'N/A',
            latitude: latitude || 'null',
            longitude: longitude || 'null',
            language: language,
            screen_width: screenWidth,
            screen_height: screenHeight,
            timestamp: new Date().toISOString(),
        }).toString();

        console.log("Query Parameters:", queryParams);

        // Send the data using GET request
        try {
            const response = await fetch(`/visitor-location?${queryParams}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                },
            });

            if (!response.ok) throw new Error(`Failed to send data: ${response.status}`);
            const responseData = await response.json();
            console.log('Data sent successfully:', responseData);
        } catch (error) {
            console.error("Error sending data:", error.message);
        }
    };

    // Execute the function
    sendVisitorData().catch((error) => {
        console.error("An unexpected error occurred:", error.message);
    });
}

// Trigger the function when the page loads
