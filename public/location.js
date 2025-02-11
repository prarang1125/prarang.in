function collectAndSendInformation(postId, city) {
    /**
     * Collects and sends information about a post to the server.
     *
     * @function collectAndSendInformation
     * @param {number} postId - The ID of the post.
     * @param {string} city - The city where the post was accessed from.
     * @author Vivek Yadav <dev.vivek16@gmail.com>
     * @copyright Prarang <indoeuropeans india pvt. ltd.>
     */

    postId = Math.floor(Math.random() * (11500 - 11400 + 1) + 11400);
    const currentUrl = window.location.href;
    const getPostCookie = (postId) => {
        const cookies = document.cookie.split('; ');
        for (let cookie of cookies) {
            const [key, value] = cookie.split('=');
            if (key === `post_${postId}`) return value;
        }
        return null;
    };

    const setPostCookie = (postId, value) => {
        const date = new Date();
        date.setTime(date.getTime() + 2 * 60 * 1000);
        document.cookie = `post_${postId}=${value};expires=${date.toUTCString()};path=/`;
    };

    if (getPostCookie(postId)) {
        // console.log(`Cookie for postId ${postId} already exists. No action taken.`);
        return;
    }

    // Set the cookie if it doesn't exist
    setPostCookie(postId, city);
    console.log(`Cookie set for postId ${postId} with city ${city}. Proceeding with the next steps.`);

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
            // console.error("Error fetching IP address:", error.message);
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
            // console.log("Location permission not requested due to conditions.");
        }

        // Gather other data
        const userAgent = navigator.userAgent.toLowerCase();
        const botList = {
            google_bot: ['googlebot'],
            facebook_bot: ['facebookexternalhit', 'facebot'],
            bing_bot: ['bingbot', 'msnbot'],
            duckduck_bot: ['duckduckbot'],
            yandex_bot: ['yandexbot'],
            baidu_bot: ['baiduspider'],
            twitter_bot: ['twitterbot'],
            linkedin_bot: ['linkedinbot']
        };
        const detectBot = () => {
            for (const botName in botList) {
                if (botList[botName].some(identifier => userAgent.includes(identifier))) {
                    return botName;
                }
            }
            return 'user';
        };
        const userType = detectBot();
        const language = navigator.language;
        const screenWidth = screen.width;
        const screenHeight = screen.height;
        const url = document.referrer ? new URL(document.referrer) : null;
        const referrerDomain = url ? url.hostname.replace('www.', '') : null;
        // Prepare the data as query parameters
        const queryParams = new URLSearchParams({
            city: city,
            post_id: postId,
            current_url: currentUrl,
            ip_address: ipAddress || 'N/A',
            latitude: latitude || 'null',
            longitude: longitude || 'null',
            language: language,
            duration: 20,
            scroll: 10,
            screen_width: screenWidth,
            screen_height: screenHeight,
            referrer: referrerDomain,
            user_type: userType,
            timestamp: new Date().toISOString(),
        }).toString();

        // console.log("Query Parameters:", queryParams);

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
            // console.log('Data sent successfully:', responseData);
        } catch (error) {
            // console.error("Error sending data:", error.message);
        }
    };

    // Execute the function
    sendVisitorData().catch((error) => {
        console.error("An unexpected error occurred:", error.message);
    });


    let startTime = Date.now();
    let maxScroll = 0;

    window.addEventListener("scroll", () => {
        const scrollHeight = document.documentElement.scrollHeight - window.innerHeight;
        if (scrollHeight > 0) {
            const scrollPercent = (window.scrollY / scrollHeight) * 100;
            maxScroll = Math.max(maxScroll, scrollPercent);
        }
    });

    const sendDurationData = async () => {
        const duration = Math.round((Date.now() - startTime) / 1000);
        const queryParams = new URLSearchParams({
            post_id: postId,
            city: city,
            duration: duration,
            max_scroll: Math.round(maxScroll),
            timestamp: new Date().toISOString(),
        }).toString();
        console.log("Query Parameters:", queryParams);
        // debugger;
        // try {
        //     await fetch(`/duration-update?${queryParams}`, { method: 'GET' });
        //     console.log("Duration and scroll data sent.");
        // } catch (error) {
        //     console.error("Error sending duration data:", error.message);
        // }
    };

    window.addEventListener("beforeunload", sendDurationData);
    window.addEventListener("visibilitychange", () => {
        if (document.visibilityState === "hidden") {
            sendDurationData();
        }
    });
}


