@if(session('fail'))
    <script>
        Swal.fire({
            title: "Gagal!",
            text: "{{ session('fail') }}!",
            background: '#272829',
            color: '#ffffff',
            confirmButtonColor: '#d33',
            icon: "error"
        });
    </script>
@endif