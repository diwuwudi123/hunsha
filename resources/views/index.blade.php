<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Mr.Wu & Miss.Bai</title>
    <link rel="stylesheet" href="/css/swiper.css">
    <script src="/js/swiper.js"></script>
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
  <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div id="wedding"></div>
                <script src="/dist/build.js"></script>
            </div>
            <div class="swiper-slide">

                    <iframe src="http://127.0.0.1:81/index/wel"></iframe>
            </div>
        </div>
   </div>
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
