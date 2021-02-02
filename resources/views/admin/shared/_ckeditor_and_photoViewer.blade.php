<script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>
<script>
   ClassicEditor
      .create( document.querySelector( '#extract' ) )
      .catch( error => {
         console.error( error );
      });
   ClassicEditor
      .create( document.querySelector( '#body' ) )
      .catch( error => {
         console.error( error );
      });

   document.getElementById("file").addEventListener('change', changeImage);

   function changeImage(event){
      var file = event.target.files[0];
      var reader = new FileReader();
      reader.onload = (event) => {
         document.getElementById("post-image").setAttribute('src', event.target.result);
      };
      reader.readAsDataURL(file);
   }
</script>
