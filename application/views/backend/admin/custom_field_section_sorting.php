<?php 
// Fetch the specific custom fields for editing
$sectionSorting = $this->db
    ->where('course_id', $param2)
    ->order_by('sorting', 'ASC')
    ->get('custom_fields')
    ->result_array();

?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">

                        <div class="bg-dragula p-2 p-lg-4">
                            <div id="section-custom-list" >

                                <?php foreach ($sectionSorting as $sort): ?>
                                    <div class="card mb-1 draggable-item"
                                         id="section-<?php echo $sort['id']; ?>">
                                        <div class="card-body p-2">
                                            <h5 class="mb-0">
                                                <?php echo $sort['custom_title']; ?>
                                            </h5>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>

                            <div class="text-end mt-3">
                                <button type="button"
                                        class="btn btn-primary"
                                        id="save-btns"
                                        disabled>
                                    <?php echo get_phrase('Save Changes'); ?>
                                </button>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
"use strict";

$(document).ready(function () {

    var container = document.getElementById('section-custom-list');

    var drake = dragula([container], {
        revertOnSpill: true
    });

    // Enable save button after drag
    drake.on('drop', function () {
        $('#save-btns').prop('disabled', false);
    });

    // Save sorting
    $('#save-btns').on('click', function () {

        let order = [];

        $('#section-custom-list .draggable-item').each(function () {
            order.push(
                $(this).attr('id').replace('section-', '')
            );
        });

        $.ajax({
            url: '<?php echo site_url("admin/custom_field_section_sort_update"); ?>',
            type: 'POST',
            data: {
                order: order,
                <?php echo $this->security->get_csrf_token_name(); ?>:
                '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function (response) {
                success_notify('<?php echo get_phrase('sections_have_been_sorted'); ?>');
                location.reload();
            },
            error: function () {
                alert('<?php echo get_phrase("Something went wrong!"); ?>');
            }
        });
    });

});
</script>
