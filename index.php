<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>RFID</title>
   <link rel="stylesheet" href="./css/css.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

   <div class="container-fluid d-flex justify-content-center align-items-center vh-100" style="background-color: whitesmoke;" >
      <div class="container text-center d-flex flex-column align-items-center justify-content-center">
         <img src="./img/rfid-logo.png" class="gambar" alt="">
         <!-- <p class="fs-5 text-white bg-danger w-50 text-center py-2">selamat datang john doe</p> -->
         <p id="name" class="text-capitalize fs-2 text-muted"></p>
         <p id="invalid" class="fs-5 text-white bg-danger w-50 text-center"></p>
         <h1 class="text-muted text-capitalize fs-5">silahkan tempelkan kartu identitas anda</h1>
         <p class="text-muted w-50 mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia voluptatum sint ducimus aspernatur eos sit possimus eaque natus quo perferendis?</p>
      </div>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
   <script>
      $(document).ready(function() {
         setInterval(() => {
            $.getJSON("/rfidtest/getUser.php",
               function(data, textStatus, jqXHR) {
                  if (data.user == null) {
                     setTimeout(() => {
                        $("#invalid").html("Kartu anda tidak terdaftar dalam sistem");
                     }, 1000);
                     return;
                  } else {
                     const nama = data.user.name
                     $("#invalid").hide();
                     $("#name").html(`selamat datang <span class="text-success fw-bold" >${nama}</span>`);
                     $.getJSON("/rfidtest/getRfid.php?rfid=null",
                        function(data, textStatus, jqXHR) {}
                     );
                  }
                  setTimeout(() => {
                     location.reload()
                  }, 1500);
               }
            );
         }, 1000);
      });
   </script>
</body>

</html>