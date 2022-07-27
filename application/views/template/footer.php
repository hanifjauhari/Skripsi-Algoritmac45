<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?php echo base_url('login/processlogout') ?> ">Logout</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("input:checkbox").on('click', function() {
        var $box = $(this);

        const xmlHttp = new XMLHttpRequest();
        xmlHttp.open("PUT", "<?= base_url('C_dashboard/change_status/') ?>" + $box.val(), true);
        xmlHttp.send();

        if ($box.is(":checked")) {
            var group = "input:checkbox[id='" + $box.attr("id") + "']";
            $(group).prop("checked", false);
            $box.prop("checked", true);
        } else {
            $box.prop("checked", false);
        }
    });
</script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets1/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets1/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('assets1/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets1/') ?>js/sb-admin-2.min.js"></script>

</body>

</html>