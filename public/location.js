function collectAndSendInformation() {
// Auther: Vivek Yadav (dev.vivek16@gmail.com)
// Copyright: Prarang

    const currentUrl = window.location.href;

    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            const ipAddress = data.ip;
            let latitude = null;
            let longitude = null;
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        latitude = position.coords.latitude;
                        longitude = position.coords.longitude;
                    },
                    function(error) {
                        console.log("Error getting geolocation: " + error.message);
                       
                    }
                );
            } else {
                console.log("Geolocation is not supported by this browser.");
            }         
            const browserInfo = navigator.userAgent;
            const language = navigator.language;
            const screenWidth = screen.width;
            const screenHeight = screen.height;
            const dataToSend = {
                currentUrl: currentUrl,
                ipAddress: ipAddress,
                latitude: latitude,
                longitude: longitude,
                browserInfo: browserInfo,
                language: language,
                screenWidth: screenWidth,
                screenHeight: screenHeight,
                timestamp: new Date().toISOString() // Add timestamp
            };
            console.log(dataToSend);
            // Wait for geolocation to be available if necessary
            setTimeout(() => {
                // 5. Send data to the server using POST request
                fetch('https://crm-test.prarang.com/visitor-location', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(dataToSend)
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Data sent successfully:', data);
                })
                .catch(error => {
                    console.log('Error sending data:', error);
                });
            }, 1000); // Wait for 1 second before sending the data (to give time for geolocation)
        })
        .catch(error => {
            console.log("Error fetching IP address: " + error);
        });
}

window.onload = collectAndSendInformation;
