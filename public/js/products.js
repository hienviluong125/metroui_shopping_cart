function getAllProducts(page) {
    let start = (page - 1) * 9;
    let end = page * 9;

    $.get(ajaxPath + 'products/getAllProducts.php', function (data) {
      
        let result = $.parseJSON(data);
        console.log(data);
        console.log(result);
        let products = result.products;
        let lastPage = Math.ceil(products.length / 9);
        products = products.slice(start, end);
        // //set data phần tử lastpage
        $('.pagination').data('lastpage', lastPage);
        //load dữ liệu ajax
        loadToTable(products);
        // //tạo pageination
        // // let page = parseInt($('.pagination').data('page'));
        // initPagination(page, lastPage);
    })
}
