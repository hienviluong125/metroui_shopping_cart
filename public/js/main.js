
$(document).ready(function () {
    var url = window.location.href;
    var folderDir = 'metroui_shopping_cart';
    var index = url.lastIndexOf(folderDir);

    url = url.substring(0, index + folderDir.length);
    var ajaxPath = url + '/ajax/php_service/';

    $('#file').on('change', function () {
        readURL(this);
    })

    $('#categoryAddForm').on('submit', function (e) {
        e.preventDefault();
    })

    $('#add-btn').unbind('click').bind('click', function (e) {
        e.preventDefault();
        var formData = new FormData($('#categoryAddForm')[0]);
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: ajaxPath + 'addCategory.php',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
            },
            error: function (data) {
                console.log("error");

            }
        });
    })

    $('#cancel-btn').on('click', function () {
        console.log("hủy");
    })

    // console.log(formData);


});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImage').prepend("<p>Hình ảnh xem trước</p>" + "<img height='150px' src='" + e.target.result + "' />");
        }
        reader.readAsDataURL(input.files[0]);
    }
}