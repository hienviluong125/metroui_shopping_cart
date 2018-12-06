let ajaxPath = getAjaxPath();
function deleteConfirm(agreeCb, disagreeCb) {
    Metro.dialog.create({
        title: "<p class='fg-red'>Thông báo từ WeedDev</p>",
        content: "<div>Bạn có thật sự muốn xóa dữ liệu này không ?</div>",
        actions: [
            {
                caption: "Đồng ý",
                cls: "js-dialog-close alert",
                onclick: agreeCb
            },
            {
                caption: "Hủy",
                cls: "js-dialog-close",
                onclick: disagreeCb
            }
        ]
    });
}

function clearForm($form) {
    $form.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
    $form.find(':checkbox, :radio').prop('checked', false);
    $('span.caption').text('');
}

function runToast(mode, text, timeout, callback) {
    var toast = Metro.toast.create;
    switch (mode) {
        case 'error': toast(text, callback, timeout, "bg-red fg-white success-toast"); break;
        case 'success': toast(text, callback, timeout, "bg-green fg-white success-toast"); break;
        default: toast("This is default toast");
    }
}

function getRootPath() {
    let url = window.location.href;
    let folderDir = 'metroui_shopping_cart';
    let index = url.lastIndexOf(folderDir);

    url = url.substring(0, index + folderDir.length);
    return url;
}
function getAjaxPath() {
    let url = getRootPath();
    let ajaxPath = url + '/ajax/php_service/';
    return ajaxPath;
}



function previewImage() {
    $('#file').on('change', function () {
        readURL(this);
    })

    $('#categoryAddForm').on('submit', function (e) {
        e.preventDefault();
    })
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImage')
                .prepend("<p class='text-center'>Hình ảnh xem trước</p>"
                    + "<img style='display:block;margin-left:auto;margin-right:auto;' height='100px' src='" + e.target.result + "' />");
        }
        reader.readAsDataURL(input.files[0]);
    }
}


$(document).ready(function () {
    let page = parseInt($('.pagination').data('page'));
    getAllCategories(page);
    addCategory();
    editCategory()
    deleteCategory();
    pageAction();
});

function pageAction() {
    $('.pagination').on('click', 'a.page-link', function () {
        // let currentPage = $('.pagination');
        // let lastPage =  $('.pagination');

        if ($(this).text() === 'First') {
            getAllCategories(1);
        }
        else if ($(this).text() === 'Prev') {
            let currentPage = parseInt($('.pagination').data('page'));
            if (currentPage > 1) {

                let prevPage = currentPage - 1;
                alert(prevPage);
                getAllCategories(prevPage);
                $('.pagination').data('page', prevPage);
            }
        }

        else if ($(this).text() === 'Next') {
            let currentPage = parseInt($('.pagination').data('page'));
            let lastPage = parseInt($('.pagination').data('lastpage'))
            if (currentPage < lastPage) {
                let nextPage = parseInt($('.pagination').data('page')) + 1;
                alert(nextPage);
                getAllCategories(nextPage);
                $('.pagination').data('page', nextPage);
            }
        }
        else if ($(this).text() === 'Last') {
            let lastPage = parseInt($('.pagination').data('lastpage'))
            getAllCategories(lastPage);
        }
        else {
            let moveToPage = parseInt($(this).text());
            $('.pagination').data('page', moveToPage);
            getAllCategories(moveToPage);
        }
    });

}

function initPagination(currentPage, lastPage) {
    pagination = $('.pagination');
    pagination.html('');
    let paginationStr = ["First", "Prev", "Next", "Last"];
    paginationStr.forEach(function (elm) {
        let pageLink = $("<a></a>").attr({ class: "page-link" }).text(elm);
        let Page = $("<li></li>").attr({
            class: "page-item service"
        }).append(pageLink);
        pagination.append(Page);
    })

    for (let i = 1; i <= lastPage; i++) {
        let className = "page-item ";
        let content = i.toString();
        if (!(i > 3 && i <= lastPage - 3)) {
            if (i === currentPage) className += "active";
            let pageLink = $("<a></a>").attr({ class: "page-link" }).text(content);
            let Page = $("<li></li>").attr({
                class: className
            }).append(pageLink);

            Page.insertBefore($("a:contains('Next')").parent());
        }
        if (i === 4) {

            let pageLink = $("<a></a>").attr({ class: "page-link" }).text('...');
            let Page = $("<li></li>").attr({
                class: className
            }).append(pageLink);
            Page.insertBefore($("a:contains('Next')").parent());
        }
    }
    // let currentPage = parseInt($('.pagination').data('page'));
    // let lastPage = parseInt($('.pagination').data('lastpage'));


    if (currentPage === 1) {
        $("a:contains('First')").parent().remove();
        $("a:contains('Prev')").parent().remove();
    }
    if (currentPage === lastPage) {
        $("a:contains('Last')").parent().remove();
        $("a:contains('Next')").parent().remove();
    }


    //             <li class="page-item active"><a class="page-link" href="#">1</a></li>
    //             <li class="page-item"><a class="page-link" href="#">2</a></li>
    //             <li class="page-item"><a class="page-link" href="#">3</a></li>
    //             <li class="page-item no-link"><a class="page-link">...</a></li>

    //             <li class="page-item service"><a class="page-link" href="#">Next</a></li>
    //             <li class="page-item service"><a class="page-link" href="#">Last</a></li>
    //   $('.pagination')
    // alert(currentPage+lastPage);



    // let lastPageLink = $("<a></a>").attr({ class: "page-link" }).text('Last');

    // let lastPage = $("<li></li>").attr({
    //     class: "page-item service"
    // }).append(lastPageLink);


    // let PrevPageLink = $("<a></a>").attr({ class: "page-link" }).text('Prev');
    // let PrevPage = $("<li></li>").attr({
    //     class: "page-item service"
    // }).append(PrevPageLink);

    // let NextPageLink = $("<a></a>").attr({ class: "page-link" }).text('Next');
    // let NextPage = $("<li></li>").attr({
    //     class: "page-item service"
    // }).append(NextPageLink);



    // pagination.append(firstPage);
    // pagination.append(lastPage);
    // pagination.append('3');
    // pagination.append('4');
    //lastPage.prependTo(pagination);
    // firstPage.prependTo(pagination);
    // .prependTo(firstPage);
    // pagination.prepend(firstPage);
    //pagination.prepend(lastPage);

    // pagination.prepand($("<li></li>").)
    //               <li class="page-item service">First</li>
    //             <li class="page-item service"><Prev</li>
}

function loadToTable(items) {
    let table = $('.table');
    table.find('thead').html('');
    table.find('tbody').html('');

    // add all field to table
    let keysOfObject = _.keys(items[0]);
    let trHead = $("<tr></tr>");
    keysOfObject.forEach(function (k) {
        trHead.append($("<th></th>").text(k.toUpperCase()));
    })
    trHead.append($("<th></th>").text("action".toUpperCase()))
    table.find('thead').append(trHead);

    // add rows to table
    items.forEach(function (obj) {
        let convertObjToArr = _.toArray(obj);
        let trBody = $("<tr></tr>");
        convertObjToArr.forEach(function (elm, index) {
            //nếu là hình ảnh 
            if (elm.match(/\.(jpeg|jpg|gif|png)$/) !== null) {
                let imgElm = $('<img height="40px;" />').attr({
                    "src": getRootPath() + "/public/img/" + elm
                });
                trBody.append($("<td></td>").append(imgElm));
            }
            else {
                trBody.append($("<td></td>").text(elm));
            }
        });
        let editBtn = $("<button></button>")
            .attr({
                "data-cateid": convertObjToArr[0],
                "class": "edit-btn button border-btn success small"
            })
            .append("<span class='mif-pencil'></span>&ensp;Sửa</button>")


        let deleteBtn = $("<button></button>")
            .attr({
                "data-cateid": convertObjToArr[0],
                "class": "ml-2 delete-btn button border-btn success small bg-red"
            })
            .append("<span class='mif-bin'></span>&ensp;Xóa</button>")
        trBody.append($("<td></td>").append(editBtn).append(deleteBtn));
        table.find('tbody').append(trBody);
    });

}

function getAllCategories(page) {
    let start = (page - 1) * 5;
    let end = page * 5;

    $.get(ajaxPath + 'categories/getAllCategories.php', function (data) {
        let result = $.parseJSON(data);
        let categories = result.categories;
        let lastPage = Math.ceil(categories.length / 5);
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
                if (result.isSuccess) {
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
    $('.table').on('click', 'button.edit-btn', function () {
        let state = $('.categories-manager').data('state')
        if(state === 'adding'){
            $('.adding').css('display','none');
            $('.editing').css('display','block');
            $('.categories-manager').data('state','editing')
        }
       
    });



    
    $('.categories-manager').on('click','button.open-adding-btn',function(){
        let state = $('.categories-manager').data('state')
        if(state === 'editing'){
            $('.adding').css('display','block');
            $('.editing').css('display','none');
            $('.categories-manager').data('state','adding')
        }
    })
}


