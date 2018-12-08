

function getAllCategories(page) {
    let start = (page - 1) * 9;
    let end = page * 9;

    $.get(ajaxPath + 'categories/getAllCategories.php', function (data) {
        let result = $.parseJSON(data);
        let categories = result.categories;
        let lastPage = Math.ceil(categories.length / 9);
        categories = categories.slice(start, end);

        //set data phần tử lastpage
        $('.pagination').data('lastpage', lastPage);
        //load dữ liệu ajax
        loadToTable(categories);
        //tạo pageination
        // let page = parseInt($('.pagination').data('page'));
        initPagination(page, lastPage);
    })
}

function addCategory() {
    //save button click
    $('#add-btn').on('click', function (e) {
        e.preventDefault();
        let formData = new FormData($('#categoryAddForm')[0]);
        $.ajax({
            type: 'POST',
            url: ajaxPath + 'categories/addCategory.php',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                
                let result = $.parseJSON(data);
                if (result) {
                    clearForm($('#categoryAddForm'));
                    runToast('success', "Thêm thành công", 1000, null);
                    let page = parseInt($('.pagination').data('page'));
                    getAllCategories(page);
                   
                }
                else {
                    runToast('error', "Thêm thất bại", 1000, null);
                }
            },
            error: function (data) {
                runToast('error', "Thêm thất bại", 1000, null);
            }
        });
    })

    //cancel button click
    $('#cancel-btn').on('click', function (e) {
        e.preventDefault();
        clearForm($('#categoryAddForm'));
    })


}

function deleteCategory() {
    $('.table').on('click', 'button.delete-btn', function () {
        let clickedElement = $(this);
        deleteConfirm(function () {
            let id = { "id": clickedElement.data('cateid') };
            let body = JSON.stringify(id);
            $.ajax({
                type: "POST",
                url: ajaxPath + 'categories/deleteCategory.php',
                data: body,
                success: function (data) {
                    let isSuccess = $.parseJSON(data);
                    if (isSuccess) {
                        let page = parseInt($('.pagination').data('page'));
                        getAllCategories(page);
                        runToast('success', "Xóa thành công", 1000, null);
                    }
                    else {
                        runToast('error', "Xóa thất bại", 1000, null);
                    }
                },
                error: function (err) {
                    runToast('error', "Xóa thất bại", 1000, null);
                }
            });
        }, null);
    })

}

function editCategory() {
    $('#categoryEditForm').on('click', 'button#add-btn', function (e) {
        e.preventDefault();
        let formData = new FormData($('#categoryEditForm')[0]);
        $.ajax({
            type: 'POST',
            url: ajaxPath + 'categories/editCategory.php',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                let result = $.parseJSON(data);
                if (result.isSuccess) {
                    clearForm($('#categoryAddForm'));
                    runToast('success', "Sửa thành công", 1000, null);
                    let page = parseInt($('.pagination').data('page'));
                    getAllCategories(page);
                    $('.adding').css('display', 'block');
                    $('.editing').css('display', 'none');
                    $('.manager').data('state', 'adding')
                }
                else {
                    runToast('error', "Sửa thất bại", 1000, null);
                }
            },
            error: function (data) {
                runToast('error', "Sửa thất bại", 1000, null);
            }
        });
    })

    $('#categoryEditForm').on('click', 'button#cancel-btn', function (e) {
        e.preventDefault();
        clearForm($('#categoryEditForm'));
    })
}


function toggleEditForm() {
    $('.table').on('click', 'button.edit-btn', function () {
        let state = $('.manager').data('state')
        if (state === 'adding') {
            $('.adding').css('display', 'none');
            $('.editing').css('display', 'block');
            $('.manager').data('state', 'editing')
        }


        let keys = mapTdOfTable($('.table > thead > tr > th'));
        let Rows = mapTdOfTable($(this).parent().parent().find('td'));

        keys.forEach(function (v, i) {
            if (v !== 'image' && $('#' + v).length > 0) {
            $('#' + v).val(Rows[i]);
            }
          
        })

    });

    editCategory();




    $('.manager').on('click', 'button.open-adding-btn', function () {
        let state = $('.manager').data('state')
        if (state === 'editing') {
            $('.adding').css('display', 'block');
            $('.editing').css('display', 'none');
            $('.manager').data('state', 'adding')
        }
    })



    // $('#categoryEditForm').on('click',button)
}

function mapTdOfTable(tableSelector) {
    // let url = getRootPath();
    // let ajaxPath = url + ;
    // console.log(tableSelector);
    let keysArr = [];
    tableSelector.each(function () {
        // console.log();
        //nếu là hình ảnh, lấy source hình ảnh
        let key
        if ($(this).children().is('img')) {
            key = $(this).children().attr('src').toString();
            key = key.replace(getRootPath() + '/public/img/', '');
            keysArr = keysArr.concat(key);

        }
        else if (key !== 'action') {
            key = $(this).text().toLowerCase();
            keysArr = keysArr.concat(key);
        }

    });
    return keysArr;

}