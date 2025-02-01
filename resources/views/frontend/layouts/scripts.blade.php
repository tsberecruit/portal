<script>
    /**
     * ----------------------------------
     * START: Third Party Pluggin initialization
     * ----------------------------------
    **/
    // Create an instance of Notyf
    var notyf = new Notyf();
    // Date Picker
     $('.datepicker').datepicker({
        format: 'yyyy-m-d',
     });

     $('.yearpicker').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
     });

     ClassicEditor
     .create( document.querySelector('#editor' ) )
     .catch( error => {
        console.error( error );
     } );

     /**
     * ----------------------------------
     * END: Third Party Pluggin initialization
     * ----------------------------------
    **/

   function showLoader() {
    $('.preloader_demo').removeClass('d-none');
   }

   function hideLoader() {
    $('.preloader_demo').addClass('d-none');
   }
</script>
