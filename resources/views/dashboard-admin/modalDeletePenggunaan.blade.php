<!-- Logout Modal-->
<div class="modal fade" id="deletePenggunaanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">Apakah anda yakin untuk menghapus data ini
            </div>
            <div class="d-flex justify-content-end my-2 mx-2">
                <button class="btn btn-secondary mr-3" type="button" data-dismiss="modal">Cancel</button>
                <form action="/delete-penggunaan-listrik" method="post">
                    @csrf
                    <input type="hidden" value="" name="id_penggunaan" id="valueIdPenggunaanDelete">
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('click', '#btn-delete-penggunaan', function() {
        const id = $(this).attr('value-penggunaan');
        $('#valueIdPenggunaanDelete').val(id);
    })
</script>
