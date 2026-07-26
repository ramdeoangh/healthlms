<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                </h4>
                <!-- Delete Button -->
                <button id="delete_selected" class="alignToTitle btn btn-outline-danger btn-rounded" style="display: none;"><?php echo get_phrase('Delete Selected'); ?></button>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-12">
      <div class="card">
        <div class="card-body" data-collapsed="0">
          <h4 class="mb-3 header-title"><?php echo get_phrase('Contact Users'); ?></h4>
          <table class="table table-striped table-centered w-100" id="server_side_users_data">
            <thead>
              <tr>
                <th>
                  <input type="checkbox" id="select_all">
                </th>
                <th>#</th>
                <th><?php echo get_phrase('Name'); ?></th>
                <th><?php echo get_phrase('Contact'); ?></th>
                <th><?php echo get_phrase('Message'); ?></th>
                <th><?php echo get_phrase('Action'); ?></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
      </div>
    </div>
  </div><!-- end col-->
</div>

<script>
  $(document).ready(function () {
    var selectedRows = []; // Array to store selected row IDs

    var table = $('#server_side_users_data').DataTable({
      responsive: true,
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?php echo base_url('admin/contact/data-table') ?>",
        "dataType": "json",
        "type": "GET",
        "data": { '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
      },
      order: [[0, 'desc']],
      "columns": [
        { "data": "checkbox" },
        { "data": "key" },
        { "data": "name" },
        { "data": "contact" },
        { "data": "message" },
        { "data": "action" }
      ]
    });

    // Function to show or hide delete button based on selected rows
    function toggleDeleteButton() {
      if (selectedRows.length > 0) {
        $('#delete_selected').show();
      } else {
        $('#delete_selected').hide();
      }
    }

    // Header checkbox click event
    $('#select_all').on('click', function () {
      var isChecked = $(this).is(':checked');
      
      $('input[type="checkbox"]', table.rows().nodes()).each(function () {
        var rowId = $(this).data('row-id');
        if (rowId !== undefined) {
          $(this).prop('checked', isChecked);
          
          if (isChecked) {
            if (!selectedRows.includes(rowId)) selectedRows.push(rowId);
          } else {
            selectedRows = [];
          }
        }
      });
      toggleDeleteButton();
    });

    // Checkbox click event for individual rows
    $('#server_side_users_data').on('click', 'input[type="checkbox"]', function () {
      var rowId = $(this).data('row-id');
      if (rowId !== undefined) {
        if ($(this).is(':checked')) {
          if (!selectedRows.includes(rowId)) selectedRows.push(rowId);
        } else {
          selectedRows = selectedRows.filter(id => id !== rowId);
        }
      }
      toggleDeleteButton();
    });

    // Reapply checkbox selection on table reload or sort
    table.on('draw', function () {
      $('input[type="checkbox"]', table.rows().nodes()).each(function () {
        var rowId = $(this).data('row-id');
        if (rowId !== undefined) {
          $(this).prop('checked', selectedRows.includes(rowId));
        }
      });
    });

    // Delete button click event for submission
    $('#delete_selected').on('click', function () {
      if (selectedRows.length > 0) {
          var selected_ids = selectedRows.join(',');
          confirm_modal('<?php echo site_url('admin/contact/delete_selected_contact?selected_ids=') ?>' + selected_ids);
      }
    });
  });
</script>
