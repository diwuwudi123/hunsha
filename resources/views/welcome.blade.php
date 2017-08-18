<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>武迪和白贺丽</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/css/swiper.css">
    <link rel="stylesheet" href="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/css/component.css">
    <link rel="stylesheet" href="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/css/barrager.css">
    <link rel="stylesheet" href="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/css/base.css">

    
    
</head>
<body>
<div class="wedding container">
    <header class="wedding-header"><a href="javascript:;"></a> <a href="javascript:;" class="minimum"></a> <a href="javascript:;" class="maximum"></a>
    </header> 
    <div>
        <div class="wedding-editor"><p class="code">Last login: <span></span></p>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($images as $image)
                    <div class="swiper-slide"><img data-src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/hunsha/{{ $image }}" class="swiper-lazy"></div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        
    </div> 
    <div id="danmu" class="danmu"><img src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/images/huojian.png" style="height: 50px"></div>
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
</div>
    
    
    <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/js/jquery.js"></script>

    <!-- Swiper JS -->
    <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/js/swiper.js"></script>
    <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/js/jquery.barrager.js"></script>
    <script>
        
        $(function(){
            t = 0;
            counttime();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            get_comment();
            $(document).keypress(function(e) {  
                // 回车键事件  
                if(e.which == 13) {  
                    $('.send').click();
                }  
            }); 
            var now_date = (new Date()).toDateString();
            $('p.code span').text(now_date);
            
            var item={
               info:'', //文字 
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
                var content = $('input.input__field').val();
                if(content == '')
                {
                    return false;
                }
                if (item.img== null ){
                    var sex   = Math.floor(Math.random()*2) == 1 ? 'nan_' : 'nv_';

                    avatar= '/images/avatar/' + sex + Math.floor(Math.random()*4) + '.jpg';
                    item.img = 'http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public' + avatar;
                }
                item.info = content;
                $('body').barrager(item);
                $('input').val('');
                send_to_server(item, t, avatar);
            });
        })
        function send_barrager(item)
        {
            $('body').barrager(item);
        }
        function get_comment()
        {
            var data = {time:t};
            $.post('/index/get_comment', data = data, function(data){
                $.each(data.data, function(idx, obj){
                    var item = {img:'http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public'+obj.img, info:obj.comment,close:true,speed:6,color:'#fff'};
                    setTimeout(function(){send_barrager(item)}, (obj.time - t) *1000, item);
                })
            });
            setTimeout('get_comment()', 30000);
        } 
        function counttime()
        {
            t += 1;
            setTimeout('counttime()', 1000);
        }

        function send_to_server(item, t, avatar)
        {
            var data = {img : avatar, info : item.info, time:t};
            $.post('/index/push_comment', data = data, function(){

            });
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
        lazyLoadingInPrevNextAmount : 4,
    });
    </script>

    <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/js/classie.js"></script>
    <script>
        (function() {
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
                // inputEl.addEventListener( 'focus', onInputFocus );
                inputEl.addEventListener( 'blur', onInputBlur );
            } );

           

            function onInputBlur( ev ) {
                if( ev.target.value.trim() === '' ) {
                    classie.remove( ev.target.parentNode, 'input--filled' );
                }
            }
        })();
    </script>
</body>
</html>
