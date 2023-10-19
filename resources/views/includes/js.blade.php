 <!-- Required vendors -->
 <script src="{{ asset('simas/vendor/global/global.min.js') }}"></script>
 <script src="{{ asset('simas/vendor/chart.js/Chart.bundle.min.js') }}"></script>
 <script src="{{ asset('simas/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

 <!-- Apex Chart -->
 <script src="{{ asset('simas/vendor/apexchart/apexchart.js') }}"></script>
 <script src="{{ asset('simas/vendor/chart.js/Chart.bundle.min.js') }}"></script>

 <!-- Chart piety plugin files -->
 <script src="{{ asset('simas/vendor/peity/jquery.peity.min.js') }}"></script>

 <!-- Dashboard 1 -->
 <script src="{{ asset('/simas/vendor/owl-carousel/owl.carousel.js') }}"></script>

 <!-- Datatable -->
 <script src="{{ asset('simas/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('simas/js/plugins-init/datatables.init.js') }}"></script>

 <!-- Required datatable js -->
 <script src="{{ asset('simas/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('simas/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <!-- Datatable init js -->
 <script src="{{ asset('simas/js/pages/datatables.init.js') }}"></script>

 <!-- momment js is must -->
 <script src="{{ asset('simas/vendor/moment/moment.min.js') }}"></script>
 <script src="{{ asset('simas/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

 <script src="{{ asset('simas/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
 </script>

 <!-- Daterangepicker -->
 <script src="{{ asset('simas/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
 <!-- Clockpicker init -->
 {{-- <script src="{{ asset('simas/js/plugins-init/clock-picker-init.js') }}"></script> --}}
 <!-- asColorPicker init -->
 <script src="{{ asset('simas/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
 <!-- Material color picker init -->
 <script src="{{ asset('simas/js/plugins-init/material-date-picker-init.js') }}"></script>
 <!-- Pickdate -->

 <!-- Sweetalert -->
 <script src="{{ asset('simas/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>


 <script src="{{ asset('simas/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

 <script src="{{ asset('simas/js/custom.min.js') }}"></script>
 <script src="{{ asset('simas/js/dlabnav-init.js') }}"></script>
 <script src="{{ asset('simas/js/demo.js') }}"></script>
 {{-- <script src="{{ asset('simas/js/styleSwitcher.js') }}"></script> --}}

 <script>
    function showTable() {
        var table = document.getElementById("myTable");
        table.classList.remove("hidden");
    }
</script>

 <script>
     function cardsCenter() {
         /*  testimonial one function by = owl.carousel.js */
         jQuery('.card-slider').owlCarousel({
             loop: true,
             margin: 0,
             nav: true,
             //center:true,
             slideSpeed: 3000,
             paginationSpeed: 3000,
             dots: true,
             navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
             responsive: {
                 0: {
                     items: 1
                 },
                 576: {
                     items: 1
                 },
                 800: {
                     items: 1
                 },
                 991: {
                     items: 1
                 },
                 1200: {
                     items: 1
                 },
                 1600: {
                     items: 1
                 }
             }
         })
     }

     jQuery(window).on('load', function() {
         setTimeout(function() {
             cardsCenter();
         }, 1000);
     });

     $(document).ready(function() {
         $('.mdb-select').materialSelect();
     });
 </script>

 <script>
     var serverClock = jQuery("#jamServer");
     if (serverClock.length > 0) {
         showServerTime(serverClock, serverClock.text());
     }

     function showServerTime(obj, time) {
         var parts = time.split(":"),
             newTime = new Date();

         newTime.setHours(parseInt(parts[0], 10));
         newTime.setMinutes(parseInt(parts[1], 10));
         newTime.setSeconds(parseInt(parts[2], 10));

         var timeDifference = new Date().getTime() - newTime.getTime();
         var methods = {
             displayTime: function() {
                 var now = new Date(new Date().getTime() - timeDifference);
                 obj.text([
                     methods.leadZeros(now.getHours(), 2),
                     methods.leadZeros(now.getMinutes(), 2),
                     methods.leadZeros(now.getSeconds(), 2)
                 ].join(":"));
                 setTimeout(methods.displayTime, 500);
             },

             leadZeros: function(time, width) {
                 while (String(time).length < width) {
                     time = "0" + time;
                 }
                 return time;
             }
         }
         methods.displayTime();
     }
 </script>

 <script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
     integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script>
     function confirmation(ev) {
         ev.preventDefault();
         var urlToRedirect = ev.currentTarget.getAttribute('href');
         console.log(urlToRedirect);
         swal({
                 title: "Apakah Kamu Yakin Untuk Menghapus Data Tersebut",
                 //  text: "Kamu tidak bisa mengembalikan data ini!",
                 icon: "warning",
                 confirmButtonText: 'Ya, Hapus itu!',
                 buttons: true,
                 dangerMode: true,
             })
             .then((willCencel) => {
                 if (willCencel) {
                     window.location.href = urlToRedirect;
                     swal("Data Berhasil Dihapus!", {
                         icon: "success",
                     });
                 } else {
                     swal("Data tidak jadi dihapus!");
                 }
             });
     }
 </script>

 <script>
     function confirmation_restore(ev) {
         ev.preventDefault();
         var urlToRedirect = ev.currentTarget.getAttribute('href');
         console.log(urlToRedirect);
         swal({
                 title: "Apakah Kamu Yakin Untuk Memulihkan Data Tersebut",
                 //  text: "Kamu tidak bisa mengembalikan data ini!",
                 icon: "warning",
                 confirmButtonText: 'Ya, Pulihkan itu!',
                 buttons: true,
                 dangerMode: true,
             })
             .then((willCencel) => {
                 if (willCencel) {
                     window.location.href = urlToRedirect;
                     swal("Data Berhasil Dipulihkan!", {
                         icon: "success",
                     });
                 } else {
                     swal("Data tidak jadi dipulihkan!");
                 }
             });
     }
 </script>

 <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
 <script>
     function onScanSuccess(decodedText, decodedResult) {
         // handle the scanned code as you like, for example:
         //console.log(`Code matched = ${decodedText}`, decodedResult);
         $("#result").val(decodedText)
         window.location = '/aset/scan_qrcode?keyword=' + decodedText;
         window.location = '/peminjaman/scan_qrcode?keyword=' + decodedText;
     }

     function onScanFailure(error) {
         // handle scan failure, usually better to ignore and keep scanning.
         // for example:
         //console.warn(`Code scan error = ${error}`);
     }

     let html5QrcodeScanner = new Html5QrcodeScanner(
         "reader", {
             fps: 10,
             qrbox: {
                 width: 250,
                 height: 250
             }
         },
         /* verbose= */
         false);
     html5QrcodeScanner.render(onScanSuccess, onScanFailure);
 </script>

 <!-- Main JS-->
 <script src="{{ asset('simas/js/main.js') }}"></script>

 <script>
     $(document).ready(function() {
         $(".btn-peminjaman").click(function(e) {
             e.preventDefault();
             let aset_id = $(this).attr("data-id");
             let nama_aset = $(this).attr("data-nama");
             $("#form-peminjaman [name=aset_id]").val(aset_id);
             $("#form-peminjaman [name=nama]").val(nama_aset);
             $("#peminjamanModal").modal("show");
         })

         $(".btn-terima, .btn-tolak, .btn-selesai").click(function(e) {
             e.preventDefault();
             let status = $(this).attr('data-status');
             let id = $(this).attr('data-id');
             let conf = confirm("Apakah anda yakin merubah status menjadi " + status
                 .toLocaleUpperCase() + " data ini?");
             if (conf) {
                 let link = $(this).attr("data-href");
                 window.location.href = link;
             }
         })

         $(".btn-mutasi-tambah").click(function(e) {
             e.preventDefault();
             let aset_id = $(this).attr("data-id");
             let nama_aset = $(this).attr("data-nama");
             $("#form-mutasi-tambah [name=aset_id]").val(aset_id);
             $("#form-mutasi-tambah [name=nama]").val(nama_aset);
             $("#mutasiTambahModal").modal("show");
         })

         $(".btn-mutasi-kurang").click(function(e) {
             e.preventDefault();
             let aset_id = $(this).attr("data-id");
             let nama_aset = $(this).attr("data-nama");
             $("#form-mutasi-kurang [name=aset_id]").val(aset_id);
             $("#form-mutasi-kurang [name=nama]").val(nama_aset);
             $("#mutasiKurangModal").modal("show");
         })
     })
 </script>

<script>
    document.getElementById("modalTrigger").addEventListener("click", function() {
        var modal = new bootstrap.Modal(document.getElementById('modalImportExcel'));
        modal.show();
    });
</script>
