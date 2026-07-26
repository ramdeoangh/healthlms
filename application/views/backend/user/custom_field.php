<style>
    .carousel-item img{
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
    }
    .ratio{
        height: 430px;
    }
  .list-group-item {
	border: 1px solid #e1dede !important;
	border-radius: 5px;
}
.card-text {
    display: -webkit-box;        
    -webkit-line-clamp: 3;          
    -webkit-box-orient: vertical;   
    overflow: hidden;               
    text-overflow: ellipsis;   
}
.eCard  .card-body {
	padding: 11px 14px;
}
.eCard  .card-title {
	font-size: 16px !important;
	font-weight: 600 !important;
}
.bg-card{
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    border-color: #e7e7e7;
    background: #fff;
}
.ratio > * {
	border-radius: 10px;
}


.eControll .fa-edit {
	background: #1982FE;
    color: #fff ;
}
.eControll .fa-trash {
	background: #ff4625;
    color: #fff ;
}
.list-group-item p{
    font-size: 14px;
}

 .dragable-item {
	background: #dfedffb5;
    color: #010101;
	padding: 14px 12px;
	border-radius: 5px;
	margin-bottom: 10px;
	cursor: move;
}

.ui-sortable-placeholder {
    background: #e0e0e0;
    border: 2px dashed #ccc;
    height: 40px;
}
.notes {
	font-size: 12px;
	color: #010101;
	background: #797c8b30;
	border-radius: 3px;
	padding: 7px 13px;
}
.singleFaq {
	border-bottom: 1px solid #dbd5d5;
	padding-bottom: 10px;
	margin-bottom: 15px;
    position: relative;
}
.singleFaq:hover .eControll {
    visibility: visible;
    opacity: 1;
    }
.singleFaq h4 {
	font-size: 17px;
	font-weight: 500;
	margin-bottom: 10px;
}
.singleFaq p {
	font-size: 14px;
	line-height: 24px;
}
.accor_wrap ul{
    position: absolute;
    right: 50px;
    visibility: hidden;
    opacity: 0;
    transition: .3s;
    z-index: 999;
    list-style: none;
}

.accor_wrap li a {
	height: 30px;
	width: 30px;
	border-radius: 4px;
	border: 1px solid #e0e5f3;
    background: #fff;
	display: flex;
	align-items: center;
	justify-content: center;
	transition: .3s;
   
}
.accor_wrap li a i{
    font-size: 15px;
}
.accor_wrap li a:hover{
    color: #1982FE;
    border-color: #1982FE;
}
.accor_wrap:hover ul{
    visibility: visible;
    opacity: 1;
}
.accordion-item {
	margin-bottom: 10px;
    border: none;

}
.accor_wrap {
	position: relative;
}
.accor_wrap .accordion-button {
	padding: 14px 17px;
    border: 1px solid #e5e1e1 !important;
    border-radius: 5px;
}
.accordion-button:not(.collapsed) {
	box-shadow: none;
}
.accordion-button{
    font-weight: 500;
  font-size: 14px;
  line-height: 20px;
  color: var(--darkColor);
}

.accordion-button::after {
	background-image: var(--bs-accordion-btn-icon) !important;
	z-index: 999;
}
.accordion-button:not(.collapsed)::after {
	transform: inherit;
}
.accordion-body {
	border: 1px solid #e5e1e1 !important;
	border-top: 0 !important;
	border-radius: 0 0 5px 5px;
}
.accordion-button:not(.collapsed) {
	color: var(--darkColor);
}
.carousel-caption  h5 {
	font-size: 19px;
	margin-bottom: 13px;
}
.accordion-button:focus {
	box-shadow: none;
}
.accordion-button:not(.collapsed) {
	background-color:transparent;
}
.eControll {
	position: absolute;
	top: 8px;
    left: 6px;
    width: 20px;
	z-index: 999;
	color: #ff4625;
	visibility: hidden;
	opacity: 0;
	transition: .5s;
}
.eCard:hover .eControll {
	visibility: visible;
	opacity: 1;
}
.position-inherite{
    position: inherit;
}
.eControll i {
	font-size: 12px;
	border: 1px solid var(--skinColor);
	color: var(--skinColor);
	height: 26px;
	width: 26px;
	line-height: 24px;
	text-align: center;
	border-radius: 50%;
	transition: .5s;
    display: flex;
	justify-content: center;
	align-items: center;
}
 </style>

<div class="d-flex align-items-center justify-content-between mb-3">
    <h5 class="fs-16px title mb-3 capitalize"><?php echo get_phrase('custom_field'); ?></h5>
    <div>
        <a href="javascript:void(0);" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_section_sorting/'.$course_id); ?>', '<?php echo get_phrase('sort_custom_field_section'); ?>')" class="btn btn-outline-primary btn-rounded btn-sm ml-1"><?php echo get_phrase('Sorting'); ?></a>
         <a href="javascript:void(0)" class="btn btn-outline-primary btn-rounded btn-sm ml-1" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_add/'.$course_id); ?>', '<?php echo get_phrase('add_type'); ?>')"><i class="mdi mdi-plus"></i> <?php echo get_phrase('add_type'); ?></a>
    </div>
</div>

<?php 
// Fetch all custom fields for the course
$custom_fields = $this->db->where('course_id', $course_id)->order_by('sorting', 'ASC')->get('custom_fields')->result_array();

?>
<div class="row">
    <div class="col-lg-12">
        <div class="accordion" id="accordionExample">
            <?php foreach($custom_fields as $field): ?>
                <?php 
                    $collapse_id = 'collapse' . $field['id'];
                    $title = htmlspecialchars($field['custom_title']);
                    $items = json_decode($field['custom_field'], true)['data'] ?? [];
                ?>
                
                <?php if($field['custom_type'] == 'image'): ?>
                <!-- Main Image -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <div class="accor_wrap d-flex justify-content-between align-items-center w-100">
                            <button class="accordion-button collapsed flex-grow-1 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="false">
                               <?php echo $title; ?>
                            </button> 
                            <ul class="d-flex gap-2 mb-0">
                                 <li><a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_section_edit/'.$field['id']); ?>', '<?php echo get_phrase('edit_section'); ?>')"><i class="far fa-edit"></i></a></li>
                                <li><a href="javascript:;" onclick="confirm_modal('<?php echo site_url('user/custom_field_section_delete/' . $field['id']); ?>');"><i class="fas fa-trash"></i></a></li>
                            </ul>
                        </div>
                    </h2>
                    <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row">
                                <?php foreach($items as $item): ?>
                                <div class="col-lg-6 mb-3">
                                    <div class="card eCard bg-card position-relative h-100">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>" class="img-fluid rounded-start w-100" style="height: 150px; object-fit: cover;">
                                            </div>
                                            <div class="col-md-8 d-flex position-inherite flex-column">
                                                <div class="card-body flex-grow-1">
                                                    <h5 class="card-title"><?php echo $item['title']; ?></h5>
                                                    <p class="card-text"><?php echo $item['description']; ?></p>
                                                </div>
                                                <div class="eControll d-flex gap-2 mt-auto">
                                                    <a href="javascript:;" 
                                                        onclick="showLargeModal(
                                                            '<?php echo site_url('modal/popup/custom_field_edit/'.$field['id'].'/'.$item['id']); ?>',
                                                            '<?php echo get_phrase('edit_field'); ?>'
                                                        )">
                                                        <i class="far fa-edit"></i>
                                                        </a>

                                                    <a href="javascript:;" onclick="confirm_modal( '<?php echo site_url('user/custom_field_item_delete/'.$field['id'].'/'.$item['id']); ?>');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php elseif($field['custom_type'] == 'text'): ?>
                <!-- Detailed Text -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <div class="accor_wrap d-flex justify-content-between align-items-center w-100">
                            <button class="accordion-button collapsed flex-grow-1 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="false">
                                <?php echo $title; ?>
                            </button>
                            <ul class="d-flex gap-2 mb-0">
                                <li><a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_section_edit/'.$field['id']); ?>', '<?php echo get_phrase('edit_section'); ?>')"><i class="far fa-edit"></i></a></li>
                                <li><a href="javascript:;" onclick="confirm_modal('<?php echo site_url('user/custom_field_section_delete/' . $field['id']); ?>');"><i class="fas fa-trash"></i></a></li>
                            </ul>
                        </div>
                    </h2>
                    <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <ul class="list-group gap-3">
                                <?php foreach($items as $item): ?>
                                <li class="list-group-item eCard">
                                    <p><?php echo $item['description']; ?></p>
                                    
                                    <div class="eControll d-flex gap-2 mt-2">
                                        <a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_edit/'.$field['id'].'/'.$item['id']); ?>','<?php echo get_phrase('edit_field'); ?>')">
                                                <i class="far fa-edit"></i>
                                        </a>
                                        <a href="javascript:;" onclick="confirm_modal(
                                            '<?php echo site_url('user/custom_field_item_delete/'.$field['id'].'/'.$item['id']); ?>'
                                        );"><i class="fas fa-trash"></i></a>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <?php elseif($field['custom_type'] == 'video'): ?>
                <!-- Video Section -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <div class="accor_wrap d-flex justify-content-between align-items-center w-100">
                            <button class="accordion-button collapsed flex-grow-1 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="false">
                                <?php echo $title; ?>
                            </button>
                            <ul class="d-flex gap-2 mb-0">
                                <li><a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_section_edit/'.$field['id']); ?>', '<?php echo get_phrase('edit_section'); ?>')"><i class="far fa-edit"></i></a></li>
                                <li><a href="javascript:;" onclick="confirm_modal('<?php echo site_url('user/custom_field_section_delete/' . $field['id']); ?>');"><i class="fas fa-trash"></i></a></li>
                            </ul>
                        </div>
                    </h2>
                    <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row">
                               <?php foreach($items as $item): ?>
                                    <?php
                                        $video_id = '';

                                        if (!empty($item['file'])) {
                                            $url = $item['file'];

                                            // youtu.be
                                            if (preg_match('~youtu\.be/([^\?&]+)~', $url, $m)) {
                                                $video_id = $m[1];
                                            }
                                            // watch?v=
                                            elseif (preg_match('~v=([^\?&]+)~', $url, $m)) {
                                                $video_id = $m[1];
                                            }
                                            // embed
                                            elseif (preg_match('~/embed/([^\?&]+)~', $url, $m)) {
                                                $video_id = $m[1];
                                            }
                                            // shorts
                                            elseif (preg_match('~/shorts/([^\?&]+)~', $url, $m)) {
                                                $video_id = $m[1];
                                            }
                                        }
                                    ?>
                                    <div class="col-lg-12 mb-3">
                                        <div class="ratio ratio-16x9 eCard position-relative">
                                            <?php if($video_id): ?>
                                                <iframe
                                                    src="https://www.youtube.com/embed/<?php echo $video_id; ?>"
                                                    allowfullscreen
                                                    frameborder="0">
                                                </iframe>
                                            <?php else: ?>
                                                <p class="text-danger"><?php echo get_phrase('invalid_youtube_url'); ?></p>
                                            <?php endif; ?>

                                            <div class="eControll d-flex gap-2 position-absolute top-2 end-2">
                                                <a href="javascript:;" onclick="showLargeModal(
                                                    '<?php echo site_url('modal/popup/custom_field_edit/'.$field['id'].'/'.$item['id']); ?>',
                                                    '<?php echo get_phrase('edit_field'); ?>'
                                                )"><i class="far fa-edit"></i></a>

                                                <a href="javascript:;" onclick="confirm_modal(
                                                    '<?php echo site_url('user/custom_field_item_delete/'.$field['id'].'/'.$item['id']); ?>'
                                                );"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>


                <?php elseif($field['custom_type'] == 'faq'): ?>
                <!-- FAQ Section -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <div class="accor_wrap d-flex justify-content-between align-items-center w-100">
                            <button class="accordion-button collapsed flex-grow-1 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="false">
                                <?php echo $title; ?>
                            </button>
                            <ul class="d-flex gap-2 mb-0">
                                 <li><a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_section_edit/'.$field['id']); ?>', '<?php echo get_phrase('edit_section'); ?>')"><i class="far fa-edit"></i></a></li>
                                <li><a href="javascript:;" onclick="confirm_modal('<?php echo site_url('user/custom_field_section_delete/' . $field['id']); ?>');"><i class="fas fa-trash"></i></a></li>
                            </ul>
                        </div>
                    </h2>
                    <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="faq-figure row">
                                <div class="col-lg-12">
                                    <ul class=" list-unstyled">
                                        <?php foreach($items as $item): ?>
                                        <li class="singleFaq  mb-3">
                                            <h4><?php echo $item['title']; ?></h4>
                                            <p><?php echo $item['description']; ?></p>
                                            <div class="eControll d-flex gap-2 mt-2">
                                                <a href="javascript:;"  onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_edit/'.$field['id'].'/'.$item['id']); ?>', '<?php echo get_phrase('edit_field'); ?>'  )">
                                                        <i class="far fa-edit"></i>
                                                </a>
                                                <a href="javascript:;"   onclick="confirm_modal( '<?php echo site_url( 'user/custom_field_item_delete/'.$field['id'].'/'.$item['id'] ); ?>'   );">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                            
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php elseif($field['custom_type'] == 'gallery'): ?>
                <!-- Gallery Section -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <div class="accor_wrap d-flex justify-content-between align-items-center w-100">
                            <button class="accordion-button collapsed flex-grow-1 text-start" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="false">
                                <?php echo $title; ?>
                            </button>
                            <ul class="d-flex gap-2 mb-0">
                                <li><a href="javascript:;" onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_section_edit/'.$field['id']); ?>', '<?php echo get_phrase('edit_section'); ?>')"><i class="far fa-edit"></i></a></li>
                                <li><a href="javascript:;" onclick="confirm_modal('<?php echo site_url('user/custom_field_section_delete/' . $field['id']); ?>');"><i class="fas fa-trash"></i></a></li>
                            </ul>
                        </div>
                    </h2>
                    <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row">
                                <?php foreach($items as $item): ?>
                                <div class="col-lg-3">
                                    <div class="card eCard mb-3 position-relative">
                                        <img src="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>" class="img-fluid rounded w-100" style="height: 260px; object-fit: cover;">
                                        <div class="eControll d-flex gap-2 position-absolute top-2 end-2">
                                            <a href="javascript:;"  onclick="showLargeModal('<?php echo site_url('modal/popup/custom_field_edit/'.$field['id'].'/'.$item['id']); ?>', '<?php echo get_phrase('edit_field'); ?>'  )">
                                                        <i class="far fa-edit"></i>
                                                </a>
                                                <a href="javascript:;"   onclick="confirm_modal( '<?php echo site_url( 'user/custom_field_item_delete/'.$field['id'].'/'.$item['id'] ); ?>'   );">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
