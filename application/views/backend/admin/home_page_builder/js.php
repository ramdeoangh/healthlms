<?php
    include APPPATH . 'views/frontend/default-new/includes_bottom.php';
    include APPPATH . 'views/frontend/default-new/modal.php';
    include APPPATH . 'views/frontend/default-new/common_scripts.php';
    include APPPATH . 'views/frontend/default-new/init.php';
?>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""): ?>

<script type="text/javascript">
toastr.success('<?php echo $this->session->flashdata("flash_message"); ?>');
</script>

<?php endif; ?>

<?php if ($this->session->flashdata('error_message') != ""): ?>

<script type="text/javascript">
toastr.error('<?php echo $this->session->flashdata("error_message"); ?>');
</script>

<?php endif; ?>

<?php if ($this->session->flashdata('info_message') != ""): ?>

<script type="text/javascript">
toastr.info('<?php echo $this->session->flashdata("info_message"); ?>');
</script>

<?php endif; ?>





















<script type="text/javascript">
$(function() {

    if ($('[data-bs-toggle="tooltip"]').length > 0) {
        $('[data-bs-toggle="tooltip"]').tooltip();
    }

    if ($('.tagify').length > 0) {
        $('.tagify:not(.initialized)').tagify();
        $('.tagify:not(.initialized)').addClass('initialized');
    }

    $('a[href="#"]').on('click', function(event) {
        event.preventDefault();
    });

    if ($('.text_editor:not(.initialized)').length) {
        $('.text_editor:not(.initialized)').summernote({
            height: 180, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: true // set focus to editable area after initializing summernote
        });
        $('.text_editor:not(.initialized)').addClass('initialized');
    }


    //When need to add a wishlist button inside a anchor tag
    $('.checkPropagation').on('click', function(event) {
        var action = $(this).attr('action');
        var onclickFunction = $(this).attr('onclick');
        var onChange = $(this).attr('onchange');
        var tag = $(this).prop("tagName").toLowerCase();
        console.log(tag);
        if (tag != 'a' && action) {
            $(location).attr('href', $(this).attr('action'));
            return false;
        } else if (onclickFunction) {
            if (onclickFunction) {
                onclickFunction;
            }
            return false;
        } else if (tag == 'a') {
            return true;
        }
    });

    //Ajax for submission start
    var formElement;
    if ($('.ajaxForm:not(.initialized)').length > 0) {
        $('.ajaxForm:not(.initialized)').ajaxForm({
            beforeSend: function(data, form) {
                var formElement = $(form);
            },
            uploadProgress: function(event, position, total, percentComplete) {},
            complete: function(xhr) {

                setTimeout(function() {
                    distributeServerResponse(xhr.responseText);
                }, 400);

                if ($('.ajaxForm.resetable').length > 0) {
                    $('.ajaxForm.resetable')[0].reset();
                }
            },
            error: function(e) {
                console.log(e);
            }
        });
        $('.ajaxForm:not(.initialized)').addClass('initialized');
    }
});
</script>




























<script type="text/javascript">
$(document).ready(function() {
    <?php if (isset($_GET['tab'])): ?>
    if ($('button[data-bs-target="#<?php echo htmlspecialchars($_GET['tab']); ?>"]').length) {
        const setIntervalCalBack = setInterval(function() {
            $('button[data-bs-target="#<?php echo htmlspecialchars($_GET['tab']); ?>"]').trigger('click');
            $('button[data-bs-target="#<?php echo htmlspecialchars($_GET['tab']); ?>"]').parent().parent().find('.nav-item .nav-link').removeClass('active');
            $('button[data-bs-target="#<?php echo htmlspecialchars($_GET['tab']); ?>"]').parent().parent().find('.nav-item .nav-link').removeClass('show');
            $('button[data-bs-target="#<?php echo htmlspecialchars($_GET['tab']); ?>"]').addClass('active show');

            $('#<?php echo htmlspecialchars($_GET['tab']); ?>').parent().find('.tab-pane').removeClass('show');
            $('#<?php echo htmlspecialchars($_GET['tab']); ?>').parent().find('.tab-pane').removeClass('active');
            $('#<?php echo htmlspecialchars($_GET['tab']); ?>').addClass('active show');

            if ($('#<?php echo htmlspecialchars($_GET['tab']); ?>').hasClass('active')) {
                clearInterval(setIntervalCalBack);
            }
        }, 1000);
    }
    <?php endif; ?>
});
</script>


<!-- Google analytics -->
<?php if (! empty(get_settings('google_analytics_id'))): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_settings('google_analytics_id'); ?>"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', '<?php echo get_settings('google_analytics_id'); ?>');
</script>
<?php endif; ?>
<!-- Ended Google analytics -->

<!-- Meta pixel -->
<?php if (! empty(get_settings('meta_pixel_id'))): ?>
<script>
! function(f, b, e, v, n, t, s) {
    if (f.fbq) return;
    n = f.fbq = function() {
        n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n;
    n.push = n;
    n.loaded = !0;
    n.version = '2.0';
    n.queue = [];
    t = b.createElement(e);
    t.async = !0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
}(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '<?php echo get_settings('meta_pixel_id'); ?>');
fbq('track', 'PageView');
</script>
<noscript>
    <img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo get_settings('meta_pixel_id'); ?>&ev=PageView&noscript=1" />
</noscript>
<?php endif; ?>
<!-- Ended Meta pixel -->


<script type="text/javascript">
function redirectTo(url, event) {
    $(location).attr('href', url);
}

function actionTo(url, type = "get", event) {
    //Start prepare get url to post value
    var jsonFormate = '{}';
    if (type == 'post') {
        let pieces = url.split(/[\s?]+/);
        let lastString = pieces[pieces.length - 1];
        jsonFormate = '{"' + lastString.replace('=', '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","')
            .replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"')
            .replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","').replace("=", '":"').replace("&", '","')
            .replace("=", '":"').replace("&", '","') + '"}';
    }
    jsonFormate = JSON.parse(jsonFormate);
    //End prepare get url to post value
    $.ajax({
        type: type,
        url: url,
        data: jsonFormate,
        success: function(response) {
            distributeServerResponse(response);
        }
    });

}

//Server response distribute
function distributeServerResponse(response) {
    try {
        JSON.parse(response);
        var isValidJson = true;
    } catch (error) {
        var isValidJson = false;
    }
    if (isValidJson) {
        response = JSON.parse(response);
        //For reload after submission
        if (typeof response.reload != "undefined" && response.reload != 0) {
            location.reload();
        }

        //For redirect to another url
        if (typeof response.redirectTo != "undefined" && response.redirectTo != 0) {
            $(location).attr('href', response.redirectTo);
        }

        //for show a element
        if (typeof response.show != "undefined" && response.show != 0 && $(response.show).length) {
            $(response.show).css('display', 'inline-block');
        }
        //for hide a element
        if (typeof response.hide != "undefined" && response.hide != 0 && $(response.hide).length) {
            $(response.hide).hide();
        }
        //for fade in a element
        if (typeof response.fadeIn != "undefined" && response.fadeIn != 0 && $(response.fadeIn).length) {
            $(response.fadeIn).fadeIn();
        }
        //for fade out a element
        if (typeof response.fadeOut != "undefined" && response.fadeOut != 0 && $(response.fadeOut).length) {
            $(response.fadeOut).fadeOut();
        }

        //For adding a class
        if (typeof response.addClass != "undefined" && response.addClass != 0 && $(response.addClass.elem).length) {
            $(response.addClass.elem).addClass(response.addClass.content);
        }
        //For remove a class
        if (typeof response.removeClass != "undefined" && response.removeClass != 0 && $(response.removeClass.elem).length) {
            $(response.removeClass.elem).removeClass(response.removeClass.content);
        }
        //For toggle a class
        if (typeof response.toggleClass != "undefined" && response.toggleClass != 0 && $(response.toggleClass.elem).length) {
            $(response.toggleClass.elem).toggleClass(response.toggleClass.content);
        }

        //For showing error message
        if (typeof response.error != "undefined" && response.error != 0) {
            toastr.error(response.error);
        }
        //For showing success message
        if (typeof response.success != "undefined" && response.success != 0) {
            toastr.success(response.success);
        }

        //For replace texts in a specific element
        if (typeof response.text != "undefined" && response.text != 0 && $(response.text.elem).length) {
            $(response.text.elem).text(response.text.content);
        }
        //For replace elements in a specific element
        if (typeof response.html != "undefined" && response.html != 0 && $(response.html.elem).length) {
            $(response.html.elem).html(response.html.content);
        }
        //For replace elements in a specific element
        if (typeof response.load != "undefined" && response.load != 0 && $(response.load.elem).length) {
            $(response.load.elem).html(response.load.content);
        }
        //For replace tech in a specific element
        if (typeof response.tech != "undefined" && response.tech != 0 && $(response.tech.elem).length) {
            $(response.tech.elem).text(response.tech.content);
        }
        //For appending elements
        if (typeof response.append != "undefined" && response.append != 0 && $(response.append.elem).length) {
            $(response.append.elem).append(response.append.content);
        }
        //Fo prepending elements
        if (typeof response.prepend != "undefined" && response.prepend != 0 && $(response.prepend.elem).length) {
            $(response.prepend.elem).prepend(response.prepend.content);
        }
        //For appending elements after a element
        if (typeof response.after != "undefined" && response.after != 0 && $(response.after.elem).length) {
            $(response.after.elem).after(response.after.content);
        }

        // Update the browser URL and add a new entry to the history
        if (typeof response.pushState != "undefined" && response.pushState != 0) {
            history.pushState({}, response.pushState.title, response.pushState.url);
        }

        if (typeof response.script != "undefined" && response.script != 0) {
            script
        }
    }
}
</script>














<!-- Builder start -->
<script type="text/javascript">
"use strict";
var builderOffcanvas;
$(document).ready(function() {
    builderOffcanvas = new bootstrap.Offcanvas(document.querySelector('.builderOffcanvas'));
    builder_initiated();
});

function show_offcanvas(url, title = "<?php echo get_phrase('Manage content') ?>") {

    // If removed the dropable item then no action exicuted
    if (url) {
        const urlParams = new URLSearchParams(new URL(url).search);
        const element_id = urlParams.get('element_id');
        if (element_id && $('#' + element_id).length == 0) {
            return;
        }
    }
    // If removed the dropable item then no action exicuted ended


    // Load bootstrap spinner until content is loaded
    var offcanvas_content = `<div class="d-flex justify-content-center align-items-center" style="height:30%;">\
            <div class="spinner-border text-primary" role="status">\
                <span class="visually-hidden">Loading...</span>\
            </div>\
        </div>`;
    $('#offcanvas_content').html(offcanvas_content);

    if (!url) {
        url = "<?php echo site_url('view/load/backend.admin.home_page_builder.page_layout_edit_offcanvas_body') ?>";
    }

    $('.offcanvas-title').text(title);

    $.ajax({
        url: url,
        success: function(offcanvas_content) {
            $('#offcanvas_content').html(offcanvas_content);
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.error('Error uploading file:', error);
        }
    });

    builderOffcanvas.show();
}

function add_block_html_content_by_select_from_offcanvas(file_name, folder = "main") {
    var identifier = Math.floor(Math.random() * 100000000);

    $.ajax({
        url: "<?php echo site_url('view/load/components.') ?>" + folder + '.' + file_name,
        success: function(block_html_content) {
            var block_html_content = '<div builder-block-identifier="' + identifier + '" builder-block-file-name="' + file_name + '">' + block_html_content + '</div>';
            if ($('#main *').length == 0 || $('#main').html() == "") {
                $('#placeholder_block').remove();
                $('#main').html(block_html_content);
            } else {
                if ($('#main .selected-block').length > 0) {
                    $('#main .selected-block').after(block_html_content);
                } else {
                    $('#main').append(block_html_content);
                }
            }
            builder_initiated(false);
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.error('Error uploading file:', error);
        }
    });
}

function text_and_image_make_editable() {
    $('#main .builder-editable:not(.initialized)').each(function(index, elem) {
        var identifier = Math.floor(Math.random() * 100000000000) + index;
        $(this).attr('id', identifier);
        let tag_name = $(this).prop('tagName');
        let url = "<?php echo site_url('view/load/backend.admin.home_page_builder.page_layout_edit_image_and_text') ?>?element_id=" + identifier + "&tag_name=" + tag_name;

        //this is only for image to add overlay on image
        if (tag_name == 'img' || tag_name == 'IMG') {
            // Wrap the image in a container so that the button can be positioned relatively
            $(this).wrap(`<div class="builder-editable-wraper" onclick="show_offcanvas('${url}');"></div>`);
        } else {
            $(this).attr('onclick', `show_offcanvas('${url}');`);
        }

        $(this).addClass('initialized');
    });
}

function escapeHtml(html) {
    var text = document.createTextNode(html);
    var div = document.createElement('div');
    div.appendChild(text);
    return div.innerHTML;
}


function add_block_html_content_by_select_from_offcanvas_after_an_identified_element(identifier) {
    $('#main .selected-block').removeClass('selected-block');
    $("[builder-block-identifier='" + identifier + "']").addClass('selected-block');
    show_offcanvas();
}

function remove_block_html_content(identifier) {
    // Remove the block
    $("[builder-block-identifier='" + identifier + "']").remove();
    // If no block found, show a placeholder block to add new block
    if ($.trim($("#main").html()) == '') assign_initial_block();
}

function assign_initial_block() {
    var placeholder_block = `<div class="container placeholder_block_holder" id="placeholder_block">\
            <div class="row">\
                <div class="col-md-6 offset-3">\
                    <div class="placeholder_block">\
                        <i class="fas fa-cubes text-30px"></i>\
                        <div>Get started by adding new blocks</div>\
                        <button class="btn btn-dark" onclick="show_offcanvas();" add-id="main">\
                        <i class="fas fa-plus"></i> Add a new block</button>\
                    </div>\
                </div>\
            </div>\
        </div>`;
    $("#main").after(placeholder_block);
}

function builder_initiated(OffcanvasHide = true) {

    //hide offcanvas
    if (OffcanvasHide === true) {
        builderOffcanvas.hide();
    }

    // Initiate sortable
    $("#main").sortable({
        axis: 'y',
        over: function() {
            var sortableItemWidth = $(this).find('.ui-draggable-dragging, .ui-sortable-helper').outerWidth();
            var sortableItemHeight = $(this).find('.ui-draggable-dragging, .ui-sortable-helper').outerHeight();
            if (sortableItemWidth == undefined || sortableItemWidth < 10) {
                sortableItemWidth = 120;
            }
            if (sortableItemHeight == undefined || sortableItemHeight < 5) {
                sortableItemHeight = 40;
            } else if (sortableItemHeight == undefined || sortableItemHeight > 300) {
                sortableItemHeight = 300;
            }
            $('.ui-sortable-placeholder, .drop-placeholder').width(sortableItemWidth);
            $('.ui-sortable-placeholder, .drop-placeholder').height(sortableItemHeight);
        }
    });

    //Add "selected-block" class if click on any block to select
    $("[builder-block-identifier]").on('click', function() {
        $('#main .selected-block').removeClass('selected-block');
        $(this).addClass('selected-block');
    });

    // If no block found, assign a placeholder block to main section
    if ($.trim($("#main").html()) == '') assign_initial_block();

    $('#main a[href]').on('click', function(event) {
        event.preventDefault(); // Prevent the default action (e.g., navigation)
    });

    //Add Section add and remove buttons
    $('[builder-block-identifier]').each(function() {
        var attributeValue = $(this).attr('builder-block-identifier');
        var content_editor_buttons =
            `<div class="content_editor_buttons"><button class="btn btn-light block_delete" onclick="remove_block_html_content('${attributeValue}', this)"><i class="far fa-times-circle"></i></button><button class="btn btn-primary block_add" onclick="add_block_html_content_by_select_from_offcanvas_after_an_identified_element('${attributeValue}');"><i class="fas fa-plus"></i></button></div>`;
        if ($(this).find('.content_editor_buttons').length == 0) {
            $(this).prepend(content_editor_buttons);
        }
    });

    initialize_draggable();
    enhance_dragable_elements();
    text_and_image_make_editable();
}
</script>

<script>
"use strict";

// Save the edited layout into database
// function save_layout(developer_elements, builder_elements) {
function save_layout() {
    var builder_html = document.querySelector('#main').innerHTML;

    if (!builder_html || builder_html.trim() === "") {
        toastr.warning("Data not found! Please add some content before saving.");
        return;
    }

    var builder_elements = separateElementsByDom(builder_html);



    // Remove builder tool START
    // removes the options elements: buttons & borders
    $(".content_editor_buttons").remove();
    $('.builder-editable.initialized').removeClass('initialized');
    $('#main .builder-editable-wraper > .builder-editable').each(function(index, elem) {
        //To remove parent div (.builder-editable-wraper)
        $(this).unwrap();
    });
    // Remove builder tool END

    // Sending the ajax call
    $.ajax({
        type: "POST",
        data: {
            // developer_elements: developer_elements,
            builder_elements: builder_elements,
            id:                <?php echo $page['id'] ?>
        },
        url: "<?php echo site_url('admin/home_page_layout_update/' . $page['id']); ?>",
        success: function(msg) {
            toastr.success(msg);
            // Re-initiate the builder
            builder_initiated()
        },
        error: function(xhr, status, error) {
            if (xhr.responseText && JSON.parse(xhr.responseText).errors && JSON.parse(xhr.responseText).errors[0] && JSON.parse(xhr.responseText).errors[0].message) {
                error(JSON.parse(xhr.responseText).errors[0].message);
            } else {
                error('An error occurred while updating the layout');
            }
        }
    });


}


function separateElementsByDom(html) {
    // Create a new DOMParser instance
    let parser = new DOMParser();
    let doc = parser.parseFromString(html, 'text/html');
    let builderElements = {};
    // console.log(html)
    // Find all elements with the builder-block-file-name attribute
    let nodes = doc.querySelectorAll('[builder-block-file-name]');
    nodes.forEach(node => {
        // console.log(node.innerHTML);
        // Find elements within each node with builder-identity attribute
        let nodeIdentities = node.querySelectorAll('[builder-identity]');
        let fileName = node.getAttribute('builder-block-file-name');
        console.log(nodeIdentities)

        // Initialize the fileName key in the builderElements object
        if (!builderElements[fileName]) {
            builderElements[fileName] = {};
        }
        // console.log(nodeIdentities.length)
        if (nodeIdentities.length > 0) {
            nodeIdentities.forEach(identityNode => {
                // console.log(getElementPath(identityNode));

                let identity = identityNode.getAttribute('builder-identity');

                // Check for duplicate identity
                if (builderElements[fileName][identity]) {
                    var errorMessage =
                        `Duplicate builder-identity "${identity}" found in "${fileName}". Execution stopped. You can solve this issue by removing the "${fileName}" block and adding it again from the right sidebar.`;
                    error(errorMessage);
                    // Show an error message and stop execution
                    throw new Error(errorMessage);
                }

                builderElements[fileName][identity] = {
                    element: btoa(unescape(encodeURIComponent(identityNode.outerHTML))),
                    tag: btoa(unescape(encodeURIComponent(identityNode.tagName.toLowerCase()))),
                    identity: identity,
                    content: btoa(unescape(encodeURIComponent(identityNode.textContent))),
                    src: btoa(unescape(encodeURIComponent(identityNode.getAttribute('src')))),

                    // Those for drop area
                    dropAreaIndex: getElementPosition(identityNode)[0],
                    droppedIndex: getElementPosition(identityNode)[1],
                };
                // console.log(builderElements[fileName][identity])
            });
        } else {
            builderElements[fileName][1] = {
                element: 'null',
                tag: 'null',
                identity: 'null',
                content: 'null',
                src: 'null',

                // Those for drop area
                dropAreaIndex: 'null',
                droppedIndex: 'null',
            };
        }
        // console.log(builderElements)
    });

    return builderElements;
}


function getElementPosition(el) {
    var dropAreaIndex = null;
    var droppedIndex = null;


    var dropArea = $(el).closest('.drop-area');
    var selectedFileArea = dropArea.closest('[builder-block-file-name]');

    if (dropArea) {
        dropAreaIndex = selectedFileArea.find('.drop-area').index(dropArea);
        droppedIndex = dropArea.find('*').index(el);
    }

    // console.log('Drop Area Index: ' + dropAreaIndex + ', Dropped Index: ' + droppedIndex);

    return [dropAreaIndex, droppedIndex];
}



function initialize_draggable(helper = 'original') {
    // Palette / modal items (source)
    $(".draggable:not(.dragable-initiated)").draggable({
        helper: helper,
        appendTo: "body",
        zIndex: 10000,
        revert: "invalid",
        cancel: false,
        connectToSortable: ".drop-area"
    });
    $(".draggable:not(.dragable-initiated)").addClass('dragable-initiated'); // mark as initiated

    // Drop areas: sortable setup
    $(".drop-area:not(.drop-area-initiated)").sortable({
        connectWith: ".drop-area",
        placeholder: "drop-placeholder",
        tolerance: "pointer",

        start: function(event, ui) {
            // Disable sorting for non-draggable items
            if (!ui.item.hasClass("draggable")) {
                $(this).sortable("cancel"); // stop sorting non-draggable
                return false;
            }
        },
        receive: function(event, ui) {
            // enhance_dragable_elements(ui.item);
        },
        update: function(event, ui) {
            enhance_dragable_elements(ui.item);
        },

        // 💡 Highlight handlers
        activate: function(e) {
            $(this).addClass("ui-droppable-active"); // start highlighting when dragging starts
        },
        deactivate: function() {
            $(this).removeClass("ui-droppable-active"); // remove highlight when drag stops
        },
        over: function() {
            if ($(this).find('.ui-draggable-dragging, .ui-sortable-helper').length == 0) {
                return; // Skip if no draggable item is present
            }

            $(this).addClass("ui-droppable-hover"); // stronger highlight when hovering

            var sortableItemWidth = $(this).find('.ui-draggable-dragging, .ui-sortable-helper').outerWidth();
            var sortableItemHeight = $(this).find('.ui-draggable-dragging, .ui-sortable-helper').outerHeight();
            if (sortableItemWidth == undefined || sortableItemWidth < 10) {
                sortableItemWidth = 120;
            }
            if (sortableItemHeight == undefined || sortableItemHeight < 5) {
                sortableItemHeight = 40;
            }
            $('.ui-sortable-placeholder, .drop-placeholder').width(sortableItemWidth);
            $('.ui-sortable-placeholder, .drop-placeholder').height(sortableItemHeight);
        },
        out: function() {
            $(this).removeClass("ui-droppable-hover"); // remove hover highlight
        }

    }).disableSelection();
    $(".drop-area:not(.drop-area-initiated)").addClass('drop-area-initiated'); // mark as initiated
}

function enhance_dragable_elements(item = null) {
    if (item != null && item.hasClass('draggable')) {
        item.removeClass("cursor-move ui-draggable ui-draggable-handle ui-draggable-dragging")
            .addClass("dropped-item builder-editable")
            .attr("builder-identity", function() {
                return Math.floor(Math.random() * 1000000); // Generate a random unique ID
            })
            .removeAttr("style");

        if (item.find(".remove-dropped-item").length == 0) {
            item.append('<span class="remove-dropped-item"><i class="fas fa-plus"></i></span>');
        }

        item.find(".remove-dropped-item").off('click').on('click', function(e) {
            $(this).closest('.dropped-item').remove();
            e.preventDefault();
        });
    } else {
        $('.dropped-item.draggable').each(function() {
            enhance_dragable_elements($(this));
        });
    }

    setTimeout(() => {
        $('a[href="#"]').on('click', function(event) {
            event.preventDefault();
        });
        text_and_image_make_editable();
    }, 800);
}
</script>
<!-- Builder ended -->
