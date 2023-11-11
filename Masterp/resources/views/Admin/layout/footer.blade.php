{{-- <footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2023 <div class="bullet"></div> Design By <a href="#">Mashtal onlian</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('admin/assets/modules/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('admin/assets/js/page/index.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.delete-item', function(event) {
            event.preventDefault()
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'red',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                        // dataType: JSON,
                        success: function(data) {

                            if (data.status == 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                )
                                window.location.reload()
                            } else if (data.status == 'error') {
                                Swal.fire(
                                    'Cant Delete!',
                                    data.message,
                                    'error'
                                )
                            }

                        },
                        error: function(xhr, status, error) {
                            console.log(xhr.status);
                            console.log(error);

                        }
                    })
                }
            })
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
{{-- @stack('scripts') --}}
            {{-- @stack('scripts') --}}


{{-- </body> --}}

{{-- </html> --}} --}}
