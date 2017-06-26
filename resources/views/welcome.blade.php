<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>武迪和白贺丽</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="/css/swiper.css">
    <link rel="stylesheet" href="/css/component.css">
    <link rel="stylesheet" href="/css/barrager.css">

    <!-- Demo styles -->
    <style>
    html, body {
        position: relative;
        height: 100%;
    }
    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
    }
    .swiper-container {
        width: 100%;
        height: 100%;
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    img {
        max-height: 80%;
        width: auto;
    }
    #danmu {
        position: absolute;
        right: 10px;
        bottom : 5%;
        z-index: 2;
    }
    .kuro {
        position: absolute;
        bottom : 5%;
        z-index: 2;
    }
    </style>
</head>
<body>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide"><img data-src="http://wudihunsha.oss-cn-qingdao.aliyuncs.com/{{ $image }}" class="swiper-lazy"></div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    <div id="danmu" class="danmu"><img src="/images/huojian.png" style="height: 50px"></div>
    <div>
    <section class="content bgcolor-1 kuro " style="display: none;">
        <span class="input input--haruki">
            <input class="input__field input__field--haruki" type="text" id="input-2">
            <label class="input__label input__label--haruki" for="input-2">
                <span class="input__label-content input__label-content--haruki">你想说点什么</span>
            </label>
        </span>
      
    </section>
    </div>
    <script src="/js/jquery.js"></script>

    <!-- Swiper JS -->
    <script src="/js/swiper.js"></script>
    <script src="/js/jquery.barrager.js"></script>
    <script>
        $(function(){
            t = 0;
            counttime();
            var item={
               img:'/images/haha.gif', //图片 
               info:'武迪超级帅帅帅', //文字 
               close:true, //显示关闭按钮 
               speed:6, //延迟,单位秒,默认6 
               color:'#fff', //颜色,默认白色 
               old_ie_color:'#000000', //ie低版兼容色,不能与网页背景相同,默认黑色 
             }
            $(document).on('click', '.danmu', function(){
                $('.kuro').slideToggle('slow');
                $('.danmu').attr('class', 'send');
            });
            $(document).on('click', '.send', function(){
                $('.kuro').slideToggle('slow');
                $('.send').attr('class', 'danmu');
                $('body').barrager(item);
            });
        })
        function counttime()
        {
            t += 1;
            setTimeout('counttime()', 1000);
        }
    </script>
    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        effect: 'coverflow',
        lazyLoading : true,
        lazyLoadingInPrevNext : true,
        lazyLoadingInPrevNextAmount : 2,
    });
    </script>

    <script src="js/classie.js"></script>
        <script>
            (function() {
                // trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
                if (!String.prototype.trim) {
                    (function() {
                        // Make sure we trim BOM and NBSP
                        var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                        String.prototype.trim = function() {
                            return this.replace(rtrim, '');
                        };
                    })();
                }

                [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
                    // in case the input is already filled..
                    if( inputEl.value.trim() !== '' ) {
                        classie.add( inputEl.parentNode, 'input--filled' );
                    }

                    // events:
                    inputEl.addEventListener( 'focus', onInputFocus );
                    inputEl.addEventListener( 'blur', onInputBlur );
                } );

                function onInputFocus( ev ) {
                    classie.add( ev.target.parentNode, 'input--filled' );
                }

                function onInputBlur( ev ) {
                    if( ev.target.value.trim() === '' ) {
                        classie.remove( ev.target.parentNode, 'input--filled' );
                    }
                }
            })();
        </script>
</body>
</html>
