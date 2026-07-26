<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/swiper-bundle.min.css'); ?>">
<script src="<?php echo base_url('assets/frontend/default-new/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/counterUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/mixitup.min.js'); ?>"></script>

<style>
.software-development-banner {
    max-width: 504px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.software-development-banner::after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: url('<?php echo base_url(); ?>assets/frontend/default-new/image/shape/soft-dev-shadow.webp') no-repeat scroll center center / cover;
    z-index: -1;
}

.software-development-banner img {
    width: 100%;
}

.software-development-details>.title {
    font-family: 'Montserrat';
    font-weight: 700;
    font-size: 32px;
    line-height: 36px;
    color: #201f22;
    margin-bottom: 16px;
}

.software-development-details>.title .highlight {
    color: #f95c16;
}

.software-development-details>.info {
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #78777c;
}

.dashed-list-items li {
    font-family: 'Montserrat';
    font-weight: 600;
    font-size: 16px;
    line-height: 24px;
    color: #201f22;
}

.dashed-list-items li span {
    color: #f95c16;
}

.dashed-list-items li:not(:last-child) {
    margin-bottom: 8px;
}

.btn-black-arrow1 {
    border-radius: 8px;
    padding: 14px 24px 14px 30px;
    background: #201f22;
    font-family: 'Montserrat';
    font-weight: 600;
    font-size: 14px;
    line-height: 20px;
    color: #fff;
    display: flex;
    align-items: center;
    column-gap: 6px;
    max-width: max-content;
    transition: .3s;
}

.btn-black-arrow1:hover {
    background: #424242;
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
.dev-categories-section-title>.title {
    font-family: 'Montserrat';
    font-weight: 700;
    font-size: 32px;
    line-height: 36px;
    color: #201f22;
}

.dev-section-title {
    max-width: 621px;
    width: 100%;
    margin: 0 auto 30px auto;
}

.dev-section-title>.title {
    font-family: 'Montserrat';
    font-weight: 700;
    font-size: 32px;
    line-height: 36px;
    text-align: center;
    color: #201f22;
}

.dev-section-title>.title .highlight {
    color: #f95c16;
}

.dev-section-title-category>.title .highlight {
    color: #f95c16;
}

.dev-section-title>.info {
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    text-align: center;
    color: #78777c;
}


.learning-coding-card {
    border: 1px solid #b5b2ad;
    border-radius: 12px;
    padding: 40px 24px;
    width: 100%;
    height: 100%;
}

.learning-coding-card>.title {
    font-family: 'Montserrat';
    font-weight: 600;
    font-size: 24px;
    line-height: 32px;
    color: #201f22;
    text-align: center;
    margin-bottom: 16px;
}

.learning-coding-card>.info {
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    text-align: center;
    color: #78777c;
}

.learning-coding-card .banner {
    width: 169px;
    height: 169px;
    margin: 40px auto 0px auto;
}

.learning-coding-card .banner img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}


/* QNA Accordion */
.qna-three-accordion .accordion-item {
    border: none;
}

.qna-three-accordion .accordion-item:not(:last-child) {
    border-bottom: 1px solid rgba(133, 140, 138, 0.3);
}

.qna-three-accordion .accordion-item,
.qna-three-accordion .accordion-button {
    border-radius: 0;
}

.qna-three-accordion .accordion-button {
    padding: 0;
    transition: .3s;
    font-family: 'Ubuntu';
    font-weight: 700;
    font-size: 18px;
    line-height: 28px;
    color: #201f22;
}

.qna-three-accordion .accordion-item:not(:last-child) .accordion-button {
    padding-bottom: 28px;
}

.qna-three-accordion .accordion-item:not(:first-child) .accordion-button {
    padding-top: 28px;
}

.qna-three-accordion .accordion-button:focus {
    box-shadow: none;
}

.qna-three-accordion .accordion-button:not(.collapsed) {
    background-color: inherit;
    color: #201f22;
    box-shadow: none;
    padding-bottom: 12px !important;
}

.qna-three-accordion .accordion-body {
    padding: 0;
    padding-bottom: 28px;
    padding-right: 30px;
}

.qna-three-accordion .accordion-body .answer {
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #78777c;
}

.qna-three-accordion .accordion-button::after {
    background-size: 24px;
    background-image: url('<?php echo base_url(); ?>assets/frontend/default-new/image/icons/arrow-circle-black-24.svg') no-repeat scroll center center / cover;

    width: 24px;
    height: 24px;
}

.qna-three-accordion .accordion-button:not(.collapsed)::after {
    transform: rotate(-90deg);
}

.two-accordion-wrap .row {
    --bs-gutter-x: 61px;
    row-gap: 61px;
}

/* Programming E-book */
.programming-ebook-section {
    background: rgba(242, 225, 217, 0.8);
}

.programming-ebook-area {
    padding: 30px 0;
    column-gap: 50px;
    row-gap: 40px;
}

.programming-ebook-banner {
    max-width: 498px;
    width: 100%;
}

.programming-ebook-banner img {
    width: 100%;
}

.programming-ebook-details {
    max-width: 582px;
    width: 100%;
}

.programming-ebook-details .title {
    font-family: 'Montserrat';
    font-weight: 700;
    font-size: 32px;
    line-height: 36px;
    color: #201f22;
    margin-bottom: 16px;
}

.programming-ebook-details .title .highlight {
    color: #f95c16;
}

.programming-ebook-details .info {
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    color: #78777c;
}

</style>
