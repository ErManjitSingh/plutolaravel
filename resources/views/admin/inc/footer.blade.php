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
          Designed by <a href="https://plutotours.in/" target="_blank">PTW Holidays Private Limited </a>
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Google Fonts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


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
          var activityprice = @json($events);
          //   console.log(activityprice);
          var calendar = $('#calendar').fullCalendar({
              editable: true,
              header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'agendaDay,agendaWeek,month'
              },
              events: activityprice,
              selectable: true,
              selectHelper: true,
              select: function(start, end, allDay) {
                  $('#price').modal('toggal');
                  // console.log('selecting.......');
                  $('$save'),click (function(){
                    // console.log('saving...');
                      var product = $('#product_id').val();
                      var title = $('#title').val();
                      var start = moment(statr).format('YYYY-MM-DD');
                      var end  = moment(end).format('YYYY-MM-DD');
                      var price = $('#price').val();
                      var description = $('#description').val();
                  })
              }
          })
      });
  </script>
  <script>
      ClassicEditor
          .create(document.querySelector('#text-editor'))
          .catch(error => {
              //   console.error(error);
          });
  </script>