
//load bảng theo object array
function loadToTable(items) {
    //  if(items.length < )
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
                "data-id": convertObjToArr[0],
                "class": "edit-btn button border-btn success small"
            })
            .append("<span class='mif-pencil'></span>&ensp;Sửa</button>")


        let deleteBtn = $("<button></button>")
            .attr({
                "data-id": convertObjToArr[0],
                "class": "ml-2 delete-btn button border-btn success small bg-red"
            })
            .append("<span class='mif-bin'></span>&ensp;Xóa</button>")
        trBody.append($("<td></td>").append(editBtn).append(deleteBtn));
        table.find('tbody').append(trBody);
    });

}
//đường dẫn ajax ( biến toàn cục)
let ajaxPath = getAjaxPath();

//popup xác nhận
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

//xóa tất cả input của form ( trừ hình ảnh )
function clearForm($form) {
    $form.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
    $form.find(':checkbox, :radio').prop('checked', false);
    $('span.caption').text('');
}

//tạo notifications
function runToast(mode, text, timeout, callback) {
    var toast = Metro.toast.create;
    switch (mode) {
        case 'error': toast(text, callback, timeout, "bg-red fg-white success-toast"); break;
        case 'success': toast(text, callback, timeout, "bg-green fg-white success-toast"); break;
        default: toast("This is default toast");
    }
}

//lấy url root
function getRootPath() {
    let url = window.location.href;
    let folderDir = 'metroui_shopping_cart';
    let index = url.lastIndexOf(folderDir);

    url = url.substring(0, index + folderDir.length);
    return url;
}

//lấy url ajax
function getAjaxPath() {
    let url = getRootPath();
    let ajaxPath = url + '/ajax/php_service/';
    return ajaxPath;
}

//chuyển trang
function pageAction(getAllSchema) {
    $('.pagination').on('click', 'a.page-link', function () {
        if ($(this).text() === 'First') {
            getAllSchema(1);
        }
        else if ($(this).text() === 'Prev') {
            let currentPage = parseInt($('.pagination').data('page'));
            if (currentPage > 1) {

                let prevPage = currentPage - 1;
                getAllSchema(prevPage);
                $('.pagination').data('page', prevPage);
            }
        }

        else if ($(this).text() === 'Next') {
            let currentPage = parseInt($('.pagination').data('page'));
            let lastPage = parseInt($('.pagination').data('lastpage'))
            if (currentPage < lastPage) {
                let nextPage = parseInt($('.pagination').data('page')) + 1;
                getAllSchema(nextPage);
                $('.pagination').data('page', nextPage);
            }
        }
        else if ($(this).text() === 'Last') {
            let lastPage = parseInt($('.pagination').data('lastpage'))
            getAllSchema(lastPage);
        }
        else {
            let moveToPage = parseInt($(this).text());
            
            $('.pagination').data('page', moveToPage);
        }
    });

}

//tạo phân trang
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
    if (currentPage === 1) {
        $("a:contains('First')").parent().remove();
        $("a:contains('Prev')").parent().remove();
    }
    if (currentPage === lastPage) {
        $("a:contains('Last')").parent().remove();
        $("a:contains('Next')").parent().remove();
    }

}

function loadFunctionWithUrl(currentUrl) {
    //chỉ load các function nếu vào đúng url
}

function sliderInit() {
    function nextImage() {
        var isAnimating = $('.sliders').data('animating');
        if (!isAnimating) {
            $('.sliders').data('animating', true);
            let marginLeftAttr = $('.sliders').css('margin-left');
            let runTo = '-=840px';
            if (marginLeftAttr === '-1680px') {
                runTo = '+=1680px';
            }
            $('.sliders')
                .animate({ 'margin-left': runTo },
                    500,
                    function () {
                        $('.sliders').data('animating', false);
                    }
                )
        }
    }

    function prevImage() {
        var isAnimating = $('.sliders').data('animating');
        if (!isAnimating) {
            $('.sliders').data('animating', true);
            let marginLeftAttr = $('.sliders').css('margin-left');
            let runTo = '+=840px';
            if (marginLeftAttr === '0px') {
                runTo = '-=1680px';
            }
            $('.sliders')
                .animate({ 'margin-left': runTo },
                    500,
                    function () {
                        $('.sliders').data('animating', false);
                    }
                )
        }
    }

    $('.prev').on('click', function () {
        prevImage();
    });

    $('.next').on('click', function () {
        nextImage();
    })
}

$(document).ready(function () {
    toggleSearchCate();
    filterCurrentCate();
    selectCate();
    toggleUserInfo();

    sliderInit();
    let page = parseInt($('.pagination').data('page'));
    let url = window.location.href.toString();
    // console.log(url.includes('dashboard/category'));
    // console.log(url.includes('dashboard/product'));
    if (url.includes('dashboard/category')) {
        toggleEditForm()
        getAllCategories(page);
        addCategory();
        deleteCategory();
        pageAction(getAllCategories);

    }
    else if (url.includes('dashboard/product')) {
        getAllProducts(page);
        deleteProducts();
        pageAction(getAllProducts);
        //    console.log("vl");
    }
    // else if(url.includes('dashboard/category'))






    // mapKeysOfTable('xxx');
});


function toggleUserInfo(){
    $('.user-dd-icon').on('click',function(){
        $('.user-info-dropdown').slideToggle(250);
    })

}

function toggleSearchCate() {

    $('.search-by > span').on('click', function () {
        $('.search-by-list').slideToggle(250);
    })
}
function filterCurrentCate() {
    let currentCate = $('.search-by').data('cate');
    $('.search-by > .cate').text(currentCate);
    let cateList = $('.search-by-list').children();
    cateList.each(function (elm) {
        if ($(this).text() === currentCate) {
            $(this).addClass('selected-cate');
        }
    })
}

function selectCate() {
    $('.search-by-list').find('p').on('click', function () {
        $('.search-by-list').slideToggle(250);
        $('.search-by-list>p.selected-cate').removeClass('selected-cate');
        $('.search-by').data('cate', $(this).text());
        filterCurrentCate();
    })
}



