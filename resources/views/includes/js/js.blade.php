  <!-- Internal Data tables -->
  <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
  <!--Internal  Datatable js -->
  <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

  <!--Internal  Datepicker js -->
  <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
  <!-- Internal Select2 js-->
  <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
  <!-- Internal Modal js-->
  <script src="{{ URL::asset('assets/js/modal.js') }}"></script>


  <!--Internal  Datepicker js -->

  <!-- Internal Select2 js-->

  <!--Internal Fileuploads js-->
  <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
  <!--Internal Fancy uploader js-->
  <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
  <!--Internal  Form-elements js-->
  <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
  <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
  <!--Internal Sumoselect js-->
  <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
  <!-- Internal TelephoneInput js-->
  <script src="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js') }}"></script>


  {{-- ajax script for proudect and sections selector  --}}
  <script>
      // ajax script for proudect and sections selector 
      $(document).ready(function() {
          $('select[name="section_id"]').on('change', function() {
              var sectionId = $(this).val();
              if (sectionId) {
                  $.ajax({
                      url: "{{ URL::to('sections') }}/" + sectionId,
                      type: "GET",
                      dataType: "json",
                      success: function(data) {
                          $('select[name="product_id"]').empty();
                          $.each(data, function(key, value) {
                              $('select[name="product_id"]').append('<option value="' +
                                  key + '">' + value + '</option>');
                          });
                      },
                  });
              } else {
                  console.log('Ajax load did not work');
              }
          })
      });
  </script>

  {{-- script of calculating the total of invoice --}}
  <script>
      function calcTotla() {
          let commissionAmount = parseFloat(document.getElementById('commission_amount').value);
          let Discount = parseFloat(document.getElementById('discount').value);
          let rate_vat = parseFloat(document.getElementById('rate_vat').value);
          let value_vat = parseFloat(document.getElementById('value_vat').value);

          let finalCommission = commissionAmount - Discount;

          if (typeof(commissionAmount) === 'undefinde' || !commissionAmount) {
              alert('يرجى ادخال مبلغ العمولة')
          } else {
              let finalValueVat = finalCommission * rate_vat / 100;
              let totla = finalCommission + finalValueVat;
              document.getElementById('value_vat').value = finalValueVat;
              document.getElementById('total').value = totla;
          }
      }
  </script>
