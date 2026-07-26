<link rel="stylesheet" href="<?php echo base_url('assets/frontend/default-new/css/swiper-bundle.min.css'); ?>">
<script src="<?php echo base_url('assets/frontend/default-new/js/swiper-bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/jquery.waypoints.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/counterUp.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/frontend/default-new/js/mixitup.min.js'); ?>"></script>

<style>
.menubar {
    z-index: 99 !important;
    background-color: revert;
}

.search-input {
    background-color: transparent;
}


/* Counter Start */
.counter-section-2 {
    background: url('<?php echo base_url(); ?>assets/frontend/default-new/image/img/counter-banner-2.webp');
    position: relative;
    z-index: 1;
}

.counter-section-2::after {
    position: absolute;
    content: "";
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    z-index: -1;
    background: #1d242d;
    opacity: 0.9;
}

.counter-area-wrap2 {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    row-gap: 30px;
    padding: 55.75px 0;
}

.counter-single-item2 {
    position: relative;
}

.counter-single-item2:not(:last-child)::after {
    position: absolute;
    content: "";
    right: 0px;
    width: 1px;
    height: 77px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(224, 231, 240, 0.3);
}

/* Counter End */


/* Subscribe Area Start */
.subscribe-area-wrap1 {
    border-radius: 16px;
    background: #1d242d;
}

.subscribe-area-banner1 {
    width: 100%;
    height: 100%;
}

.subscribe-area-banner1>img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 16px 0 0 16px;
}

.subscribe-area-1 {
    padding: 104px 79px;
}

.subscribe-form-inner {
    gap: 10px;
}

.btn-white1-sm {
    padding: 10.25px 15px;
    font-size: 13px;
}

.sub1-form-control {
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 8px;
    background-color: rgba(255, 255, 255, 0.06);
    padding: 9.25px 16px 9.25px 38px;
    font-family: 'Outfit';
    font-weight: 400;
    font-size: 13px;
    color: #838b95;
    transition: .3s;
    background-repeat: no-repeat;
    /* background-size: 12.54px 11.29px; */
    background-size: 14px 13px;
    background-position: 16px center;
    background-image: url('<?php echo base_url(); ?>assets/frontend/default-new/image/icons/message-gray-12.svg');
    max-width: 284px;
    width: 100%;
}

.sub1-form-control::placeholder {
    color: #838b95;
}

.sub1-form-control:focus {
    color: #838b95;
    background-color: rgba(255, 255, 255, 0.06);
}

.sub1-form-control:focus,
.sub1-form-control:hover {
    border-color: #fff;
}

.title-subscription-4 {
    font-family: 'General Sans';
    font-weight: 600 !important;
}

.btn-white1 {
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: 9.24px;
    padding: 8px 20px;
    border-radius: 10px;
    background: #fff;
    max-width: max-content;
    font-family: 'General Sans';
    font-weight: 600;
    font-size: 15px;
    color: #1d242d;
    transition: .3s;
    border: none;
}

.btn-white1 span::before {
    display: block;
    margin-bottom: -1px;
    color: #838b95;
}

.btn-white1:active,
.btn-white1:hover {
    box-shadow: 0 14px 32px 0 rgba(0, 0, 0, 0.4);
    background: #fff !important;
    color: #1d242d !important;
}

.btn-white1:hover span::before {
    color: #838b95;
}

/* Subscribe Area End */

</style>
