<style>
:root {
    --skinColor1: #7741D9;
}

.menubar {
    background-color: transparent;
}

.search-input {
    background-color: transparent;
}

.search-input:focus,
.search-input.focused {
    background-color: #fff;
}

.elegant-banner-image {
    max-width: 500px;
    width: 85%;
    height: auto;
}

@media (min-width: 992px) {
    .elegant-banner-image {
        margin-top: -38px;
    }
}

/* Section Title */
.home1-section-title {
    max-width: 621px;
    width: 100%;
    margin: 0 auto 30px auto;
}

.home1-section-title .title {
    font-family: 'SF Pro Display';
    font-weight: 700;
    font-size: 32px;
    line-height: 36px;
    color: #0d221d;
    text-align: center;
}

.home1-section-title .info {
    font-family: 'Inter', sans-serif;
    font-weight: 400;
    font-size: 16px;
    line-height: 24px;
    text-align: center;
    color: #858c8a;
    text-align: center;
}

/* Course Card */
.course-card1-link {
    display: block;
    width: 100%;
    height: 100%;
    border-radius: 12px;
    padding: 14px;
    box-shadow: 0 14px 32px 0 rgba(147, 148, 158, 0.2);
    background: var(--whiteColor);
}

.course-card1-link .banner {
    width: 100%;
    aspect-ratio: 242 / 190;
    margin-bottom: 14px;
}

.course-card1-link .banner img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.course-card1-details .rating-reviews {
    gap: 6px;
    margin-bottom: 4px;
}

.course-card1-details .rating-reviews .rating {
    gap: 4px;
}

.course-card1-details .rating-reviews .reviews {
    font-family: 'SF Pro Display';
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    color: #858c8a;
}

.course-card1-details .title-info {
    margin-bottom: 12px;
}

.course-card1-details .title-info .title {
    font-family: 'SF Pro Display';
    font-weight: 700;
    font-size: 20px;
    line-height: 28px;
    color: #0d221d;
    margin-bottom: 2px;
    white-space: nowrap;
    width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
}

.course-card1-details .title-info .info {
    font-family: 'SF Pro Display';
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    color: #858c8a;
    white-space: nowrap;
    width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
}

.course-card1-leasons-students {
    column-gap: 12px;
    row-gap: 8px;
}

.course-card1-leasons-students .leasons-students {
    column-gap: 4px;
    margin-bottom: 8px;
}

.course-card1-leasons-students .leasons-students .total {
    font-family: 'SF Pro Display';
    font-weight: 400;
    font-size: 14px;
    line-height: 20px;
    color: #858c8a;
}

.course-card1-author-price {
    column-gap: 20px;
}

.course-card1-author-price .author {
    column-gap: 8px;
}

.course-card1-author-price .author .profile {
    width: 30px;
    height: 30px;
}

.course-card1-author-price .author .profile img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.course-card1-author-price .author .name {
    font-family: 'SF Pro Display';
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
    color: #0d221d;
}

.course-card1-author-price .prices .new-price {
    font-family: 'Inter';
    font-weight: 700;
    font-size: 20px;
    line-height: 28px;
    color: var(--skinColor1);
    text-align: right;
}

.course-card1-author-price .prices .old-price {
    font-family: 'Inter';
    font-weight: 600;
    font-size: 14px;
    line-height: 20px;
    text-decoration: line-through;
    color: #858c8a;
    text-align: right;
}

.course-card1-inner .leasons-students img {
    filter: hue-rotate(95deg);
}


/* Why choose us start */
.why-choose-section1 {
    background: url(assets/frontend/default-new/image/img/choose1-background.svg) no-repeat scroll center center / cover;
    position: relative;
    z-index: 1;
    overflow: hidden;
    filter: hue-rotate(95deg);
}

.why-choose-section1::after {
    position: absolute;
    content: "";
    right: 0;
    top: 39.09px;
    width: 482px;
    aspect-ratio: 482 / 263;
    background: url(assets/frontend/default-new/image/shape/choose-shape-1.svg) no-repeat scroll center center / cover;
    z-index: -1;
    filter: hue-rotate(95deg);
}

.why-choose-section1::before {
    position: absolute;
    content: "";
    left: 0;
    bottom: 39.09px;
    width: 482px;
    aspect-ratio: 482 / 263;
    background: url(assets/frontend/default-new/image/shape/choose-shape-2.svg) no-repeat scroll center center / cover;
    z-index: -1;
    filter: hue-rotate(95deg);
}

.why-choose-area1 {
    padding: 60px 0px;
}

.why-choose-area1>.title {
    font-family: 'Ubuntu';
    font-weight: 700;
    font-size: 32px;
    line-height: 36px;
    color: #0d221d;
    text-align: center;
}

.why-choose-wrap1 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    row-gap: 30px;
}

.why-choose1-single {
    justify-self: center;
    position: relative;
    width: 100%;
}

.why-choose1-single:not(:last-child):after {
    position: absolute;
    content: "";
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    height: 77px;
    width: 1px;
    background: rgba(133, 140, 138, 0.3);
}

.why-choose1-single .total {
    font-family: 'Ubuntu';
    font-weight: 700;
    font-size: 72px;
    line-height: 76px;
    color: #0d221d;
    margin-bottom: 12px;
    text-align: center;
}

.why-choose1-single .info {
    font-family: 'SF Pro Display';
    font-weight: 500;
    font-size: 18px;
    line-height: 28px;
    color: #0d221d;
    text-align: center;
}

/* Why choose us end */

.custom-accordion-two .accordion-item:has(.show)::before {
    background: #dadcdc;
}

.custom-accordion-two .accordion-item .accordion-header .accordion-button {
    padding: 0px;
}

.custom-accordion-two .accordion-item .accordion-body {
    padding: 0px 30px 18px 0px;
}

.home1-section-title .title {
    font-size: 36px;
    font-weight: 500;
    font-family: 'SF Pro Display';
    line-height: 50px;
    padding-bottom: 15px;
}

.lms-hero-section2 {
    background: url(assets/frontend/default-new/image/img/corpo-hero-bg.webp) no-repeat scroll center center / cover;
}

</style>
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/swiper-bundle.min.css'); ?>">
<script src="<?php echo base_url('assets/frontend/default-new/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/counterUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/jquery.waypoints.min.js'); ?>"></script>
