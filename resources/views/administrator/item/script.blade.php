<script>
  $(function () {
    $('#createItemModal').on('shown.bs.modal', () => {
      $('#createItemModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('#editItemModal').on('shown.bs.modal', () => {
      $('#editItemModal').find('input').not('[type=hidden]')[0].focus();
    });

    $('.datatable').on('click', '.editItemButton', function (e) {
      let id = $(this).data('id');
      let showURL = "{{ route('api.v1.items.show', 'param') }}";
      let updateURL = "{{ route('administrators.items.update', 'param') }}";
      showURL = showURL.replace('param', id);
      updateURL = updateURL.replace('param', id);

      let input = $('#editItemModal :input').not('[type=hidden]').not('.btn-close').not('.close-button').not('[type=submit]');
      input.val('Sedang mengambil data..');
      input.attr('disabled', true);

      $.ajax({
        url: showURL,
        method: 'GET',
        success: (res) => {
          input.attr('disabled', false);
          $('#editItemModal #name').val(res.data.name);
          $('#editItemModal form').attr('action', updateURL);
        },
        error: (err) => {
          Swal.fire(
            'Error',
            'Terjadi kesalahan, lapor kepada administrator!',
            'error'
          );

          $('#editItemModal').on('shown.bs.modal', () => {
            $('#editItemModal').modal('hide');
          });
        }
      });
    });
  });
</script>
