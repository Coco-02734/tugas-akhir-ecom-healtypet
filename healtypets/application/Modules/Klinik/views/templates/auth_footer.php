<script src="<?= base_url('assets/auth/') ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets/auth/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assets/auth/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/auth/') ?>js/main.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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