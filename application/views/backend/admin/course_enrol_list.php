<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('enrol_student_list'); ?></h4>
                <div class="pb-2">
                    <button type="button" class="btn btn-info float-end" id="export-button" onclick="export_csv();"> <?php echo get_phrase('Export CSV');?></button>
                </div>
                <div class="table-responsive-sm mt-4">
                    <?php if (count($enrol_history->result_array()) > 0): ?>
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th><?php echo get_phrase('photo'); ?></th>
                                    <th><?php echo get_phrase('user_name'); ?></th>
                                    <th><?php echo get_phrase('enrollment_date'); ?></th>
                                    <th><?php echo get_phrase('Expiry date'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($enrol_history->result_array() as $enrol):
                                    $user_data = $this->db->get_where('users', array('id' => $enrol['user_id']))->row_array();?>
                                    <tr class="gradeU" data-enrol-id="<?php echo $enrol['id']; ?>">
                                        <td>
                                            <img src="<?php echo $this->user_model->get_user_image_url($enrol['user_id']); ?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                        </td>
                                        <td>
                                            <b><?php echo $user_data['first_name'].' '.$user_data['last_name']; ?></b><br>
                                            <small><?php echo get_phrase('email').': '.$user_data['email']; ?></small>
                                        </td>
                                        <td><?php echo date('D, d M Y', $enrol['date_added']); ?></td>
                                        <td>
                                        <?php if($enrol['expiry_date']): ?>
                                            <?php echo date('D, d M Y', $enrol['expiry_date']); ?>
                                        <?php else: ?>
                                            <?php echo get_phrase('Lifetime access'); ?>
                                        <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if (count($enrol_history->result_array()) == 0): ?>
                        <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
<script type="text/javascript">

    function export_csv() {
        // Collect all enrol IDs
        let enrolIds = [];
        document.querySelectorAll('tr.gradeU').forEach(row => {
            let enrolId = row.getAttribute('data-enrol-id');
            if (enrolId) {
                enrolIds.push(enrolId);
            }
        });

        // Send the enrol IDs to the server using AJAX
        $.ajax({
            url: "<?php echo site_url('admin/export_enrol_history_csv'); ?>",
            method: "POST",
            data: { enrol_ids: enrolIds },
            success: function(response) {
                // Trigger download
                let blob = new Blob([response], { type: 'text/csv' });
                let link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'enrol_history.csv';
                link.click();
            },
            error: function(xhr, status, error) {
                console.error('Error generating CSV:', error);
            }
        });
    }

</script>
