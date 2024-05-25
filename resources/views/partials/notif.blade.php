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
@elseif(session('success'))
    <script>
        Swal.fire({
            title: "Tambah data berhasil!",
            text: "{{ session('success') }}!",
            background: '#272829',
            color: '#ffffff',
            confirmButtonColor: '#d33',
            icon: "success"
        });
    </script>
@elseif(session('success-update'))
    <script>
        Swal.fire({
            title: "Update data berhasil!",
            text: "{{ session('success-update') }}!",
            background: '#272829',
            color: '#ffffff',
            confirmButtonColor: '#d33',
            icon: "success"
        });
    </script>
@elseif(session('success-delete'))
    <script>
        Swal.fire({
            title: "Hapus data berhasil!",
            text: "{{ session('success-delete') }}!",
            background: '#272829',
            color: '#ffffff',
            confirmButtonColor: '#d33',
            icon: "successd"
        });
    </script>
@endif