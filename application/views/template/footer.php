</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url('assets/'); ?>js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?= base_url('assets/') ?>js/dataTables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url('assets/'); ?>js/startmin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables1').DataTable({
            responsive: true
        });
    });
</script>

<!-- Script buatan sendiri -->
<script>
    $(document).ready(function() {
        $("#tambah").click(function() {
            //alert("Tombol tambah diklik");
            //mengambil nilai id_barang dan stok
            var id_barang = $("#id_barang").val();
            var stok = $("#stok").val();
            var markup = "<tr><td><input type='checkbox' name='data' id='data'></td><td><input type='hidden' name='id_barang[]' value='" + id_barang + "'>" + id_barang + "</td><td><input type='hidden' name='stok[]' value='" + stok + "'>" + stok + "</td></tr>";

            $("table tbody").append(markup);
            $("#id_barang").val("");
            $("#stok").val("");
            $("#id_barang").focus();
        });

        $("#id_barang").keyup(function(event) {
            if (event.which == 13) {
                if ($("#id_barang").val().length != 0) {
                    $("#stok").focus();
                }
            }
        });

        $("#stok").keyup(function(event) {
            if (event.which == 13) {
                if ($("#stok").val().length != 0) {
                    $("#tambah").click();
                }
            }
        });

        $("#hapus").click(function() {
            $("table tbody").find('input[name="data"]').each(function() {
                if ($(this).is(":checked")) {
                    $(this).parents("tr").remove();
                }
            });
        });

        $("#input").on('keypress', function(event) {
            return (event.which !== 13);
        });
    });
</script>

</body>

</html>