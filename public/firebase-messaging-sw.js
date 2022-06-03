// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyCl_y7qG8kdmtzHYGetnwSvB_3FQ93H-8E",
  authDomain: "bloodbankreact.firebaseapp.com",
  projectId: "bloodbankreact",
  storageBucket: "bloodbankreact.appspot.com",
  messagingSenderId: "32835006686",
  appId: "1:32835006686:web:07056729def0dc9642124f",
  measurementId: "G-DSKW8WVN9K"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);

    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };

    return self.registration.showNotification(title, options);
});
