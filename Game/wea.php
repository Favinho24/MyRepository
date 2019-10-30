<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script>
          /******************for base 64 *****************************/
      function uploadFile(inputElement) {
      var file = inputElement.files[0];
      var reader = new FileReader();
      reader.onloadend = function() {
        console.log('Encoded Base 64 File String:', reader.result);

        /******************* for Binary ***********************/
        var data=(reader.result).split(',')[1];
         var binaryBlob = atob(data);
         console.log('Encoded Binary File String:', binaryBlob);
      }
      reader.readAsDataURL(file);
      }
    </script>
  </head>
  <body>
    <input type="file" onchange="uploadFile(this)">
  </body>
</html>
<?php
// $data = fopen ($image, 'rb');
// $size=filesize ($image);
// $contents= fread ($data, $size);
// fclose ($data);

 ?>
