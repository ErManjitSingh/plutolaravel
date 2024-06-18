  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
      <div class="copyright">
          &copy; Copyright <strong><span>@2024</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
          Designed by <a href="https://plutotours.in/">PTW Holidays Private Limited </a>
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- batch -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
  <!-- end batch -->
  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
  <script>
      $(document).ready(function() {
          var activityprice = <?php echo json_encode($events); ?>;
          //   console.log(activityprice);
          $('#calendar').fullCalendar({
              editable: true,
              header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'agendaDay,agendaWeek,month',
              },
              events: activityprice,
              selectable: true,
              selectHelper: true,
          })
      });
      ClassicEditor
        .create( document.querySelector( '#editor' ) )
        // .create( document.getElementById( '#editor1' ) )
        // .catch( error => {
        //     console.error( error );
        // } );
    //   CKEDITOR.replace('body');
  </script>