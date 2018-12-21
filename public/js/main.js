
function addToCart() {
    $('.add-to-cart').on('click', function () {
        $('.cart-notify-area').fadeIn(300);
    });

    $('.cart-notify-area').find('.mif-cancel').on('click', function () {
        $(this).parent().fadeOut(200);
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

$(document).ready(function () {

    addToCart();
    toggleSearchCate();
    filterCurrentCate();
    selectCate();
    toggleUserInfo();

    sliderInit();

    toggleEdit();

    itemHover();

    multiple_slider();



});

function multiple_slider() {
    $('.prev-multiple').on('click', function () {
        let id = $(this).parent().find('.my-multiple-slider').attr('id');

        var isAnimating = $('#' + id).data('animating');
        if (!isAnimating) {
            $('#' + id).data('animating', true);
            $('#' + id).find('.sliders').stop(true, true).animate({
                'margin-left': '+=190px'
            }, '200', function () {
                $('#' + id).data('animating', false);
            });
        }

    });
    $('.next-multiple').on('click', function () {
        // console.log(id);
        let id = $(this).parent().find('.my-multiple-slider').attr('id');

        var isAnimating = $('#' + id).data('animating');
        if (!isAnimating) {
            $('#' + id).data('animating', true);
            $('#' + id).find('.sliders').stop(true, true).animate({
                'margin-left': '-=190px'
            }, '200', function () {
                $('#' + id).data('animating', false);
            });
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



