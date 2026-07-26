<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default-new/css/venobox/venobox.css'; ?>">
<link rel="stylesheet" href="<?php echo base_url() . 'assets/frontend/default-new/css/venobox/venobox.js'; ?>">

<style>
    .hText{
        font-size: 18px !important;
    }
    .cusImage img {
	height: 150px;
	width: 100%;
	object-fit: cover;
}
   .cusImageText h5 {
	font-size: 18px;
	font-weight: 600;
	margin-bottom: 10px;
    color: #000;
}
  .cusImageText p {
	font-size: 14px;
}
.cusVideo iframe{
    border-radius: 12px;
}
.cusFaq .accordion-header {
	margin: 12px 0px 12px;
}
.cusFaq .accordion-body {
	padding: 0 0 0 0;
	font-size: 14px;
	margin-bottom: 10px;
    color: rgb(103, 117, 139);
}
.cusFaq  .accordion-button::after {
	background-size: 12px;
	top: 0;
	right: 0;
}
.cusFaq  .accordion-button {
	padding: 0px 0px 10px 0;
}
.cusFaq .accordion-button {
	font-size: 16px;
	font-weight: 500;
}
</style>
<?php 
$custom_fields = $this->db->where('course_id', $course_id)->order_by('sorting', 'ASC')->get('custom_fields')->result_array();

?>
<div class="course-description">
    <?php foreach($custom_fields as $field): ?>
        <?php 
            $title = htmlspecialchars($field['custom_title']);
            $items = json_decode($field['custom_field'], true)['data'] ?? [];
        ?>
        <?php if($field['custom_type'] == 'text'): ?>
        <!-- Custom Text  -->
        <div class="cTextArea">
            <h3 class="description-head hText"> <?php echo $title; ?></h3>
            <div class="cDescription">
                 <?php foreach($items as $item): ?>
                   <p><?php echo $item['description']; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <?php elseif($field['custom_type'] == 'image'): ?>
        <!-- Custom Image Section  -->
        <div class="cImageArea mt-4">
            <h3 class="description-head  hText"> <?php echo $title; ?></h3>
            <div class="cImage  mt-3">
                <?php foreach($items as $item): ?>
                <div class="row g-3 mb-3">
                    <div class="col-lg-4">
                        <div class="cusImage">
                                <a href="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>" class="venobox w-100 h-100" data-gall="myGallery">
                                    <img src="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>" alt="course image" class="img-fluid rounded">
                                </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="cusImageText">
                            <h5><?php echo $item['title']; ?></h5>
                            <p><?php echo $item['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php elseif($field['custom_type'] == 'video'): ?>
          <!--  Custom  Video -->
          <div class="cusVideo">
                <h3 class="description-head  hText"> <?php echo $title; ?></h3>
                 <div class="row mt-3">
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
                            <div class="ratio ratio-16x9">
                                <?php if($video_id): ?>
                                    <iframe src="https://www.youtube.com/embed/<?php echo $video_id; ?>" allowfullscreen frameborder="0"></iframe>
                                <?php else: ?>
                                    <p class="text-danger"><?php echo get_phrase('invalid_youtube_url'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                     <?php endforeach; ?>
                 </div>
         </div>
         <!-- Custom Gallery -->
           <?php elseif($field['custom_type'] == 'gallery'): ?>
          <div class="cusGallery">
                <h3 class="description-head  hText"> <?php echo $title; ?></h3>
                 <div class="row g-3">
                   <?php foreach($items as $item): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="cusImage">
                                <a href="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>" class="venobox w-100 h-100" data-gall="myGallery">
                                    <img src="<?php echo base_url('uploads/custom_fields/' . $item['file']); ?>" alt="course image" class="img-fluid rounded">
                                </a>
                            </div>
                        </div>
                     <?php endforeach; ?>
                 </div>
          </div>

          <!-- Custom FAQ -->
           <?php elseif($field['custom_type'] == 'faq'): ?>
           <div class="cusFaq">
                <h3 class="description-head  hText"> <?php echo $title; ?></h3>
                 <div class="accordion mt-3" id="customFieldFaqAccordion<?php echo $field['id']; ?>">
                   <?php 
                    $faq_index = 0;
                    foreach($items as $item): 
                    $faq_index++;
                   ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $field['id'].'-'.$faq_index; ?>">
                                <button class="accordion-button <?php if($faq_index != 1) echo 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $field['id'].'-'.$faq_index; ?>" aria-expanded="<?php if($faq_index == 1) echo 'true'; else echo 'false'; ?>" aria-controls="collapse<?php echo $field['id'].'-'.$faq_index; ?>">
                                    <?php echo $item['title']; ?>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $field['id'].'-'.$faq_index; ?>" class="accordion-collapse collapse <?php if($faq_index == 1) echo 'show'; ?>" aria-labelledby="heading<?php echo $field['id'].'-'.$faq_index; ?>" data-bs-parent="#customFieldFaqAccordion<?php echo $field['id']; ?>">
                                <div class="accordion-body">
                                    <?php echo $item['description']; ?>
                                </div>
                            </div>
                        </div>
                     <?php endforeach; ?>
                 </div>
           </div>


        <?php endif; ?>
    
    <?php endforeach; ?>
</div>


<script>
    new VenoBox();
</script>