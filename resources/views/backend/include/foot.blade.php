<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
<script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js')}}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js')}}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{ asset('assets/js/template.js')}}"></script>
<script src="{{ asset('assets/js/settings.js')}}"></script>
<script src="{{ asset('assets/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('assets/js/jquery.cookie.js" type="text/javascript')}}"></script>
{{-- <script src="{{ asset('assets/js/dashboard.js')}}"></script> --}}
{{-- <script src="{{ asset('assets/js/Chart.roundedBarCharts.js')}}"></script> --}}
<script src="{{ asset('assets/js/chart_dashboard.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/html2pdf/dist/html2pdf.bundle.min.js')}}"></script>


        <script>
        $(document).ready(function(){

            $('#search').keyup(function(){

            // Search text
            var text = $(this).val();

            // Hide all content class element
            $('.content').hide();

            // Search and show
            $('.content:contains("'+text+'")').show();
            });

            $("#export").click(function(){
                var element = document.getElementById('body');
                html2pdf().from(element).save('report.pdf');
            });
        });
        </script>
        <script>
            CKEDITOR.replace('editor');

            function previewImage() {
            var input = document.getElementById('gambar');
            var preview = document.getElementById('gambar-preview');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
        <script>
            var elements = CKEDITOR.document.find( '.replies-field' ),
                    i = 0,
                    element;
                    while (( element = elements.getItem( i++ ) )) {
                    CKEDITOR.replace( element);
                }
           </script>
        {{-- <script>
            CKEDITOR.replace('profile');

            const originalContent = CKEDITOR.instances.profile.getData();
            const originalNama = document.getElementById('nama').value;
            const originalFotoSrc = document.getElementById('current-foto').src;

            document.getElementById('editButton').addEventListener('click', function() {
                document.getElementById('profile').disabled = false;
                document.getElementById('nama').disabled = false;
                document.getElementById('foto').disabled = false;
                CKEDITOR.instances.profile.setReadOnly(false);
                document.getElementById('updateButton').classList.remove('hidden');
                document.getElementById('cancelButton').classList.remove('hidden');
                this.classList.add('hidden');
            });

            document.getElementById('cancelButton').addEventListener('click', function() {
                document.getElementById('profile').disabled = true;
                document.getElementById('nama').disabled = true;
                document.getElementById('foto').disabled = true;
                CKEDITOR.instances.profile.setReadOnly(true);
                CKEDITOR.instances.profile.setData(originalContent);
                document.getElementById('nama').value = originalNama;
                document.getElementById('foto').value = '';
                document.getElementById('foto-preview').style.display = 'none';
                document.getElementById('current-foto').src = originalFotoSrc;
                document.getElementById('updateButton').classList.add('hidden');
                document.getElementById('editButton').classList.remove('hidden');
                this.classList.add('hidden');
                Swal.fire({
                    title: 'Operasi dibatalkan',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });

            function previewImage() {
                var input = document.getElementById('foto');
                var preview = document.getElementById('foto-preview');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };

                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.style.display = 'none';
                }
            }
        </script> --}}
