<form action="<?php echo site_url('admin/frontend_settings/review_store')?>" method="post">
    <div class="form-group">
        <label for="user_id"><?php echo get_phrase('Select User'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="user_id" id="user_id" required>
            <option value=""><?php echo get_phrase('select_an_user'); ?></option>
            <?php 
            $users = $this->db->where('role_id', 2)->where('is_instructor', 0)->get('users')->result(); 
            ?>
          <?php foreach($users as $user): ?>
                <option value="<?php echo $user->id; ?>"><?php echo $user->first_name.' '.$user->last_name; ?></option>
            <?php endforeach; ?>

        </select>
    </div>
    <div class="form-group">
        <label for="rating"><?php echo get_phrase('Rating'); ?></label>
        <select class="form-control select2" data-toggle="select2" name="rating" id="rating" required>
            <option desabled><?php echo get_phrase('select_an_rating'); ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
	<div class="form-group">
		<label for="review"><?php echo get_phrase('Review'); ?> <small class="text-muted"></label>
		<textarea class="form-control" rows="3" name="review" id="review" ></textarea>
	</div>


	<div class="form-group">
		<button type="submit" class="btn btn-primary"><?php echo get_phrase('submit'); ?></button>
	</div>
</form>

<script>
    $(document).ready(function() {
    $('.select2').select2();
});

</script>