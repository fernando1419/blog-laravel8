<script src="{{ asset('vendor/jquery-stringToSlug-1.3/jquery.stringToSlug.js') }}"></script>
<script>
   $(document).ready( function() {
      $("#name").stringToSlug({
         setEvents: 'keyup keydown blur',
         getPut: '#slug',
         space: '-'
      });
   });
</script>
