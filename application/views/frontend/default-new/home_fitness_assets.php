<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/swiper-bundle.min.css'); ?>">
<script src="<?php echo base_url('assets/frontend/default-new/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/counterUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/mixitup.min.js'); ?>"></script>

<style>
:root {
    --whiteColor: #fff;
}


<?php if ($this->uri->segment(1)=='home'|| $this->uri->segment(2)=='preview_home_page'|| $this->uri->segment(1)==''): ?>body {
    background: #111116 !important;
}

<?php endif;
?>

/*Fitness CSS Start====================================================================*/
.dark-body {
    background: #111116;
}

.fitness-banner-section {
    position: relative;
    overflow-x: clip;
}

.fitness-banner-section:after {
    position: absolute;
    content: "";
    width: 683.62px;
    aspect-ratio: 1 / 1;
    border-radius: 683.62px;
    opacity: 0.87;
    background: linear-gradient(180deg, #1F232A -11.56%, #22262E 111.56%);
    filter: blur(97px);
    left: -125px;
    top: -178px;
    z-index: -1;
}

.fitness-program-section {
    position: relative;
    overflow-x: clip;
}

.fitness-program-section:after {
    position: absolute;
    content: "";
    width: 656.928px;
    aspect-ratio: 1 / 1;
    border-radius: 656.928px;
    opacity: 0.65;
    background: linear-gradient(180deg, #1F232A -11.56%, #22262E 111.56%);
    filter: blur(97px);
    right: -250px;
    top: -233px;
    z-index: -1;
}

.text-yellow-highlight1 {
    color: #F3C54C;
    font-family: 'Outfit';
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 130.5%;
    /* 20.88px */
    letter-spacing: 3.2px;
}

.btn-warning-1 {
    border-radius: 12px;
    background: #FFC832;
    padding: 16px 37px;
    color: #15141B;
    font-family: 'DM Sans';
    font-size: 15px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    border: none;
    transition: .3s;
}

.btn-warning-1:hover {
    background: #ffa400;
    color: #15141B;
}

.btn-warning-1:active {
    background: #ffa400 !important;
    color: #15141B !important;
}

.btn-outline-warning-1 {
    border-radius: 12px;
    border: 1px solid transparent;
    padding: 15px 36px;
    color: var(--whiteColor);
    font-family: 'DM Sans';
    font-size: 15px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    transition: .3s;
    position: relative;
}

.btn-outline-warning-1::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 1px;
    background: linear-gradient(170deg, rgba(243, 197, 76, 1) 0%, rgba(243, 197, 76, 0.2) 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    transition: .3s;
    height: 100%;
    width: 100%;
}

.btn-outline-warning-1 path {
    transition: .3s;
}

.btn-outline-warning-1:hover path {
    fill: #15141B;
}

.btn-outline-warning-1:hover {
    border-color: #FFC832;
    background: #FFC832;
    color: #15141B;
}

.btn-outline-warning-1:hover::before {
    visibility: hidden;
    opacity: 0;
}

.btn-outline-warning-1:active {
    border-color: #FFC832 !important;
    background: #FFC832 !important;
    color: #15141B !important;
}

.btn-outline-warning-1.mixitup-control-active {
    border-color: #FFC832 !important;
    background: #FFC832 !important;
    color: #15141B !important;
}

.outline-warning-rounded {
    border-radius: 12px;
}

.trusted-companies-title2 {
    padding-right: 23px;
    position: relative;
    max-width: 212px;
    width: 100%;
}

.trusted-companies-title2::after {
    position: absolute;
    content: "";
    right: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 1px;
    height: calc(100% - 14px);
    background: var(--whiteColor);
}

.fitness-banner-area {
    padding-top: 60px;
}

.fitness-banner {
    position: relative;
}

.fitness-banner:after {
    position: absolute;
    content: "";
    width: 740.342px;
    aspect-ratio: 740.342 / 762.893;
    left: 0px;
    bottom: 0;
    z-index: -1;
    background: url('<?php echo base_url(); ?>assets/frontend/default-new/image/shape/fitness-banner-shape.svg') no-repeat scroll center center / cover;
}

/* Card */
.lms-2-card {
    border-radius: 12px;
    background: #252930;
    box-shadow: 0px 7px 43px 0px rgba(243, 197, 76, 0.16);
    padding: 14px;
}

.lms-2-card-image {
    border-radius: 6px;
}

.lms-2-card-image>img {
    border-radius: inherit;
    width: 100%;
    height: 225px;
}

.rating-overlay-1 {
    position: absolute;
    left: 15px;
    top: 10px;
}

.lms-link-icontext1 p {
    transition: .3s;
}

.lms-link-icontext1 path {
    transition: .3s;
}

.lms-link-icontext1:hover path {
    fill: var(--skinColor8);
}

.lms-link-icontext1:hover {
    color: var(--skinColor8) !important;
}

.lms-link-icontext1:hover p {
    color: var(--skinColor8) !important;
}

.fit-event-number-date {
    position: relative;
    width: 160px;
    flex: 0 0 160px;
}

.fit-event-number-date::after {
    position: absolute;
    content: "";
    width: 1px;
    height: calc(100% - 88px);
    left: 50%;
    transform: translateX(-50%);
    bottom: 0;
    background: linear-gradient(180deg, rgba(243, 197, 76, 1) 0%, rgba(243, 197, 76, 0.2) 100%);
}

.rounded-img-30px {
    width: 30px;
    flex: 0 0 30px;
    height: 30px;
    border-radius: 50%;
}

.rounded-img-30px>img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}

.lms1-border-bottom {
    border-bottom: 1px solid rgba(143, 145, 155, 0.3);
}

.img-wrap-313px {
    width: 313px;
    flex: 0 0 313px;
}

.img-wrap-313px>img {
    width: 100%;
    border-radius: 20px;
}

.max-w-425px {
    max-width: 425px;
    width: 100%;
}

.yellow-radio-nav-pills {
    justify-content: center;
    border-radius: 72px;
    padding: 6.5px;
    position: relative;
    max-width: max-content;
    margin: 0 auto;
    z-index: 1;
}

.yellow-radio-nav-pills::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 1px;
    background: linear-gradient(170deg, rgba(243, 197, 76, 1) 0%, rgba(243, 197, 76, 0.2) 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    z-index: -1;
}

.yellow-radio-nav-link {
    border-radius: 29px !important;
    background: transparent !important;
    padding: 16px 36px;
    color: var(--whiteColor) !important;
    font-family: 'Outfit';
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
}

.yellow-radio-nav-link.active {
    background: #FFC832 !important;
    color: #15141B !important;
}

.fit-pricing-card {
    padding: 40px 26px 30px 26px;
}

.yellow-check-listitem {
    padding-left: 32px;
    position: relative;
    color: var(--whiteColor);
    font-family: 'Outfit';
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 25.811px;
}

.yellow-check-listitem::after {
    position: absolute;
    content: "";
    left: 0;
    top: 2px;
    width: 24px;
    height: 21px;
    background-image: url('<?php echo base_url() ?>assets/frontend/default-new/image/icons/check-yellow-24.svg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: 24px 17px;
}

.yellow-check-listitem:not(:last-child) {
    margin-bottom: 20px;
}

.lms-2-blog-banner {
    border-radius: 16px;
    position: relative;
}

.lms-2-blog-banner>img {
    width: 100%;
    border-radius: inherit;
    height: 250px;
}

.lms-2-blog-banner::after {
    position: absolute;
    content: "";
    left: 0;
    bottom: 0;
    width: 100%;
    height: calc(100% - 48px);
    border-radius: inherit;
    background: linear-gradient(0deg, rgba(29, 36, 45, 0.73) -39.15%, rgba(29, 36, 45, 0.00) 78.78%);
}

.fit-blog-card {
    margin: -50px auto 0px auto;
    position: relative;
    width: calc(100% - 40px);
}

.fit-blog-title-after {
    position: relative;
    padding-right: 30px;
}

.fit-blog-title-after::after {
    position: absolute;
    content: "";
    right: 0;
    bottom: 7px;
    width: 22.445px;
    height: 1.5px;
    background: #F3C54C;
}

/* Testimonial */
.lms-multi-slider-wrap {
    position: relative;
    width: 100%;
}

.multi-slider-img-wrap {
    position: absolute;
    content: "";
    top: 0;
    right: 0;
    z-index: 1;
    width: 361px;
    aspect-ratio: 361 / 395.08;
}

.multi-slider-img {
    width: 100%;
    height: 100%;
    border-radius: 12px;
}

.multi-slider-img>img {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: inherit;
}

.multi-slider-arrows .swiper-button-next,
.multi-slider-arrows .swiper-button-prev {
    position: inherit;
    margin: 0;
    height: auto;
    width: 50px;
}

.multi-slider-arrows .swiper-button-next:after,
.multi-slider-arrows .swiper-button-prev:after {
    font-size: 20px;
    transition: .3s;
}

.multi-slider-arrows .swiper-button-next:hover:after,
.multi-slider-arrows .swiper-button-prev:hover:after {
    color: var(--skinColor8);
}

.multi-slider-pagination.swiper-pagination {
    position: inherit;
    width: auto;
}

.multi-slider-pagination {
    color: #FFF;
    font-family: 'Outfit';
    font-size: 18px;
    font-style: normal;
    font-weight: 600;
    line-height: 130.5%;
    letter-spacing: 0.9px;
}

.multi-slider-pagination .swiper-pagination-total {
    color: #9B9B9B;
    font-weight: 400;
}

.multi-slider-content {
    --swiper-navigation-color: #fff;
    --swiper-pagination-color: #fff;
}

.multi-slider-content-wrap {
    padding-top: 95px;
    padding-right: 290px;
    padding-bottom: 25px;
    width: 100%;
}

.multi-slider-content-wrap-inner {
    width: 100%;
    position: relative;
    border-radius: 12px;
    padding: 81px 97px 50px 81px;
    border-radius: 12px;
    background: #252930;
    box-shadow: 0px 16px 43px 0px rgba(11, 10, 14, 0.20);
}

.multi-slider-content-wrap-inner::before {
    content: "";
    position: absolute;
    inset: 0;
    border-radius: inherit;
    padding: 1px;
    background: linear-gradient(170deg, rgba(243, 197, 76, 1) 0%, rgba(243, 197, 76, 0.2) 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    height: 100%;
    width: 100%;
    left: 34px;
    top: 25px;
}

.multi-slider-content {
    width: 100%;
}

/* ===================================================================
                        Fitness CSS End
====================================================================*/



/* ===================================================================
                        Fitness CSS Start
====================================================================*/
.lms-logo-2 {
    display: none;
}

.lms-dark-header {
    background: linear-gradient(180deg, #1E3764 0%, #192335 100%);
}

.lms-dark-header .lms-logo-1 {
    display: none;
}

.lms-dark-header .lms-logo-2 {
    display: block;
}

/* ===================================================================
                        Fitness CSS End
====================================================================*/
.text-yellow-2 {
    color: #FFC832 !important;
}

.subtitle-7 {
    color: var(--whiteColor);
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
}

.mb-50px {
    margin-bottom: 50px !important;
}

.title-6 {
    color: var(--whiteColor);
    font-family: 'Outfit';
    font-style: normal;
    font-weight: 600;
    line-height: 130.5%;
}

</style>

<script>
// mixitup plugin
if ($('.mixitup') && $('.mixitup').length > 0) {
    var containerEl = document.querySelector('.mixitup');
    var mixer = mixitup(containerEl, {
        load: {
            filter: 'all'
        },
        animation: {
            effectsIn: 'fade translateY(-100%)',
            effects: 'fade translateZ(-100px)'
        }
    });
}

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Fitness
var swiper8 = new Swiper(".multi-slider-2", {
    cssMode: true,
    spaceBetween: 10,
    slidesPerView: 1,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper9 = new Swiper(".multi-slider-1", {
    cssMode: true,
    spaceBetween: 10,
    slidesPerView: 1,
    pagination: {
        el: ".swiper-pagination",
        type: "fraction",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper8,
    },
});
</script>
