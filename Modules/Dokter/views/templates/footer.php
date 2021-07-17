  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->
  <footer class="footer">
      <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Healty Pets
              2021</span>

      </div>
  </footer>
  <!-- partial -->
  </div>
  </div>
  <!-- page-body-wrapper ends -->
  </div>

  <script src="<?= base_url('assets/klinik/') ?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url('assets/klinik/') ?>vendors/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/klinik/') ?>vendors/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="https://use.fontawesome.com/d5a1baea42.js"></script>

  <script src="<?= base_url('assets/klinik/') ?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url('assets/klinik/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url('assets/klinik/') ?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('assets/klinik/') ?>js/misc.js"></script>
  <script src="<?= base_url('assets/klinik/') ?>js/dashboard.js"></script>
  <script src="<?= base_url('assets/klinik/') ?>js/todolist.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
      $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
  </script>
  <script>
      $(document).ready(function() {
          if (<?= $this->session->flashdata('message') != "" ?>) {
              Swal.fire(
                  '<?= $this->session->flashdata('message'); ?>',
                  '',
                  '<?= $this->session->flashdata('status'); ?>'
              )
          }
      });
  </script>

  </body>

  </html>