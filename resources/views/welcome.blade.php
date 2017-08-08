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

    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
    
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
        height: 96%;
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
    .wedding .img {
        max-height: 80%;
        width: auto;
        max-width: 100%;
    }
    #danmu {
        position: absolute;
        right: 10px;
        bottom : 5%;
        z-index: 200;
    }
    .kuro {
        position: absolute;
        bottom : 5%;
        z-index: 2;
    }
    </style>
    <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/dist/build-1.js"></script>
</head>
<body>
<div class="container wedding">
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
                    <div class="swiper-slide">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="宾客姓名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="mobile" placeholder="联系方式">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">确定参加</button>
                            </div>
                        </div>
                    </form>
                    </div>
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
