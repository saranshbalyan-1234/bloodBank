// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyCnruMzO5bGiOH72KX5rCjvr1fVt7qnzTs",
    authDomain: "blood-bank-afc9f.firebaseapp.com",
    projectId: "blood-bank-afc9f",
    storageBucket: "blood-bank-afc9f.appspot.com",
    messagingSenderId: "806220075411",
    appId: "1:806220075411:web:a97259edf9d78c19621866",
    measurementId: "G-YRE07K5ESJ",
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
