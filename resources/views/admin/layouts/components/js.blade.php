<script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
{{-- <script src="{{ asset('admin-assets/plugins/dropzone/min/dropzone.min.js') }}"></script> --}}

<script src="{{ asset('admin-assets/js/demo.js') }}"></script>
{{-- js file and code to dissaper flash message in 3 second --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#flash-message').fadeOut('slow');
        }, 3000); // 3000 milliseconds = 3 seconds

        // Confirmation for delete
        $('.delete-link').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var form = $('#delete-form-' + id);
                if (confirm('Are you sure you want to delete this item?')) {
                    form.submit();
                }
        });
    });
</script>
<script>
    // $(function () {
    //             // Summernote
    //             $('.summernote').summernote({
    //                 height: '300px'
    //             });
    // });

    $(document).ready(function(){
        $(".summernote").summernote();
    });
</script>
