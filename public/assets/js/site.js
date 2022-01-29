String.prototype.toProperCase = function () {
    return this.charAt(0).toUpperCase() + this.substring(1, this.length).toLowerCase();
};

//insertAfter(newnode,existingnode);
function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}

function resizeIframe(obj) {
    setTimeout(function () {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }, 1000);
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function htmlEntitiesMore(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, "&#039;");
}

function createSlug(value) {
    value = value.replace(/\s\s+/g, ' ');
    value = value.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    value = value.replace(/\u0142/g, "l");
    value = value.replace(/[\])}[{(]/g, "");
    value = value.replace(/[^a-zA-Z0-9 -]/g, "");
    let slug = value.split(' ').join('-').toLowerCase();
    return slug.replace(/--+/g, '-');
}

function alertMessage(msg_type, message_text) {
    var icon = 'fas fa-info-circle';
    if (msg_type == 'success') {
        icon = 'fas fa-check-circle';
    } else if (msg_type == 'danger') {
        icon = 'fas fa-exclamation-triangle';
    } else if (msg_type == 'info') {
        icon = 'fas fa-info-circle';
    } else if (msg_type == 'warning') {
        icon = 'fas fa-exclamation-circle';
    }

    $.notify({
        icon: icon,
        message: message_text

    }, {
        element: "body",
        position: '',
        type: msg_type,
        allow_dismiss: true,
        newest_on_top: false,
        placement: {
            from: "bottom",
            align: "right"
        },
        offset: {
            x: "5",
            y: "70"
        },
        spacing: 10,
        z_index: 1031,
        delay: 1000,
        timer: 100000,
        url_target: "_blank",
        mouse_over: null,
        animate: {
            enter: "animated fadeInDown",
            exit: "animated fadeOutUp"
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: "class",
        template: '<div data-notify="container" class="col-xs-11 col-sm-6 col-md-3 alert alert-{0}" role="alert">'
            + '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">'
            + '<i class="fas fa-times" style="font-size: 0.75rem;"></i>'
            + '</button>'
            + '<span data-notify="icon"></span>&nbsp;&nbsp;<span data-notify="title">{1}</span><span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'

    });
}


$(function () {
    $(document).on('blur', '.decimal-input', function (e) {
        let data = $(this).val();
        let place = $(this).data("decimal") ?? 0;
        let num = parseFloat(data);
        if (!isNaN(num)) {
            $(this).val(num.toFixed(place));
        } else {
            $(this).val("");
        }
    });

    $(document).on('keypress', '.decimal-input', function (e) {
        let data = $(this).val();
        if (e.charCode === 46 || (e.charCode >= 48 && e.charCode <= 57)) {
            if (data.length === 0 && e.charCode === 46) {
                return false;
            } else if (data.length > 0 && data.indexOf(".") >= 0 && e.charCode === 46) {
                return false;
            }
        } else {
            return false;
        }
    });

    $(document).on('blur', '.phone-input', function (e) {
        let data = $(this).val();
        let place = $(this).data("decimal") ?? 0;
        let num = parseFloat(data);
        if (!isNaN(num)) {
            $(this).val(num.toFixed(place));
        } else {
            $(this).val("");
        }
    });

    $(document).on('keypress', '.phone-input', function (e) {
        let data = $(this).val();
        if ((e.charCode >= 48 && e.charCode <= 57)) {
        } else {
            return false;
        }
    });

    $(document).on('keyup', '.make-slug', function (e) {
        let data = $(this).val();
        $('.input-slug').val(createSlug(data));
    });

    $(document).on('keyup', '.input-slug', function (e) {
        let data = $(this).val();
        $('.input-slug').val(createSlug(data));
    });

    $(document).on('blur', '.input-slug', function (e) {
        let data = $(this).val();
        if (data === '') {
            data = $('.make-slug').val();

        }
        $('.input-slug').val(createSlug(data));
    });

    $(document).on('click', '.btn-frm-submit', function (e) {
        $('#div-loading').show();
    });


    $("iframe.gallery-video").each(function () {
        console.log($(this)[0]);
        resizeIframe($(this)[0]);
    });
});
