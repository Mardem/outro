@if(Session::has('error'))
        <script>
            iziToast.show({
                title: 'Ops',
                message: "{{ Session::get('error') }}",
                theme: 'dark',
                backgroundColor: '#f72a07',
                icon: 'ti-close',
                position: 'bottomCenter',
            });
        </script>
@endif

@if(Session::has('success'))
        <script>
            iziToast.show({
                title: 'OK',
                message: "{{ Session::get('success') }}",
                theme: 'dark',
                backgroundColor: '#15aa60',
                icon: 'ti-check',
                position: 'topCenter'
            });
        </script>
@endif
