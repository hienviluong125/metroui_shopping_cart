
function cartAddBtnEvent() {
    let timer;
    $('.add-to-cart').on('click', function () {
        $('.cart-notify-area').stop(true, true).fadeIn(300, function () {
            clearTimeout(timer);
            timer = setTimeout(function () {
                $('.cart-notify-area').fadeOut(300);
            }, 3000);
        });


        let productid = $(this).data('productid');
        let qty = $(this).data('qty');
        qty = typeof qty === 'undefined' ? 1 : qty;

        addTocart(productid, qty);


        $('.cart-notify-area').find('.mif-cancel').on('click', function () {
            $(this).parent().fadeOut(200);
        });
    });
}

function getAjaxDir(){
    let siteName = "metroui_shopping_cart";
    let rootUrl = window.location.href;
    let ajaxDir = rootUrl.indexOf(siteName);
    return rootUrl.substring(0, ajaxDir + siteName.length) + '/ajax/php_service/';
}

function addTocart(id, qty) {
    ajaxDir = getAjaxDir();

    $.ajax({
        type: "POST",
        url: ajaxDir + 'addCart.php',
        data: JSON.stringify({ 'id': id, 'qty': qty }),
        success: function (data) {
            let cartData = JSON.parse(data);

            //console.log(cartData);
            $('.shopping-badge').html(cartData.length);
        },
        error: function (err) {
            runToast('error', "Xóa thất bại", 1000, null);
        }
    });
}



function sliderInit() {
    function nextImage(selector) {
        var slider = $('#' + selector).find('.sliders');
        var isAnimating = slider.data('animating');
        if (!isAnimating) {
            $(slider).data('animating', true);
            let marginLeftAttr = $(slider).css('margin-left');
            let runTo = '-=840px';
            if (marginLeftAttr === '-1680px') {
                runTo = '+=1680px';
            }
            $(slider)
                .animate({ 'margin-left': runTo },
                    500,
                    function () {
                        $(slider).data('animating', false);
                    }
                )
        }
    }

    function prevImage(selector) {
        var slider = $('#' + selector).find('.sliders');
        var isAnimating = slider.data('animating');
        if (!isAnimating) {
            $(slider).data('animating', true);
            let marginLeftAttr = $(slider).css('margin-left');
            let runTo = '+=840px';
            if (marginLeftAttr === '0px') {
                runTo = '-=1680px';
            }
            $(slider)
                .animate({ 'margin-left': runTo },
                    500,
                    function () {
                        $(slider).data('animating', false);
                    }
                )
        }
    }


    $('.prev').on('click', function () {
        var className = $('#' + 'my-slider').attr('class');
        if (className === 'single-slider') {
            prevImage('my-slider');
        }

    });

    $('.next').on('click', function () {
        var className = $('#' + 'my-slider').attr('class');
        if (className === 'single-slider') {
            nextImage('my-slider');
        }

    })
}

function GGCaptchaChecked(){
    let className = $('.g-captcha-notification').attr('class');
    $('.g-captcha-notification').html('Check thành công');
    className = className.replace('fg-red','fg-green');
    $('.g-captcha-notification').attr('class',className);
    $('.register-btn').removeAttr('disabled');

}

function updateCart(){
    let ajaxDir = getAjaxDir();
    let cartItemList = [];
    $('.cart-table > tbody > tr').each(function(){
        let className = $(this).attr('class');
        if(className === 'cart-item'){
            let newCartElm ={};
            newCartElm.id = parseInt($(this).find('.cart-item-id').text());
            newCartElm.qty = parseInt($(this).find('.qty > .qty-input > .original-input').val());
            cartItemList.push(newCartElm);
        }
    });
    $.ajax({
        type: "POST",
        url: ajaxDir + 'updateCart.php',
        data: JSON.stringify(cartItemList),
        success: function () {
            window.location.reload();
        },
        error: function (err) {
            
        }
    });
}

function updateCartBtnClicked(){
    
    $('.update-cart').on('click',function(){
        updateCart();
    });
    
}

function PlusMinusBtnClicked(){
    $('.spinner-button').on('click',function(){
        updateCart();
    })
}

$(document).ready(function () {

    cartAddBtnEvent();
    toggleSearchCate();
    filterCurrentCate();
    selectCate();
    toggleUserInfo();

    sliderInit();

    toggleEdit();

    itemHover();

    multiple_slider();

    bindIdToDialog();
    qty_input();

  
    
    updateCartBtnClicked();
    
    
    
    PlusMinusBtnClicked();
    // changePreviewImg();
    imageItemClicked()
    searchKeyPress();


});

function imageItemClicked(){
    $('.img-box').on('click',function(){
        $('.image-list > .cell-3').each(function(){
           $(this).find('.img-box').removeClass("bd-cyan");
        })
        $(this).addClass("bd-cyan");
        let imgSrc = $(this).find('img').attr('src');
        console.log(imgSrc);
        $('.big-img').fadeOut(250,function(){
            $(this).attr('src',imgSrc);
        }).fadeIn(250);
      
    })
}

function bindIdToDialog() {
    $('.delete-btn').on('click', function () {
        Metro.dialog.open('#deleteDialog');
        let id = $(this).data('deleteid');
        let url = window.location.href;

        let deleteEndpoint = url.substring(0, url.indexOf('show')) + 'delete/' + id;
        $('.delete-confirm-btn').attr('href', deleteEndpoint);

    });
}

function qty_input() {
    $('.qty-input').find('.original-input').on('keydown', function (e) {
        alert("hi");
    })
}


// function initSliderMaxWidth(arraySlider){
//     let staticWith = 186;
//     return arraySlider.map(element => {
//         let elmLength = $(element).find('.sliders').find('.single-item').length;
//         let maxWidth = 186 * elmLength;
//         $(element).find('.sliders').css('width',(elmLength*186).toString() +'px');
//         return {
//             'id' : element,
//             'width' : maxWidth
//         }
//     });
// }



function multiple_slider() {
    //set css with item length
  //  let widthsOfSlider = initSliderMaxWidth(['#slider_1','#slider_2','#slider_3']);
    $('.prev-multiple').on('click', function () {
        let id = $(this).parent().find('.my-multiple-slider').attr('id');
      
        var isAnimating = $('#' + id).data('animating');
        var runto = '+=186px';
        if($('#' + id).find('.sliders').css('margin-left') === '0px')runto = '-=744px'
        // console.log($('#' + id).find('.sliders').css('margin-left'));
        if (!isAnimating) {
            $('#' + id).data('animating', true);
            $('#' + id).find('.sliders').stop(true, true).animate({
                'margin-left': runto
            }, '200', function () {
                $('#' + id).data('animating', false);
            });
        }

    });
    $('.next-multiple').on('click', function () {
        // console.log(id);
        let id = $(this).parent().find('.my-multiple-slider').attr('id');
        var runto = '-=186';
        if($('#' + id).find('.sliders').css('margin-left') === '-744px')runto = '+=744px';
        var isAnimating = $('#' + id).data('animating');
        if (!isAnimating) {
            $('#' + id).data('animating', true);
            $('#' + id).find('.sliders').stop(true, true).animate({
                'margin-left': runto
            }, '200', function () {
                $('#' + id).data('animating', false);
            });
        }
    });
}

function searchKeyPress(){
    $('.search-input > input').keypress(function(e) {
        
        if(e.which == 13) {
            let searchBy = $('.selected-cate').data('value');
            let content = e.target.value;
            let url = 'http://' + window.location.host + "/metroui_shopping_cart/product/search/" + searchBy +"/" + content;
            window.location.href =  url;
        }
    });
}

function itemHover() {
    $('.single-item')
        .mouseenter(function () {
            $(this).find('.single-item-card').stop(true, true).animate({
                bottom: '0%'
            }, '500', 'linear');
        })
        .mouseleave(function () {
            $(this).find('.single-item-card').stop(true, true).animate({
                bottom: '-100%'
            }, '400', 'linear');

        })
}

function toggleEdit() {
    let currentState = $('.category-manager').data('state');
    $('.edit-toggle-btn').on('click', function () {
        if (currentState === 'adding') {
            $('.adding').css('display', 'none');
            $('.editing').css('display', 'block');
            $('.category-manager').data('state', 'editing');
        }
    });

    $('.editing').on('click', 'span.mif-cancel', function () {
        $('.adding').css('display', 'block');
        $('.editing').css('display', 'none');
        $('.category-manager').data('state', 'adding');
    });

}


function toggleUserInfo() {
    $('.user-dd-icon').on('click', function () {
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



