<style>
.buttons-csv {
    margin-bottom: 20px;
}

</style>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> <?php echo $page_title; ?>
                    <a href="<?php echo site_url('admin/announcement_form/add_announcement_form'); ?>" class="btn btn-outline-primary btn-rounded alignToTitle"><i
                            class="mdi mdi-plus"></i><?php echo get_phrase('add_announcement'); ?></a>
                </h4>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title"><?php echo get_phrase('announcements'); ?></h4>

                <div class="table-responsive-sm mt-4">
                    <?php if (count($announcements) > 0): ?>
                    <table id="course-datatable" class="table table-striped dt-responsive nowrap" width="100%" data-page-length='10'>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo get_phrase('course_name'); ?></th>
                                <th><?php echo get_phrase('title'); ?></th>
                                <th><?php echo get_phrase('description'); ?></th>                               
                                <th><?php echo get_phrase('pinned'); ?></th>                               
                                <th><?php echo get_phrase('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($announcements as $key => $announcement): ?>
                            <tr>
                                <td><?php echo ++$key; ?></td>  

                                <td>
                                     <?php echo $announcement['course_names']; ?>                              
                                </td>    

                                <td>
                                    <?php echo $announcement['title']; ?>
                                </td>   

                                <td>
                                    <?php $description = strip_tags($announcement['description']);
                                            echo strlen($description) > 20 ? substr($description, 0, 20) . '...'
                                                : $description;
                                    ?>                                   
                                </td>   
                                
                                <td>
                                    <?php if ($announcement['is_pinned']): ?>
                                        <span class="badge badge-success"><?php echo get_phrase('yes'); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary"><?php echo get_phrase('no'); ?></span>
                                    <?php endif; ?>
                                </td>
                                                              
                                <td>
                                    <div class="dropright dropright">
                                        <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">  
                                            <li>
                                                <a class="dropdown-item" href="<?php echo site_url('admin/announcement_form/edit_announcement_form/'.$announcement['id']); ?>">
                                                        <?php echo get_phrase('edit'); ?>
                                                </a>
                                            </li>                                        
                                            
                                            <li><a class="dropdown-item" href="#" onclick="confirm_modal('<?php echo site_url('admin/announcements/delete/' . $announcement['id']); ?>');"><?php echo get_phrase('delete'); ?></a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php endif; ?>
                    <?php if (count($announcements) == 0): ?>
                    <div class="img-fluid w-100 text-center">
                        <img style="opacity: 1; width: 100px;" src="<?php echo base_url('assets/backend/images/file-search.svg'); ?>"><br>
                        <?php echo get_phrase('no_data_found'); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
