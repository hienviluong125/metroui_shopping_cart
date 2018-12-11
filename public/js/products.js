function getAllProducts(page) {
    let start = (page - 1) * 9;
    let end = page * 9;

    $.get(ajaxPath + 'products/getAllProducts.php', function (data) {

        let result = $.parseJSON(data);
        
        let products = result.products;
        let lastPage = Math.ceil(products.length / 9);
        products = products.slice(start, end);
        //set data phần tử lastpage
        $('.pagination').data('lastpage', lastPage);
        // load dữ liệu ajax
        loadToTable(products);
        //tạo pageination
        let page = parseInt($('.pagination').data('page'));
        initPagination(page, lastPage);
    })
}

function deleteProducts(){
    $('.table').on('click', 'button.delete-btn', function () {
        let clickedElement = $(this);
        deleteConfirm(function () {
            let id = { "id": clickedElement.data('id') };
            let body = JSON.stringify(id);
            $.ajax({
                type: "POST",
                url: ajaxPath + 'products/deleteProduct.php',
                data: body,
                success: function (data) {
                    console.log(data);
                    // let isSuccess = $.parseJSON(data);
                    // if (isSuccess) {
                    //     let page = parseInt($('.pagination').data('page'));
                    //     getAllCategories(page);
                    //     runToast('success', "Xóa thành công", 1000, null);
                    // }
                    // else {
                    //     runToast('error', "Xóa thất bại", 1000, null);
                    // }
                },
                error: function (err) {
                    runToast('error', "Xóa thất bại", 1000, null);
                }
            });
        }, null);
    })
}