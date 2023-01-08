<?php
session_start();
$_SESSION['id_empleado']="";

/*
echo'
<script>
  var OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "327cf059-eb1c-4c13-8396-08802607f832",
    });

  });

</script>
<script> OneSignal.isPushNotificationsEnabled().then(function(isEnabled) {
    if (isEnabled){

OneSignal.deleteTags(["userEm", "userId"]);
    }
    else{
        window.location.replace("http://ceover.com/home.htm");
    }

})
</script>';*/
header('location: home.html')
?>