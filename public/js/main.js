
function addToCart() {
    $('.add-to-cart').on('click', function () {
        $('.cart-notify-area').fadeIn(300);
    });

    $('.cart-notify-area').find('.mif-cancel').on('click', function () {
        $(this).parent().fadeOut(200);
    });
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
    addToCart();
    toggleSearchCate();
    filterCurrentCate();
    selectCate();
    toggleUserInfo();

    sliderInit();

    toggleEdit();


});


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



