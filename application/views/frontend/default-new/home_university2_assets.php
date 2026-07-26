<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/swiper-bundle.min.css'); ?>">
<script src="<?php echo base_url('assets/frontend/default-new/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/counterUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/mixitup.min.js'); ?>"></script>

<style>
.lms-hero-area1 {
    background: url('<?php echo base_url(); ?>assets/frontend/default-new/image/img/unv-hero-bg1.webp') no-repeat scroll right top / cover;
}

.uv-hero1-banner-to {
    min-width: 138px;

}

.uv-hero1-banner {
    max-width: 467px;
}

.uv-hero1-banner .banner {
    width: 100%;
}


.btn-danger-1 {
    border: none;
    transition: .3s;
    border-radius: 2px 10px;
    background: #080808;
    padding: 13.5px 26px;
    font-family: 'DM Sans';
    font-weight: 500;
    font-size: 15px;
    line-height: normal;
    color: #fff;
}

.btn-danger-1:active,
.btn-danger-1:hover {
    background: #080808 !important;
    color: #fff !important;
}

@media all and (max-width: 991px) {

    .lms-hero-area1 {
        flex-direction: column;
        background: url('<?php echo base_url(); ?>assets/frontend/default-new/image/img/unv-hero-bg1.webp') no-repeat scroll center center / cover;

    }

}


/* reviews Css Start */
.max-w-692px {
    max-width: 692px;
}

.lms1-review-wrap {
    max-width: 2400px;
    width: 100%;
    margin: 0 auto;
}

.lms1-reviewSlider {
    padding: 32px 0 52px 0;
}

.lms1-reviewSlider .swiper-pagination {
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: 13px;
    padding: 7px 0;
}

.swiper-pagination-bullet {
    outline: 5px solid transparent;
    width: 6px;
    height: 6px;
    flex: 0 0 6px;
    border-radius: 50%;
    background: #B9B5ED;
    transition: .3s;
}

.lms1-reviewSlider .swiper-pagination-bullet-active {
    width: 10px;
    height: 10px;
    flex: 0 0 10px;
    outline-color: #E3E1FE;
    background: #7B60FF;
}

.lms1-review-slide {
    width: 100%;
    background: #FFF;
    padding: 24px;
    transform: scale(.9);
    transition: .3s;
    border-radius: 16.736px;
    opacity: 0.3;
    box-shadow: 0 6.694px 15.062px -5.021px rgba(215, 215, 215, 0.12), 0 10.042px 35.146px -3.347px rgba(202, 202, 202, 0.12);
}

.swiper-slide-active .lms1-review-slide {
    box-shadow: 0 4px 24px 12px rgba(201, 205, 236, 0.13);
    transform: scale(1);
    border-radius: 20px;
    opacity: 1;
}

@media all and (min-width: 1400px) {
    .lms1-reviewSlider .swiper-slide {
        width: auto;
    }

    .lms1-review-slide {
        max-width: 555px;
        width: 100%;
    }
}

.image-circle-52px {
    height: 52px;
    width: 52px;
    flex: 0 0 52px;
    border-radius: 50%;
    overflow: hidden;
}

.image-circle-52px>img {
    height: 100%;
    width: 100%;
    border-radius: 50%;
    object-fit: cover;
}

.lms1-reviewer-name {
    color: #121314;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    margin-bottom: 4px;
}

.lms1-reviewer-rol {
    color: #49494A;
    font-family: 'Inter';
    font-size: 14px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.lms1-review-comment {
    color: #49494A;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 150%;
    /* 24px */
}

/* reviews Css End */

/* Section Title */
.section-title-2 {
    max-width: 580px;
    width: 100%;
    margin: 0 auto;
}

.imagebg-btn-card {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.imagebg-btn-card>img {
    border-radius: 27px;
    width: 100%;
}

.btn-whitelight {
    border-radius: 14px;
    box-shadow: 0 14px 32px 0 rgba(147, 148, 158, 0.2);
    background: rgba(255, 255, 255, 0.9);
    padding: 18.5px 26px;
    font-family: 'DM Sans';
    font-weight: 700;
    font-size: 22px;
    line-height: 31px;
    color: #121421;
    border: none;
    transition: .3s;
}

.btn-whitelight:active,
.btn-whitelight:hover {
    background: rgba(255, 255, 255, 1) !important;
    color: #121421 !important;
}

.card-position-btn1 {
    position: absolute;
    bottom: -70px;
    left: 30px;
    width: calc(100% - 60px);
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
}

.imagebg-btn-card:hover .btn-whitelight {
    visibility: visible;
    opacity: 1;
    pointer-events: auto;
    bottom: 30px;
}

.list-view-banner2 {
    max-width: 233px;
    width: 100%;
    aspect-ratio: 233 / 210;
}

.list-view-banner2>img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 10px;
}

.card-leason-rating2 {
    padding-bottom: 12px;
    margin-bottom: 14px;
    border-bottom: 1px solid rgba(143, 145, 155, 0.3);
}

.card-icon-text4>span::before {
    display: block;
    color: #ff2458;
    margin-top: -1px;
    font-size: 14px;
}

.card-rating3>img {
    margin-top: -2px;
}

</style>
