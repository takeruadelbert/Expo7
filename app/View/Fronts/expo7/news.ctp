<section id="content">
    <div class="row backgroundContent">
        <div class="col-md-12 col-sm-12 col-xs-12 container-padding">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-topContent">
                        <?php
                        foreach ($dataHighlightNews as $index => $highlightNews) {
                            $news_title = seoUrl($this->MultiLang->readLangClassic($highlightNews['News'], "title"));
                            if ($index < 3) {
                                if ($index == 0) {
                                    $style = "topLeftContent";
                                    ?>    
                                    <div class="col-md-7 col-sm-7 col-xs-12 boxOut-<?= $style ?>" style="background-image: url('<?= str_replace('\\', '/', Router::url($highlightNews['News']['thumbnail_path'], true)) ?>');">
                                        <div class="boxOut-topTitleNews">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita-title font-AvenirLtStd-Roman">
                                                    <a href="<?= Router::url("/news/{$highlightNews['News']['id']}/{$news_title}") ?>">
                                                        <?= $this->MultiLang->readLangClassic($highlightNews['News'], "title") ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita-date font-AvenirLtStd-Light">
                                                    <?php
                                                    if ($this->Session->read("lang") == "ind") {
                                                        echo $this->Html->cvtHariTanggal($highlightNews['News']['news_date']);
                                                    } else {
                                                        echo $this->Html->cvtHariTanggalEng($highlightNews['News']['news_date']);
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                                                    
                                    <?php
                                } else {
                                    if ($index == 1) {
                                        $style = "topRightTopContent";
                                        ?>
                                        <div class="col-md-5 col-sm-5 col-xs-12 boxOut-topRightContent">
                                            <?php
                                        } else {
                                            $style = "topRightBottomContent";
                                        }
                                        ?>
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-<?= $style ?>" style="background-image: url('<?= str_replace('\\', '/', Router::url($highlightNews['News']['thumbnail_path'], true)) ?>');">
                                            <div class="boxOut-topRightTitleNews">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-topRight-title font-AvenirLtStd-Roman">
                                                        <a href="<?= Router::url("/news/{$highlightNews['News']['id']}/{$news_title}") ?>">
                                                            <?= $this->MultiLang->readLangClassic($highlightNews['News'], "title") ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-berita-date font-AvenirLtStd-Light">
                                                        <?php
                                                        if ($this->Session->read("lang") == "ind") {
                                                            echo $this->Html->cvtHariTanggal($highlightNews['News']['news_date']);
                                                        } else {
                                                            echo $this->Html->cvtHariTanggalEng($highlightNews['News']['news_date']);
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if ($index == 2) {
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                            } else {
                                break;
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="col-md-12 col-sm-12 col-xs-12 background-container">
                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-instruction">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pageList pagelist active contentMark">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-listBerita">
                                            <?php
                                            $counter = 0;
                                            foreach ($news as $index => $items) {
                                                $news_title = seoUrl($this->MultiLang->readLangClassic($items['News'], "title"));
                                                if ($index % 2 == 0) {
                                                    $style2 = "bottomLeft";
                                                } else {
                                                    $style2 = "bottomRight";
                                                }
                                                ?>
                                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-<?= $style2 ?>">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-imgBerita">
                                                                <a href="<?= Router::url("/news/{$items['News']['id']}/{$news_title}", true) ?>">
                                                                    <img src="<?= Router::url($items['News']['thumbnail_path'], true) ?>">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleBerita font-AvenirLtStd-Heavy">
                                                                <a href="<?= Router::url("/news/{$items['News']['id']}/{$news_title}", true) ?>">
                                                                    <?= $this->MultiLang->readLangClassic($items['News'], "title") ?>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-dateBerita font-AvenirLtStd-Light">
                                                                <?php
                                                                if ($this->Session->read("lang") == "ind") {
                                                                    echo $this->Html->cvtHariTanggal($items['News']['news_date']);
                                                                } else {
                                                                    echo $this->Html->cvtHariTanggalEng($items['News']['news_date']);
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textBerita font-AvenirLtStd-Light">
                                                                <?php
                                                                $content = strip_tags(html_entity_decode($this->MultiLang->readLangClassic($items['News'], "content")));
                                                                $length = 200;
                                                                if (strlen($content) > $length) {
                                                                    echo substr($content, 0, $length) . "...";
                                                                } else {
                                                                    echo $content;
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pagination -->
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-pagination">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-pagination font-Lato">
                                            <div class="boxOut-page">
                                                <?= $this->Expo7->pagination($paginationInfo, $this->request->query, Router::url("", true)) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {


        $('.content-nav').find('a').on('click', function (e) {
            var tabLoc = $(this).attr('href');

            $(tabLoc).fadeIn().siblings().hide();
            $(this).siblings().removeClass('active');

            $(tabLoc).siblings().find('.contentMark').fadeIn().siblings().hide();
            $(tabLoc).siblings().find('.pageMark').addClass('active').parents('span').siblings().find('a').removeClass('active');

            e.preventDefault();
        });

        $('.box-pagination').find('a').on('click', function (e) {
            var pageLoc = $(this).attr('href');

            $(pageLoc).fadeIn().siblings().hide();
            $(this).addClass('active').parents('span').siblings().find('a').removeClass('active');

            e.preventDefault();
        });

    });
</script>