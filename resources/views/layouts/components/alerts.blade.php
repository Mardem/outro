@if(Session::has('success'))
    <script>
        swal({
            title: "Okay!",
            text: "{{ Session::get('success') }}",
            icon: "success"
        });
    </script>
@endif

@if(Session::has('error'))
    <script>
        swal({
            title: "Opss...",
            text: "{{ Session::get('error') }}",
            icon: "error"
        });
    </script>
@endif