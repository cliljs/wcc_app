//let home_url = "https://www.sdpmonitoring.com/WCC_BRY/";
let home_url = "http://localhost/wcc_app/";
let image_url = home_url + "backend/framework/uploads/images/";
let base_url = home_url + "backend/framework/controllers/";
let varErrMessage = "Failed to process request. Please try again.";
function fireAjax(path, payload, is_multi) {
    preload('body', true);
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
                    console.log(data);
                    preload('body', false);
                    resolve(data);
                },
                error: function (err) {
                    console.log(err);
                    preload('body', false);
                    reject(err);
                }
            })
        } else {
            $.ajax({

                method: 'POST',
                url: base_url + path,
                data: payload,
                success: function (data) {
                    console.log(data);
                    preload('body', false);
                    resolve(data);
                },
                error: function (err) {
                    console.log(err);
                    preload('body', false);
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
        allowOutsideClick: false,
        allowEscapeKey: false
    })
}

function preload(element, is_show) {
    if (is_show) {
      $(element).preloader({
        text: 'Loading. Please wait...',
        percent: '',
        duration: '',
        zIndex: '',
        setRelative: true

      });
    } else {
      $(element).preloader('remove')
    }

  };