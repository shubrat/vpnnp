const datatableInit = () => {
    $('#datatable').DataTable()
        .buttons()
        .container()
        .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
}

const choicesInit = () => {
    let e = document.querySelectorAll(".js-choice");
    for (i = 0; i < e.length; ++i) {
        let a = e[i];
        new Choices(a, {
            silent: false, // Remove console warning
            searchPlaceholderValue: 'search',
            removeItemButton: true,
            shouldSort: false,
        })
    }
}

const choicesAltInit = () => {
    let e = document.querySelectorAll(".js-choice-alt");
    for (i = 0; i < e.length; ++i) {
        let a = e[i];
        new Choices(a, {
            silent: false, // Remove console warning
            searchPlaceholderValue: 'search',
            removeItemButton: false
        })
    }
}

const dropifyInit = () => {
    let dropifyEl = $('.dropify');
    if (dropifyEl.length) {
        dropifyEl.dropify();
    }
}


const summernoteInit = () => {

    // Define function to open file-manager window
    let lfm = function (options, cb) {
        let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    let LFMButton = function (context) {
        let ui = $.summernote.ui;
        let button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with File Manager',
            click: function () {

                lfm({type: 'image', prefix: '/laravel-filemanager'}, function (lfmItems, path) {
                    lfmItems.forEach(function (lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });

            }
        });
        return button.render();
    };


    $('.summernote').summernote({
        placeholder: 'Please enter your content here.',
        height: 200,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'fontname', 'clear', 'color']],
            ['font', ['superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['para', ['style', 'ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['lfm', 'link', 'table']],
            ['misc', ['fullscreen', 'codeview', 'help']]
        ],
        fontNames: ['Mukta', 'Roboto Light', 'Roboto Regular', 'Roboto Bold', 'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
        fontNamesIgnoreCheck: ['Mukta'],
        fontName: 'Mukta',
        fontSize: '18',
        fontSizeUnits: ['px', 'pt'],
        buttons: {
            lfm: LFMButton
        },
        styleTags: [
            'p',
            {title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote'},
            'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
        ],
    });
    $('.note-editable').css('font-size', '18px');
}

const select2Init = () => {
    let select2El = $('.select2');
    if (select2El.length) {
        select2El.select2();
    }
}

const initSwitchToggler = () => {
    if (document.querySelectorAll('.js-switch').length) {
        let switcheryEl = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        switcheryEl.forEach(function (html) {
            new Switchery(html, {size: 'small'});
        });
    }
}


const initTooltip = () => {
    let tooltipEl = $('[data-bs-toggle="tooltip"]');
    if (tooltipEl.length) {
        tooltipEl.tooltip()
    }
}

const initPopOver = () => {
    let popoverEl = $('[data-bs-toggle="popover"]');
    if (popoverEl.length) {
        popoverEl.popover()
    }
}


const initBasicDatePicker = () => {
    let datepicker = $('#basic-datepicker')
    if (datepicker.length) {
        datepicker.flatpickr({
            altInput: !0,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            defaultDate: new Date
        });
    }
}

const initFileManagerWithDropify = () => {
    let lfm = $('#lfm')
    let lfm2 = $('#lfm2')

    if (lfm.length || lfm2.length) {
        $.fn.filemanager = function (type, options) {
            type = type || 'file';

            this.on('click', function (e) {
                let route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
                let target_path = $('#' + $(this).data('path'));
                let target_preview = $('#' + $(this).data('preview'));
                let target_preview_multiple = $('#' + $(this).data('preview-multiple'));
                let preview_wrapper = $('#' + $(this).data('preview-wrapper'));
                let preview_wrapper_multiple = $('#' + $(this).data('preview-wrapper-multiple'));

                window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');

                let multipleLfm = this.id === "lfm2";

                window.SetUrl = function (items) {
                    let file_path = items.map(function (item) {
                        return item.url;
                    }).join(',');

                    let multiplePaths = items.map(item => item.url);

                    if (multipleLfm) {
                        target_path.text('').text(multiplePaths);
                        $('#images_url').val(multiplePaths);
                    } else {
                        // set the value of the desired input to image url
                        $('#image_url').val(file_path)
                    }

                    // clear previous preview
                    target_preview.html('');
                    target_preview_multiple.html('');

                    // Set Preview Classes to render Image
                    $('#lfm').addClass('has-preview');
                    $('#lfm2').addClass('has-preview');
                    preview_wrapper.addClass('d-block');
                    preview_wrapper_multiple.addClass('d-block');

                    // set or change the preview image src
                    items.forEach(function (item) {
                        target_preview.append(
                            $('<img>').attr('src', item.url)
                        );
                        target_preview_multiple.append(
                            $('<img>').attr('src', item.url)
                        );
                    });

                    // trigger change event
                    target_preview.trigger('change');
                    target_preview_multiple.trigger('change');
                };
                return false;
            });
        }
        lfm.filemanager('image');
        lfm2.filemanager('image');
    }
}

$(document).ready(function () {
    datatableInit();
    choicesInit();
    choicesAltInit();
    dropifyInit();
    summernoteInit();
    select2Init();
    initSwitchToggler();
    initTooltip();
    initPopOver();
    initBasicDatePicker();
    initFileManagerWithDropify();
});
