
<?php
    $qr_code = 'uploads/certificates/qrcodes/'. $certificate_identifier.'.jpg';
    if(!file_exists($qr_code)){
        include APPPATH.'libraries/phpqrcode/qrlib.php';
        QRcode::png(site_url('certificate/'.$certificate_identifier), $qr_code, QR_ECLEVEL_L, 3, 4);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo get_phrase('certificate'); ?> | <?php echo get_settings('system_title'); ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('uploads/system/').get_frontend_settings('favicon');?>">
    <link href="<?php echo base_url('assets/backend/css/fontawesome-all.min.css') ?>" rel="stylesheet" type="text/css" />
    <script src="<?php echo base_url('assets/global/html2canvas/'); ?>html2canvas.min.js"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery-3.3.1.min.js'); ?>" charset="utf-8"></script>

   <!--  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js" integrity="sha256-eTyxS0rkjpLEo16uXTS0uVCS4815lc40K2iVpWDvdSY=" crossorigin="anonymous"></script> -->
   <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Italianno&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Pinyon+Script&display=swap%27');
        @import url('https://fonts.googleapis.com/css2?family=Miss+Fajardose&display=swap%27');
        .download{
            padding: 12px 15px;
            background-color: #2d32d5;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            margin-top: 100px;
        }
   </style>
</head>

<body >
    <div id="capture" style="position: relative; width: 750px; margin-left: auto; margin-right: auto;">
        <?php

            $certificate = $this->db->get_where('certificates', array('shareable_url' => $certificate_identifier))->row_array();



            $course = $this->crud_model->get_course_by_id($certificate['course_id'])->row_array();

            $student_row = $this->user_model->get_all_user($certificate['student_id'])->row_array();

            $instructor_row = $this->user_model->get_all_user($course['creator'])->row_array();

            $lessons = $this->crud_model->get_lessons('course', $certificate['course_id']);
            $lesson_count=$lessons->num_rows();
            $course_duration = $this->crud_model->get_total_duration_of_lesson_by_course_id($certificate['course_id']);

            $language = $course['language'];
            $level =$course['level'];

           
           //kowser
           // print_r($course_duration);
           




            $instructor = $instructor_row['first_name'].' '.$instructor_row['last_name'];
            $student = $student_row['first_name'].' '.$student_row['last_name'];

            $certificate_template= str_replace("..\..\uploads/certificates/template.jpg","..\uploads/certificates/template.jpg",remove_js(htmlspecialchars_decode(get_settings('certificate-text-positons'))));

            $certificate_template =  str_replace("{date}", date('d/m/Y'), $certificate_template);
            $certificate_template =  str_replace("{student}", $student, $certificate_template);
            $certificate_template =  str_replace("{instructor}", $instructor, $certificate_template);
            $certificate_template =  str_replace("{course}", $course['title'], $certificate_template);
            $certificate_template =  str_replace("{course_language}", '<i class="fas fa-language"></i> '.ucfirst($language), $certificate_template);
            $certificate_template =  str_replace("{course_level}", '<i class="far fa-chart-bar"></i> '.ucfirst($level), $certificate_template);
            $certificate_template =  str_replace("{total_duration}",site_phrase('total_duration').' '. $course_duration, $certificate_template);
             $certificate_template =  str_replace("{total_lesson}", site_phrase('total_lesson').' '.$lesson_count, $certificate_template);
            


            
            echo $certificate_template;

        ?>
    </div>
    <div class="" style="width: 100%; margin-top: 20px; text-align: center;">
        <a class="download" download><?php echo site_phrase('download'); ?></a>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.qrCode').html('<img src="<?php echo base_url($qr_code); ?>" width="100%">');
        
            html2canvas(document.querySelector("#capture"),
                {
                    allowTaint: true,
                    width: '750',
                },
                ).then(canvas => {
                    document.querySelector("#capture").appendChild(canvas);
                    $("canvas").hide();

                    setTimeout(function(){
                        var canvas = document.querySelector("canvas");

                        var dataUrl    = canvas.toDataURL("png");

                        $('.download').attr('href', dataUrl);
                    }, 1000);
                }
            );
        });
    </script>
</body>
</html>
