let home_url = "http://localhost/wcc_app/";
let image_url = home_url + "backend/framework/uploads/images/";
let base_url = home_url + "backend/framework/controllers/";
let varErrMessage = "Failed to process request. Please try again.";
function fireAjax(path, payload, is_multi) {
    return new Promise(function (resolve, reject) {
     
        if (is_multi) {
            $.ajax({

                method: 'POST',
                url: base_url + path,
                data: payload,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    resolve(data);
                },
                error: function (err) {
                    reject(err);
                }
            })
        } else {
            $.ajax({

                method: 'POST',
                url: base_url + path,
                data: payload,
                success: function (data) {
                    resolve(data);
                },
                error: function (err) {
                    reject(err);
                }
            })
        }
    });
}

function fireSwal(swalTitle, swalBody, swalIcon) {
    Swal.fire({
        title: swalTitle,
        text: swalBody,
        icon: swalIcon,
        allowOutsideClick: false
    })
}