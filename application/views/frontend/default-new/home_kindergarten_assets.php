<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/swiper-bundle.min.css'); ?>">
<script src="<?php echo base_url('assets/frontend/default-new/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/counterUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/mixitup.min.js'); ?>"></script>


<style>
/* Blog Card 1 */
.lms1-blog-card {
    display: block;
}

.lms1-bCard-banner {
    display: block;
    width: 100%;
    aspect-ratio: 360 / 240;
    margin-bottom: 20px;
    border-radius: 12px;
    overflow: hidden;
}

.lms1-bCard-banner .banner {
    width: 100%;
    height: 100%;
    border-radius: inherit;
    object-fit: cover;
    transition: .3s;
}

.lms1-bCard-banner:hover .banner {
    transform: scale(1.05);
}

.image-circle-32px {
    height: 32px;
    width: 32px;
    flex: 0 0 32px;
    border-radius: 50%;
    overflow: hidden;
}

.image-circle-32px img {
    height: 100%;
    width: 100%;
    border-radius: inherit;
    object-fit: cover;
}

.bCard1-author-name {
    color: #212121;
    font-family: "General Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    line-height: 20px;
    /* 142.857% */
}

.bCard1-post-date {
    color: #6A6A6A;
    font-family: "General Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    line-height: 16px;
    /* 114.286% */
}

.lms1-bCard-title {
    overflow: hidden;
    color: #212121;
    font-family: "General Sans";
    font-size: 19px;
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
    /* 28px */
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    transition: .3s;
}

.lms1-bCard-title:hover {
    color: rgba(33, 33, 33, 0.8);
}

.lms1-bCard-short-des {
    overflow: hidden;
    color: #6A6A6A;
    text-overflow: ellipsis;
    font-family: "General Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    /* 24px */
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
    align-self: stretch;
}

/* Button Css Start */
.lms1-btn-white-rounded {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 12px 24px;
    border-radius: 30px;
    background: #fff;
    color: #121314;
    font-family: "SF Pro Display";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
}

.lms1-btn-white-rounded span::before {
    display: block;
}

.lms1-btn-white-rounded svg {
    display: block;
}

.lms1-btn-white-rounded:active,
.lms1-btn-white-rounded:hover {
    box-shadow: 0 14px 32px 0 rgba(0, 0, 0, 0.4);
    background: #fff !important;
    color: #121314 !important;
}

.lms1-btn-purple {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 12px 24px;
    border-radius: 10px;
    background: #7741D9;
    color: #fff;
    font-family: "SF Pro Display";
    font-size: 20px;
    font-style: normal;
    font-weight: 500;
    line-height: 28px;
    /* 140% */
    letter-spacing: 0;
}

.lms1-btn-purple span::before {
    display: block;
}

.lms1-btn-purple svg {
    display: block;
}

.lms1-btn-purple:active,
.lms1-btn-purple:hover {
    background: #521bb5 !important;
    color: #fff !important;
}

.lms1-btn-blue-rounded {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 12px 32px;
    border-radius: 40px;
    background: linear-gradient(90deg, rgba(186, 213, 255, 1) 0%, rgba(20, 28, 239, 1) 100%);
    box-shadow: 2px 2px 0 0 #192335, 0 2px 0 0 #192335;
    color: #FFF;
    font-family: "SF Pro Display";
    font-size: 18px;
    font-style: normal;
    font-weight: 500;
    line-height: 28px;
    /* 155.556% */
    letter-spacing: 0;
}

.lms1-btn-blue-rounded span::before {
    display: block;
}

.lms1-btn-blue-rounded svg {
    display: block;
}

.lms1-btn-blue-rounded:active,
.lms1-btn-blue-rounded:hover {
    background: linear-gradient(90deg, rgba(186, 213, 255, 1) 0%, rgba(20, 28, 239, 1) 100%) !important;
    color: #fff !important;
    box-shadow: none;
}

.btn-outline-secondary-rounded {
    transition: .3s;
    border: 1px solid #C2C3CD;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 11px 31px;
    border-radius: 40px;
    background: transparent;
    color: #192335;
    font-family: "SF Pro Display";
    font-size: 18px;
    font-style: normal;
    font-weight: 500;
    line-height: 28px;
    /* 155.556% */
    letter-spacing: 0;
}

.btn-outline-secondary-rounded span::before {
    display: block;
    margin-bottom: -1px;
}

.btn-outline-secondary-rounded svg {
    display: block;
}

.btn-outline-secondary-rounded path {
    transition: .3s;
}

.btn-outline-secondary-rounded:active,
.btn-outline-secondary-rounded:hover {
    background: rgba(20, 28, 239, .8) !important;
    color: #fff !important;
    border-color: transparent !important;
}

.btn-outline-secondary-rounded:active path,
.btn-outline-secondary-rounded:hover path {
    fill: #fff;
}


.lms1-btn-blue {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 6px;
    padding: 12px 24px;
    border-radius: 8px;
    background: linear-gradient(90deg, rgba(175, 198, 255, 1) 0%, rgba(56, 114, 255, 1) 100%);
    color: #FFF;
    font-family: "Space Grotesk";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.lms1-btn-blue span::before {
    display: block;
}

.lms1-btn-blue svg {
    display: block;
}

.lms1-btn-blue:active,
.lms1-btn-blue:hover {
    background: linear-gradient(90deg, rgba(175, 198, 255, 1) 0%, rgba(56, 114, 255, 1) 100%) !important;
    color: #fff !important;
}

.lms1-btn-blue::after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    border-radius: inherit;
    background: linear-gradient(90deg, rgba(56, 114, 255, 1) 0%, rgba(175, 198, 255, 1) 100%);
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    transition: .3s;
    z-index: -1;
}

.lms1-btn-blue:active::after,
.lms1-btn-blue:hover::after {
    visibility: visible;
    opacity: 1;
    pointer-events: auto;
}


.lms1-btn-outline-blue {
    transition: .3s;
    border-radius: 8px;
    border: 1px solid #3872FF;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 6px;
    padding: 11px 17px;
    background: transparent;
    color: #3872FF;
    font-family: "Space Grotesk";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
}

.lms1-btn-outline-blue span::before {
    display: block;
}

.lms1-btn-outline-blue svg {
    display: block;
}

.lms1-btn-outline-blue path {
    transition: .3s;
}

.lms1-btn-outline-blue:active,
.lms1-btn-outline-blue:hover {
    background: #3872FF !important;
    color: #fff !important;
    border-color: #3872FF !important;
}

.lms1-btn-outline-blue:active path,
.lms1-btn-outline-blue:hover path {
    fill: #fff;
}


.lms1-btn-orange-rounded {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 6px;
    padding: 13px 34px;
    border-radius: 28px;
    background: #FFCE31;
    color: #192335;
    font-family: 'Raleway';
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: 24px;
    /* 171.429% */
}

.lms1-btn-orange-rounded span::before {
    display: block;
}

.lms1-btn-orange-rounded svg {
    display: block;
}

.lms1-btn-orange-rounded:active,
.lms1-btn-orange-rounded:hover {
    background: #f1b800 !important;
    color: #192335 !important;
}

.lms2-btn-orange-rounded {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 20px 39px;
    border-radius: 100px;
    background: #FF642C;
    color: #FFF;
    text-align: center;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 24px;
    /* 150% */
}

.lms2-btn-orange-rounded span::before {
    display: block;
}

.lms2-btn-orange-rounded svg {
    display: block;
}

.lms2-btn-orange-rounded:active,
.lms2-btn-orange-rounded:hover {
    background: #ff4400 !important;
    color: #FFF !important;
}

.lms1-btn-outline-orange {
    transition: .3s;
    border: 1px solid #FF642C;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 19px 38px;
    border-radius: 100px;
    background: transparent;
    color: #192335;
    text-align: center;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 600;
    line-height: 24px;
    /* 150% */
}

.lms1-btn-outline-orange span::before {
    display: block;
}

.lms1-btn-outline-orange svg {
    display: block;
}

.lms1-btn-outline-orange:active,
.lms1-btn-outline-orange:hover {
    background: #FF642C !important;
    border-color: #FF642C !important;
    color: #FFF !important;
}


.lms2-btn-blue {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 12px 24px;
    border-radius: 10px;
    background: #1668E8;
    color: #FFF;
    font-family: "SF Pro Display";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    letter-spacing: 0;
}

.lms2-btn-blue span::before {
    display: block;
}

.lms2-btn-blue svg {
    display: block;
}

.lms2-btn-blue:active,
.lms2-btn-blue:hover {
    background: #0051cf !important;
    color: #fff !important;
}

.lms1-link-dark {
    display: inline-flex;
    align-items: center;
    column-gap: 8px;
    transition: .3s;
    color: #192335;
    font-family: "SF Pro Display";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    letter-spacing: 0;
}

.lms1-link-dark span::before {
    display: block;
}

.lms1-link-dark svg {
    display: block;
}

.lms1-link-dark path {
    transition: .3s;
}

.lms1-link-dark:hover {
    color: #1668E8;
}

.lms1-link-dark:hover path {
    fill: #1668E8;
}

.lms1-link-secondary {
    display: inline-flex;
    align-items: center;
    column-gap: 5px;
    transition: .3s;
    color: #616161;
    font-family: 'Inter';
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
}

.lms1-link-secondary span::before {
    display: block;
}

.lms1-link-secondary svg {
    display: block;
}

.lms1-link-secondary path {
    transition: .3s;
}

.lms1-link-secondary:hover {
    color: #315EE4;
}

.lms1-link-secondary:hover path {
    stroke: #315EE4;
}

.lms2-link-secondary {
    display: inline-flex;
    align-items: center;
    column-gap: 5px;
    transition: .3s;
    color: #616161;
    font-family: "Plus Jakarta Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
}

.lms2-link-secondary span::before {
    display: block;
}

.lms2-link-secondary svg {
    display: block;
}

.lms2-link-secondary path {
    transition: .3s;
}

.lms2-link-secondary:hover {
    color: #315EE4;
}

.lms2-link-secondary:hover path {
    stroke: #315EE4;
}


.lms1-btn-dark {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 6px;
    padding: 10px 24px;
    border-radius: 10px;
    background: #080808;
    color: #fff;
    font-family: 'Roboto';
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    line-height: 20px;
    /* 142.857% */
    text-transform: capitalize;
}

.lms1-btn-dark span::before {
    display: block;
}

.lms1-btn-dark svg {
    display: block;
}

.lms1-btn-dark:active,
.lms1-btn-dark:hover {
    background: #080808c7 !important;
    color: #fff !important;
}


.lms2-btn-dark {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 6px;
    padding: 10px 24px;
    border-radius: 10px;
    background: #080808;
    color: #fff;
    font-family: "General Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 500;
    line-height: 20px;
    /* 142.857% */
    text-transform: capitalize;
}

.lms2-btn-dark span::before {
    display: block;
}

.lms2-btn-dark svg {
    display: block;
}

.lms2-btn-dark:active,
.lms2-btn-dark:hover {
    background: #080808c7 !important;
    color: #fff !important;
}


.lms1-btn-dark-rounded {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 6px;
    padding: 6px 20px;
    border-radius: 30px;
    background: #080808;
    color: #FFF;
    font-family: "SF Pro Display";
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: 20px;
    /* 142.857% */
    text-transform: capitalize;
}

.lms1-btn-dark-rounded span::before {
    display: block;
}

.lms1-btn-dark-rounded svg {
    display: block;
}

.lms1-btn-dark-rounded:active,
.lms1-btn-dark-rounded:hover {
    background: #080808c7 !important;
    color: #fff !important;
}


.lms1-btn-orange {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 6px;
    padding: 8px 20px;
    border-radius: 6px;
    background: #FF620E;
    color: #fff;
    font-family: "General Sans";
    font-size: 14px;
    font-style: normal;
    font-weight: 600;
    line-height: 20px;
    /* 142.857% */
    text-transform: capitalize;
}

.lms1-btn-orange span::before {
    display: block;
}

.lms1-btn-orange svg {
    display: block;
}

.lms1-btn-orange:active,
.lms1-btn-orange:hover {
    background: #e95100 !important;
    color: #fff !important;
}


.lms2-btn-blue-rounded {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 20px 39px;
    border-radius: 100px;
    background: #4867F1;
    color: #FFF;
    text-align: center;
    font-family: "General Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 150%;
    /* 24px */
}

.lms2-btn-blue-rounded span::before {
    display: block;
}

.lms2-btn-blue-rounded svg {
    display: block;
}

.lms2-btn-blue-rounded:active,
.lms2-btn-blue-rounded:hover {
    background: #1843ff !important;
    color: #fff !important;
}

.lms1-btn-outline-blue {
    transition: .3s;
    border: 1px solid #4867F1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 19px 38px;
    border-radius: 100px;
    background: transparent;
    color: #4867F1;
    text-align: center;
    font-family: "General Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 150%;
    /* 24px */
}

.lms1-btn-outline-blue span::before {
    display: block;
}

.lms1-btn-outline-blue svg {
    display: block;
}

.lms1-btn-outline-blue:active,
.lms1-btn-outline-blue:hover {
    background: #4867F1 !important;
    border-color: #4867F1 !important;
    color: #FFF !important;
}


.lms1-btn-secondary {
    transition: .3s;
    border: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    column-gap: 8px;
    padding: 10px 16px;
    border-radius: 8px;
    background: #F4F4F4;
    color: #212121;
    font-family: "General Sans";
    font-size: 16px;
    font-style: normal;
    font-weight: 500;
    line-height: 24px;
    /* 150% */
    text-transform: uppercase;
}

.lms1-btn-secondary span::before {
    display: block;
}

.lms1-btn-secondary svg {
    display: block;
}

.lms1-btn-secondary path {
    transition: .3s;
}

.lms1-btn-secondary:active,
.lms1-btn-secondary:hover {
    background: #212121 !important;
    color: #fff !important;
}

.lms1-btn-secondary:active path,
.lms1-btn-secondary:hover path {
    stroke: #fff;
}

.link-icon-btn2 {
    display: flex;
    align-items: center;
    font-family: 'Lexend Deca';
    font-weight: 400;
    font-size: 15px;
    line-height: 26px;
    color: #0f101a;
    gap: 4px;
    max-width: max-content;
}

.link-icon-btn2 span::before {
    display: block;
    font-size: 20px;
    transition: .3s;
}

.link-icon-btn2:hover span::before {
    margin-left: 3px;
}


/* Button Css End */

/* Title Css Start */
.title-8 {
    color: #121421;
    font-family: "SF Pro Display";
    font-style: normal;
    font-weight: 600;
    line-height: 106.667%;
    /* 64px */
}

.subtitle-8 {
    color: #93949e;
    font-family: "SF Pro Display";
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    /* 24px */
}

.title-9 {
    color: #2E2E2E;
    font-family: "SF Pro Display";
    font-style: normal;
    font-weight: 500;
    line-height: 130.769%;
    /* 68px */
    letter-spacing: 0;
}

.subtitle-9 {
    color: #2E2E2E;
    font-family: "SF Pro Display";
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    /* 24px */
}

.title-10 {
    color: #192335;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 700;
    line-height: 120%;
    /* 48px */
}

.title-11 {
    color: #192335;
    font-family: "Space Grotesk";
    font-style: normal;
    font-weight: 700;
    line-height: 118.75%;
    /* 76px */
}

.title-12 {
    color: #192335;
    font-family: 'Raleway';
    font-style: normal;
    font-weight: 700;
    line-height: 117.647%;
    /* 80px */
}

.subtitle-10 {
    color: #6B7385;
    font-family: 'Raleway';
    font-style: normal;
    font-weight: 500;
    line-height: 150%;
    /* 24px */
}

.title-13 {
    color: #192335;
    font-family: 'Epilogue';
    font-style: normal;
    font-weight: 600;
    line-height: 125%;
    /* 80px */
    letter-spacing: -2.56px;
}

.title-14 {
    color: #080808;
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 500;
    line-height: 140%;
    /* 28px */
}

.title-typo1 {
    color: #212121;
    font-family: "General Sans";
    font-style: normal;
    font-weight: 500;
    line-height: normal;
}

.title-typo2 {
    color: #0D0D0D;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    line-height: 125%;
    /* 60px */
    letter-spacing: -0.96px;
}

.title-typo3 {
    color: #0D0D0D;
    font-family: "Plus Jakarta Sans";
    font-style: normal;
    font-weight: 500;
    line-height: 125%;
    /* 60px */
    letter-spacing: -0.96px;
}

.subtitle-typo1 {
    color: #2F2F2F;
    font-family: 'Inter';
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    /* 24px */
}

.title-typo4 {
    color: #002660;
    font-family: "General Sans";
    font-style: normal;
    font-weight: 500;
    line-height: 120%;
    /* 86.4px */
}

.subtitle-typo2 {
    color: #414D60;
    font-family: 'Manrope';
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    /* 24px */
}


.text-dark-5 {
    color: #192335 !important;
}

.text-dark-6 {
    color: #393939 !important;
}

.text-secondary-3 {
    color: #6A748B !important;
}

.lms1-text-dark {
    color: #121314;
}

.lms1-text-secondary {
    color: #49494A;
}

.lms1-text-purple-gradient {
    background: linear-gradient(277deg, #a172ff 0%, #6b5bff 79.18%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.lms1-text-blue-gradient {
    background: linear-gradient(277deg, #88a2ff 0%, #2c71f2 79.18%);
    background-clip: text;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.ls-0 {
    letter-spacing: 0 !important;
}

/* Title Css End */


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




/* Individual Instructor/Kindergarten Hero 1 Start */

.lms-hero-section3 {
    background: #0B102B;
}

.lms-hero-main3 {
    background: #fff;
    padding-top: 32px;
    border-radius: 0 0 200px 200px;
}

.lms-hero3-title {
    max-width: 1037px;
    margin: 0 auto;
    text-align: center;
    letter-spacing: 2.64px;
    line-height: 109.091%;
}

.lms-hero-content3 {
    margin-top: -45px;
    display: flex;
    justify-content: space-between;
    column-gap: 16px;
    row-gap: 30px;
}

.hero3-content-banner {
    margin-bottom: -40px;
    position: relative;
    z-index: 1;
}

.hero3-content-banner::after {
    position: absolute;
    content: "";
    width: calc(100% + 250px);
    aspect-ratio: 820 / 370;
    bottom: 40px;
    left: calc(50% + 10px);
    transform: translateX(-50%);
    background: url('<?php echo base_url(); ?>assets/frontend/default-new/image/shape/hero3-shape.webp') no-repeat scroll center center / cover;
    z-index: -1;
}

.hero3-banner-buttons {
    position: absolute;
    bottom: 73px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    padding: 12px;
    background: #fff;
    border-radius: 52px;
    box-shadow: 0 8px 32px 4px rgba(0, 9, 236, 0.43);
    width: max-content;
}

.hero3-banner-button {
    min-width: 192px;
}

.hero3-content-left {
    margin-top: 113px;
    max-width: 263px;
    width: 100%;
}

.hero3-content-right {
    margin-top: 143px;
    max-width: 263px;
    width: 100%;
}

.hero3-quote-wrap {
    margin-bottom: 60px;
}

.hero3-quote-subtitle {
    letter-spacing: 0.54px;
    line-height: 133.333%;
    /* 24px */
}

.hero3-mentor-wrap {
    margin-bottom: 60px;
}

.user-list-item3 {
    height: 36px;
    width: 36px;
    flex: 0 0 36px;
    border-radius: 50%;
    border: 1.125px solid #fff;
}

.user-list-item3 .user {
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: inherit;
}

.user-list-item3:not(:first-child) {
    margin-left: -8px;
}

/* Brand */
.hero3-brand-area {
    padding: 62px 0;
}

.brandSlider2-height .swiper-slide {
    height: 75px;
}

/* Individual Instructor/Kindergarten Hero 1 End */


.counter-area-wrap1 {
    border-radius: 30px;
    background: rgba(83, 99, 210, 0.1);
    padding: 60px 40px;
}

.image-box-md {
    width: 88px;
    height: 88px;
    border-radius: 15px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
}

.image-box-md img {
    max-width: 56px;
    width: 100%;

}

.g-28px {
    row-gap: 28px;
    --bs-gutter-x: 28px;
}

.kg-counter-title {
    font-family: 'Lexend Deca';
    font-weight: 600;
    font-size: 38px;
    line-height: 53px;
    color: #5363D2;
}

.section-title-1 .subtitle-2 {
    max-width: 494px;
    width: 100%;
    margin: 0 auto;
}

.card-icon-text1>.info {
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 13px;
    line-height: 26px;
    color: #8f919b;
}

.card-icon-text1>span::before {
    display: block;
    color: #5363D2;
    margin-top: -1px;
    font-size: 14px;
}

.card-icon-text2>span::before {
    display: block;
    color: #1d242d;
    margin-top: -1px;
    font-size: 14px;
}

.card-rating1>.rating {
    font-family: 'Mulish';
    font-weight: 700;
    font-size: 15px;
    line-height: 26px;
    color: #062320;
}

.card-rating1>img {
    margin-top: -2px;
}

.card-leason-rating1 {
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px solid rgba(143, 145, 155, 0.3);
}

.kg-card-profile-price .title-1 {
    font-family: 'Mulish';
    color: #0f101a;
}

.kg-card-profile-price .price {
    font-family: 'Mulish';
    color: #ff375e;
}

.lms-1-card {
    box-shadow: 0 14px 32px 0 rgba(147, 148, 158, 0.2);
    background: #fff;
    border-radius: 12px;
    height: 100%;
    width: 100%;
    overflow: hidden;
}

.lms-1-card-body {
    padding: 16px;
}

.lms-1-card:hover .link-btn-hover1 {
    color: #5363D2;
}

.lms-1-card:hover .link-btn-hover2 {
    color: #ff2458;
}

.lms-1-card:hover .link-btn-hover3 {
    color: #ff58aa;
}

.lms-1-card-body {
    padding: 16px;
}

.grid-view-banner1>img {
    width: 100%;
    border-radius: 8px;
}

.card-banner-hover1 {
    transition: .3s;
}

.card-banner-hover1:hover {
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.25);
}

.card-leason-rating1 {
    padding-bottom: 12px;
    margin-bottom: 12px;
    border-bottom: 1px solid rgba(143, 145, 155, 0.3);
}


.card-icon-text1>.info {
    font-family: 'Poppins';
    font-weight: 400;
    font-size: 13px;
    line-height: 26px;
    color: #8f919b;
}

.card-icon-text1>span::before {
    display: block;
    color: #5363D2;
    margin-top: -1px;
    font-size: 14px;
}


.card-rating1>.rating {
    font-family: 'Mulish';
    font-weight: 700;
    font-size: 15px;
    line-height: 26px;
    color: #062320;
}

.card-rating1>img {
    margin-top: -2px;
}

.kg-card-profile-price .title-1 {
    font-family: 'Mulish';
    color: #0f101a;
}

.kg-card-profile-price .price {
    font-family: 'Mulish';
    color: #ff375e;
}

.card-author-sm {
    min-width: 30px;
    width: 30px;
    height: 30px;
}

.card-author-sm>img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.lms-card-hover1 {
    transition: .3s;
}

.lms-card-hover1:hover {
    box-shadow: 0 14px 32px 0 rgba(83, 99, 210, 0.26);
}

.bg-icon-card1 {
    min-width: 93px;
    border-radius: 8px;
    width: 93px;
    height: 93px;
    background: #e9f6ff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8px;
}

.title-3 {
    font-family: 'Lexend Deca';
    font-weight: 500;
    line-height: 1.3;
    color: #0f101a;
}

.subtitle-2 {
    font-family: 'Outfit';
    font-weight: 400;
    line-height: 1.5;
    color: #93949e;
}

.gap-20px {
    gap: 20px !important;
}

.lh-23px {
    line-height: 23px !important;
}

.two-accordion-wrap .row {
    --bs-gutter-x: 61px;
    row-gap: 61px;
}


/* Accordion */
.qnaaccordion-three .accordion-button {
    padding: 0;
    transition: .3s;
    font-family: 'Lexend Deca';
    font-weight: 500;
    font-size: 18px;
    line-height: 22px;
    color: #0f101a;
}

.qnaaccordion-three .accordion-item:not(:first-child) .accordion-button {
    padding-top: 30px;
}

.qnaaccordion-three .accordion-item:not(:last-child) .accordion-button {
    padding-bottom: 30px;
}

.qnaaccordion-three .accordion-button:focus {
    box-shadow: none;
}

.qnaaccordion-three .accordion-button:not(.collapsed) {
    box-shadow: none;
    background-color: transparent;
    color: #5363D2;
    padding-bottom: 30px;
}

.qnaaccordion-three .accordion-button::after {
    background-image: url('<?php echo base_url(); ?>assets/frontend/default-new/image/icon/angle-right-black-20.svg');
    background-size: 20px;
    width: 20px;
    height: 20px;
}

.qnaaccordion-three .accordion-button:not(.collapsed)::after {
    background-image: url('<?php echo base_url(); ?>assets/frontend/default-new/image/icon/angle-up-blue-20.svg');

}

.qnaaccordion-three .accordion-item {
    border: none;
}

.qnaaccordion-three .accordion-item:not(:last-child) {
    border-bottom: 1px solid rgba(143, 145, 155, 0.3);
}

.qnaaccordion-three .accordion-body {
    padding: 0;
    padding-bottom: 30px;
}

.qnaaccordion-three .accordion-item:last-child .accordion-body {
    padding-bottom: 0px;
}

.mb-50px {
    margin-bottom: 50px !important;
}

.col-auto {
    flex: 0 0 auto;
    width: auto;
}

.gy-20px {
    row-gap: 20px;
}

/* Testimonial */
.lms-testimonial-1 {
    padding: 0px 0px 50px 28px;
}

.lms-testimonial-1 .swiper-slide {
    height: auto;
}

.lms-testimonial-1 .swiper-button-prev {
    background: rgba(134, 134, 141, 0.15);
    backdrop-filter: blur(8px);
    height: 42px;
    width: 42px;
    border-radius: 50%;
    color: #000;
    transition: .3s;
    left: 3px;
}

.lms-testimonial-1 .swiper-button-prev:hover {
    background: #5363D2;
    color: #fff;
}

.lms-testimonial-1 .swiper-button-prev:after {
    font-size: 14px;
    font-weight: bold;
    margin-left: -2px;
}

.single-testimonial1-inner {
    box-shadow: 0 14px 32px 0 rgba(83, 99, 210, 0.16);
    background: var(--bg-color, #fffccf);
    border-radius: 16px;
    padding: 30px;
    position: relative;
    margin-top: 52px;
}

.testimonial1-user-role {
    font-family: 'Lexend Deca';
    font-weight: 400;
    font-size: 14px;
    color: var(--skinColor2);
}

.testimonial1-profile-img {
    width: 85px;
    height: 85px;
    border-radius: 50%;
    outline: 2px solid #fffbf8;
    position: absolute;
    top: -50px;
    right: 40px;
}

.testimonial1-profile-img img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover;
}

.swiper-slide.swiper-slide-active .testimonial1-profile-img {
    outline-color: #FF375E;
}

.btn-purple-1 {
    background: linear-gradient(158deg, #6f7fed 0%, #5363d2 100%);
    border-radius: 10px;
    padding: 14px 23.5px;
    font-family: 'Lexend Deca';
    font-weight: 500;
    font-size: 15px;
    line-height: normal;
    color: #fff;
    border: none;
    transition: .3s;
    overflow: hidden;
    position: relative;
    z-index: 1;
}

.btn-purple-1::before {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background: linear-gradient(158deg, #2d44dd 0%, #6f7fed 100%);
    visibility: hidden;
    opacity: 0;
    pointer-events: none;
    z-index: -1;
    transition: .3s;
}

.btn-purple-1:active,
.btn-purple-1:hover {
    background: linear-gradient(158deg, #6f7fed 0%, #5363d2 100%) !important;
    color: #fff !important;
}

.btn-purple-1:hover::before {
    visibility: visible;
    opacity: 1;
    pointer-events: auto;
}

.btn-purple-1 span::before {
    display: block;
    margin-bottom: -1px;
}

.btn-purple-sm {
    padding: 11.5px 20px;
    font-family: 'Outfit';
    font-weight: 500;
    font-size: 15px;
    box-shadow: 0 7px 12px 0 rgba(83, 99, 210, 0.26);
}

.community-service-banner {
    height: 36px;
    width: auto;
}

.community-service-banner>img {
    height: 100%;
    width: auto;
    object-fit: contain;
}

.community-service-name {
    font-family: 'Mulish';
    font-weight: 600;
    font-size: 16px;
    line-height: 21px;
    color: #0f101a;
}

.community-banner1>img {
    width: 100%;
}

.community-banner1 {
    position: relative;
    z-index: 1;
}

.community-banner1::after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-image: url('<?php echo base_url(); ?>assets/frontend/default-new/image/community-banner-shadow1.svg');
    background-repeat: no-repeat;
    background-size: 100% 100%;
    z-index: -1;
}

</style>
