<style>
    .full-height {
        display: table;
        width: 100%;
        height: 50vh;
        text-align: center;
    }
    #section-scroller-button {
        position: fixed;
        right: 60px;
        bottom: 50px;
        height: 60px;
        width: 60px;
        border-radius: 50%;
        background-color: #ff9800;
        color: white;
        z-index: 10;
        cursor: pointer;
        -webkit-tap-highlight-color: rgba(255, 255, 255, 0);
        -webkit-box-shadow: 0 8px 42px -10px rgba(0, 0, 0, 0.85);
        box-shadow: 0 8px 42px -10px rgba(0, 0, 0, 0.85);
    }

    .caret {
        position: absolute;
        top: 0;
        width: 5px;
        height: 5px;
        display: inline;
        margin: 22px 23px;
        padding: 3px;
        border-bottom: solid 3px #fff;
        border-right: solid 3px #fff;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-transition: all 0.6s;
        -o-transition: all 0.6s;
        transition: all 0.6s;
    }

    #section-scroller-button.rotate .caret {
        top: 4px;
        -webkit-transform: rotate(-135deg);
        -ms-transform: rotate(-135deg);
        transform: rotate(-135deg);
    }
</style>
<div class="main">
    <section class="section-scroll" id="content">
        <div class="row backgroundContent">
            <div class="container container-padding">
                <h2 class="text-center" style="font-weight:bold;">Homepage (Unregistered)</h2>
                <h4 class="text-center" style="color:RGB(128,128,128);">Get Started News Guidlines Question And Answer </h4>
                <div class="row margin padding">
                    <object>
                        <embed src="<?= Router::url("/front_file/expo7/img/a.png", true) ?>">
                    </object>
                    <a href="#1" class="font" ><img src="<?= Router::url($how_to[0]['HowTo']['icon_path'], true) ?>" class="icon w3-animate-top" data-toggle="modal" data-target="#icon1"></a>
                    <div class="service">Our service</div>
                    <div class="product">Our Product</div>
                    <div class="hr w3-center w3-animate-left"></div>
                    <a href="#2" class="font" ><img src="<?= Router::url($how_to[1]['HowTo']['icon_path'], true) ?>" class="icon2 w3-animate-zoom" data-toggle="modal" data-target="#icon2"></a>
                    <div class="infinity">Infinity</div>
                    <div class="hr2"></div>
                    <a href="#3" class="font" ><img src="<?= Router::url($how_to[2]['HowTo']['icon_path'], true) ?>" class="icon3 w3-animate-left" data-toggle="modal" data-target="#icon3"></a>
                    <div class="hrdown"></div>
                    <a href="#4" class="font" ><img src="<?= Router::url($how_to[3]['HowTo']['icon_path'], true) ?>" class="icon4 w3-animate-bottom" data-toggle="modal" data-target="#icon4"></a>
                    <div class="playing">playing</div>
                    <div class="hrdown2"></div>
                    <a href="#5" class="font"><img src="<?= Router::url($how_to[4]['HowTo']['icon_path'], true) ?>" class="icon5 w3-animate-zoom" data-toggle="modal" data-target="#icon5"></a>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 text-center click">
                    <span>*Click On The Icon For More Information</span>
                </div>

            </div>
        </div>
    </section>
    <?php
    $counter = 1;
    foreach ($how_to as $howTo) {
        ?>
        <section>
            <div class="row">
                <div class="modal fade" id="icon<?= $counter ?>" role="dialog" style="top:20%;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-center"><B><?= $this->MultiLang->readLangClassic($howTo['HowTo'], "title") ?></B></h4>
                            </div>
                            <div class="modal-body" style="padding:0px;">
                                <div class="col-md-3 col-sm-2 col-xs-3 text-center signup">
                                    <a href="" class="font" ><img src="<?= Router::url($howTo['HowTo']['icon_path'], true) ?>" class="spasi w3-animate-left"/></a>
                                </div>
                                <div class="col-md-8 col-sm-9 col-xs-8 text-justify">
                                    <?= $this->MultiLang->readLangClassic($howTo['HowTo'], "description") ?>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <h6 class="text-center">Click Back To See Previous/Next Step</h6>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">BACK</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $counter++;
    }
    ?>    
</div>

<!--<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $(function() { // dom ready

    $(".section-scroll").sectionScroller({
      scrollerButton: "#section-scroller-button",
      scrollType: "swing",
      scrollDuration: 300,
    });

  });
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
                </script>-->