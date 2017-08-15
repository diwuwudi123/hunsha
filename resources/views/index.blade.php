<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Mr.Wu & Miss.Bai</title>
    <link rel="stylesheet" href="/css/swiper.css">
    <link rel="stylesheet" href="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/music.css">
    <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/js/swiper.js"></script>
    <style>
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
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
        iframe{
            height:100%;
            width:100%;
        }
    </style>
    </head>
  
    <body>
    <div id="music" class="music">		
        <audio id="music-audio" class="audio" src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/jianpan.mp3" loop="" autoplay="autoplay" preload="auto">		</audio>		
        <div class="control"><div class="control-after"></div></div>	
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div id="wedding"></div>
                <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/dist/build_2.js"></script>
            </div>
            <div class="swiper-slide">

                    <iframe src="http://hunsha.72ker.com/index/wel" frameborder=0></iframe>
            </div>
        </div>
   </div>
    <script src="http://wudihunsha.oss-cn-shanghai.aliyuncs.com/public/js/jquery.js"></script>
    <script>
        function audioAutoPlay(id){
            var audio = document.getElementById(id);
            if(audio.paused){
                audio.play();
                document.addEventListener("WeixinJSBridgeReady", function () {
                    audio.play();
                }, false);
                document.addEventListener('YixinJSBridgeReady', function() {
                    audio.play();
                }, false);
            } else {
                //暂停播放
                audio.pause();
            }
        }
        audioAutoPlay('music-audio');
        setTimeout('listen()', '100');
        window.aud = new Audio();                
        aud.src = 'http://wudihunsha.oss-cn-shanghai.aliyuncs.com/ctl.mp3';　　　　　　　　　　
        aud.preload="metadata";           
        aud.load();　　　　　　　　
        function listen(){
            if (window.t == true){
                audioAutoPlay('music-audio');
                aud.play();
            } else {
                setTimeout('listen()', '100');
            }
        }
        $(function(){
            
            $('#music').click(function(){
                if (window.t == false){
                    audioAutoPlay('music-audio');
                } else {
                    if (aud.paused){
                        aud.play();
                    } else {
                        aud.pause();
                    }
                }
                
                $(this).toggleClass('stopped')
            })
        });
    </script>
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

  </body>
</html>
