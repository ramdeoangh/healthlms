<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/swiper-bundle.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/fontawesome-all.min.css'); ?>">
<script src="<?php echo base_url('assets/frontend/default-new/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/jquery.waypoints.min.js'); ?>"></script>
<link src="<?php echo base_url('assets/frontend/default-new/js/mixitup.min.js'); ?>">

<style>
/* Category Type 3 Card */
.category-type3-card-language {
    display: block;
    height: 100%;
    overflow: hidden;
    transition: all ease 350ms;
    border-radius: 16px;
    border: 1px solid #ffe48d;
    background: #FFF;
    padding: 24px;
}

.category-type3-card-language:hover {
    background: #f1b800;
    border-color: transparent;
}

.category-type3-icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    display: block flex;
    align-items: center;
    justify-content: center;
    border-radius: 118.182px;
    background: rgba(255, 220, 27, 0.12);
    margin-bottom: 12px;
    transition: all ease 350ms;
    color: #000000;
}

.category-type3-icon svg {
    display: block;
}

.category-type3-icon path {
    transition: all ease 350ms;
}

.category-type3-card-language:hover .category-type3-icon {
    background: #fff;
}

.category-type3-card-language:hover .category-type3-icon path {
    fill: #339657;
}

.category-type3-title {
    color: #151515;
    font-family: "Space Grotesk";
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
    /* 28px */
    margin-bottom: 12px;
    transition: all ease 350ms;
}

.category-type3-card-language:hover .category-type3-title {
    color: #fff;
}

.category-type3-subtitle {
    color: #494949;
    font-family: "Space Grotesk";
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    /* 24px */
    transition: all ease 350ms;
}

.category-type3-card-language:hover .category-type3-subtitle {
    color: #fff;
}

</style>
