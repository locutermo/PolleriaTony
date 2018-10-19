<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <p id="hola">

    </p>
</head>
<body>
    
</body>
</html>



<script src="https://www.gstatic.com/firebasejs/5.5.5/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyAXs8Go969Nj_-SteA6KY4jM_D9e6Fr4KA",
    authDomain: "polleriatony.firebaseapp.com",
    databaseURL: "https://polleriatony.firebaseio.com",
    projectId: "polleriatony",
    storageBucket: "polleriatony.appspot.com",
    messagingSenderId: "1079285825680"
  };
  firebase.initializeApp(config);
  const hola = document.getElementById('hola');

    db = firebase.database(),
    refText = db.ref().child('name')
    console.log(db,refText);

    refText.on('value',data=>{
        hola.innerText = data.val()
    })

    db.ref().child('data-push').push({
        message: "Probando, insertando datos con el metodo push"
    })

    db.ref().child('data-set').set({
        message: "Probando, insertando datos con el metodo set"
    })

    db.ref().child('data-set-push').push().set({
        message: "Probando, insertando datos con el metodo push y set"
    })

</script>