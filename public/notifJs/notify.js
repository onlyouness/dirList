// Define the showNotification function globally
console.log("notufy");
window.showNotification = function (param) {
    if (param) {
        console.log("there is param", param[0]);
        var notificationDiv = document.createElement("div");
        notificationDiv.classList.add("notification");
        notificationDiv.classList.add(param[1]); // Add class based on notification type

        // Set the notification message
        notificationDiv.innerText = param[0];

        // Append the notification div to the body
        document.body.appendChild(notificationDiv);

        // Remove the notification div after a certain time (e.g., 5 seconds)
        setTimeout(function () {
            notificationDiv.remove();
        }, 2000); // Adjust the time as needed (5 seconds in this case)
    } else {
        var notification = JSON.parse(sessionStorage.getItem("notification"));
        // Create a div element to display the notification
        var notificationDiv = document.createElement("div");
        notificationDiv.classList.add("notification");
        notificationDiv.classList.add(notification.type); // Add class based on notification type

        // Set the notification message
        notificationDiv.innerText = notification.message;
        console.log("hello", notificationDiv);
        console.log("here is the session", notification);

        // Append the notification div to the body
        document.body.appendChild(notificationDiv);

        // Remove the notification div after a certain time (e.g., 5 seconds)
        setTimeout(function () {
            notificationDiv.remove();
        }, 2000); // Adjust the time as needed (5 seconds in this case)
        sessionStorage.removeItem("notification");
    }
};
