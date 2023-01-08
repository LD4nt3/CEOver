
document.addEventListener('deviceready', function () {
   Enable to debug issues.
   window.plugins.OneSignal.setLogLevel({logLevel: 4, visualLevel: 4});
  
  var notificationOpenedCallback = function(jsonData) {
    console.log('notificationOpenedCallback: ' + JSON.stringify(jsonData));
  };

  window.plugins.OneSignal
    .startInit("27d0ce01-60ad-4a8f-9521-e9143be5a111")
    .handleNotificationOpened(notificationOpenedCallback)
    .endInit();
}, false);
