<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

    <div class="wrapper">
        <main>
            <section class="section-main">
                <div class="slider-main">
                    <div class="swiper-container big-sl">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="wrap">
                                    <div class="info">
                                        <div class="title">
                                            <h1>SDIS Chamberonne</h1>
                                        </div>
                                        <div class="editor">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                                                eros mauris, feugiat quis placerat nec, cursus ac ex. Nulla tellus
                                                nisi, vulputate in felis et, pellentesque dictum dui. Nam ornare
                                                elit a libero consequat porta.</p>
                                        </div>
                                        <div class="action flex">
                                            <a href="" class="btn">En savoir plus</a>
                                            <div class="sl-btn">
                                                <div class="big-sl-prev swiper-button-prev swiper-button-black"></div>
                                                <div class="big-sl-next swiper-button-next swiper-button-black"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="img" style="background-image: url('/assets/img/slider/1.jpg')"></div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wrap">
                                    <div class="info">
                                        <div class="title">
                                            <h1>SDIS Chamberonne</h1>
                                        </div>
                                        <div class="editor">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                                                eros mauris, feugiat quis placerat nec, cursus ac ex. Nulla tellus
                                                nisi, vulputate in felis et, pellentesque dictum dui. Nam ornare
                                                elit a libero consequat porta.</p>
                                        </div>
                                        <div class="action flex">
                                            <a href="" class="btn">En savoir plus</a>
                                            <div class="sl-btn">
                                                <div class="big-sl-prev swiper-button-prev swiper-button-black"></div>
                                                <div class="big-sl-next swiper-button-next swiper-button-black"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="img" style="background-image: url('/assets/img/slider/2.jpg')"></div>
                            </div>
                        </div>
                        <div class="big-sl-pagination swiper-pagination"></div>
                    </div>
                </div>
            </section>
            <section class="main-info">
                <div class="wrap">
                    <div class="columns">
                        <div class="content">
                            <div class="block-main">
                                <div class="title">
                                    <h2>Les Alarmes</h2>
                                </div>
                                <div class="editor mb-15">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eros mauris, feugiat quis placerat nec, cursus ac ex. Nulla tellus nisi, vulputate in felis et, pellentesque dictum dui. Nam ornare elit a libero consequat porta. Quisque rutrum accumsan porttitor. Nunc malesuada urna quis mi varius auctor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce a sapien a velit commodo tincidunt. Vestibulum fermentum mauris id mi dignissim auctor. Donec risus odio, imperdiet vitae placerat at, malesuada eget erat. Phasellus eu elit lacinia lorem maximus tristique. Aliquam luctus, nunc sed dictum faucibus, sem augue vestibulum neque, suscipit pretium metus tortor quis enim.</p>
                                </div>
                                <a href="" class="btn">Toutes les alarmes</a>
                            </div>
                        </div>
                        <aside class="aside">
                            <div class="cont">
                                <div class="info">
                                    <div class="title">
                                        <h4>Prochaines activités</h4>
                                    </div>
                                    <div class="list-alarms">
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">13.02.20</span>
                                            <span class="text">APR G.1</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">12.02.20</span>
                                            <span class="text">CCF 1</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">11.02.20</span>
                                            <span class="text">SAN E.1</span>
                                        </div>
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">10.02.20</span>
                                            <span class="text">DPS 1.1</span>
                                        </div>
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">10.02.20</span>
                                            <span class="text">DPS 1.1</span>
                                        </div>
                                    </div>
                                    <div class="block-btn">
                                        <a href="" class="btn">Toutes les activités</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cont">
                                <div class="info">
                                    <div class="title">
                                        <h4>Dernières alarmes</h4>
                                    </div>
                                    <div class="list-alarms">
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">29.01.20</span>
                                            <span class="text">Sauvetage 008</span>
                                        </div>
                                        <div class="row">
                                            <i class="icon icon-picture"></i>
                                            <span class="date">21.01.20</span>
                                            <span class="text">Alarme automatique 007</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">06.01.20</span>
                                            <span class="text">Feu 006</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">31.12.19</span>
                                            <span class="text">Inondation 005</span>
                                        </div>
                                        <div class="row">
                                            <span class="date">29.12.19</span>
                                            <span class="text">Prévention feu 004</span>
                                        </div>
                                    </div>
                                    <div class="block-btn">
                                        <a href="" class="btn">Toutes les activités</a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </section>
        </main>
    </div>

<?php
get_footer();

