function fireAjax(path, payload, is_multi) {
    let retval = "";
    if (is_multi) {
        $.ajax({
            method: 'POST',
            url: path,
            data: payload,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                retval = data.trim();
            }
        })
    } else {
        $.ajax({
            method: 'POST',
            url: path,
            data: payload,
            success: function (data) {
                retval = data.trim();
            }
        })
    }
    return retval;
}

function fireSwal(swalTitle, swalBody, swalIcon) {
    Swal.fire({
        title: swalTitle,
        text: swalBody,
        icon: swalIcon
    })
}

