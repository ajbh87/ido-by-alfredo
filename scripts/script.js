/*jslint plusplus: true */
/* global $ */
/* global document */
/* global window */
/* global setTimeout */

/* My Scripts */

var scrollWatch = {
        myScroll: function (container) {
            var navOffset = parseInt($(container).css("top"), 10),
                elements = [
                    "#header",
                    "#names"
                ],
                i = 0,
                scroll = $(document).scrollTop(),
                footer = $("#footer"),
                elLength = elements.length;
            
            for (i = 0; i < elLength; i++) {
                if (scroll >= navOffset) {
                    $(elements[i]).removeClass("un-fixed").addClass("fixed");
                } else {
                    $(elements[i]).removeClass("fixed").addClass("un-fixed");
                }
            }
            
            if ($(window).scrollTop() + $(window).height() === scroll) {
                footer.addClass("fixed");
            } else {
                footer.removeClass("fixed");
            }
        }
    },
    showHide = {
        init: function (settings) {
            showHide.config = {
                background: $("#pop-bg"),
                videoId: "introVid"
            };

            // Allow overriding the default config
            $.extend(showHide.config, settings);
        },
        hide: function (container) {
            var background = showHide.config.background;

            if (container.hasClass('show')) {
                container.removeClass('show').addClass('hide');
                background.removeClass('show').addClass('hide');
                return true;
            } else {
                return false;
            }
        },
        show: function (container) {
            var background = showHide.config.background,
                myVideo = document.getElementById(showHide.config.videoId);
    
            if (container.hasClass('hide')) {
                if (myVideo) {
                    myVideo.pause();
                }
                container.removeClass('hide').addClass('show');
                background.removeClass('hide').addClass('show');
                return true;
            } else {
                return false;
            }
        }
    },
    pops = {
        init: function (settings) {
            pops.config = {
                container: $("#pop-container"),
                footer: $("#footer")
            };
            // Allow overriding the default config
            $.extend(pops.config, settings);
            pops.config.container.each(function () {
                $(this).addClass('hide');
            });
        },
        hidePop: function () {
            var container = pops.config.container,
                footer = pops.config.footer;

            if (showHide.hide(container)) {
                footer.removeClass("fixed");
            }
        }, 
        showPop: function () {
            var container = pops.config.container,
                footer = pops.config.footer;

            if (showHide.show(container)) {
                sidebar.hideSide();
                footer.addClass("fixed");
            }
        }
    },
    sidebar = {
        init: function (settings) {
            sidebar.config = {
                container: $("#sidebar")
            };
            // Allow overriding the default config
            $.extend(sidebar.config, settings);
            sidebar.config.container.each(function () {
                $(this).addClass('hide');
            });
        },
        showSide: function () {
            var container = sidebar.config.container;
            if (showHide.show(container)) {
                pops.hidePop();
            }
        },
        hideSide: function () {
            var container = sidebar.config.container;
            showHide.hide(container);
        }
    },
    menus = {
        noActive: function (dad) {
            if (dad.hasClass("active")) {
                dad.removeClass("active");
                dad.children("ul.sub-menu").removeClass("active").children("li.menu-item-has-children").each(function () {
                    menus.noActive($(this));
                });
            }
        },
        openMenu: function (link) {
            var sub = link.siblings("ul.sub-menu"),
                dad = link.parent("li");
            if (dad.hasClass("active")) {
                dad.removeClass("active");
                sub.removeClass("active");
                dad.addClass("un-active");
                sub.addClass("un-active");
            } else {
                dad.siblings("li.menu-item-has-children").each(function () {
                    menus.noActive($(this));
                });
                dad.removeClass("un-active");
                sub.removeClass("un-active");
                dad.addClass("active");
                sub.addClass("active");
            }
        },
        setClick: function () {
            $(".menu-item-has-children a").each(function () {
                var link = $(this);
                link.click(function () {
                    menus.openMenu(link);
                });
            });
        },
        clickMenu: function () {
            var stopElements = [
                    '.kamra-content a.alertButton',
                    '#header #nav-primary',
                    '#sidebar',
                    '#pop-container',
                    '#footer',
                    '#menu-button',
                    '#maps'
                ],
                i = 0,
                elLength = stopElements.length;
            menus.setClick();

            $("#header .menu-item-has-children a").each(function () {
                var link = $(this);
                link.parent(".menu-item-has-children").hoverIntent(
                    function () {
                        menus.openMenu(link);
                        $("#header .menu-item-has-children a").off('click');
                    },
                    function () {
                        menus.openMenu(link);
                        menus.setClick();
                    }
                );
            });
            $('html').click(function (event) {
                var targ = [];
                for ( i = 0; i < elLength; i++) {
                    if ($(event.target).is(stopElements[i]) || !$(event.target).parents(stopElements[i]).is(stopElements[i])) {
                        targ[i] = true;
                    }
                }
                
                if (targ.indexOf(true) === -1) {
                    $(".menu-item-has-children").each(function () {
                        menus.noActive($(this));
                    });
                    pops.hidePop();
                    sidebar.hideSide();
                }
            });
            
            
        }
    },
    collage = {
        init: function (settings) {
            collage.config = {
                infoClass: '.info',
                classIn: 'animateIn',
                classOut: 'animateOut',
                background: $("#pop-bg")
            };
            // Allow overriding the default config
            $.extend(collage.config, settings);
        },
        setHover: function (link) {
            var classIn = collage.config.classIn,
                classOut = collage.config.classOut;
            
            link.hover(
                function () {
                    link.removeClass(classOut).addClass(classIn);
                },
                function () {
                    link.removeClass(classIn).addClass(classOut);
                }
            );
        },
        start: function (element) {
            var el = $(element),
                infoClass = collage.config.infoClass,
                background = collage.config.background;
            
            el.each(function () {
                var link = $(this), 
                    info = link.siblings(infoClass);
                 
                info.addClass('hide');
                
                collage.setHover(link); 
                
                link.click(function () {
                    info.append('<a class="close-info">Cerrar</a>');
                    $('a.close-info').click(function () {
                        showHide.hide(info);   
                    });
                    background.click(function () {
                        showHide.hide(info);
                    });
                    pops.hidePop();
                    sidebar.hideSide();
                    showHide.show(info);
                });
            });
        }
    },
    accordion = {
        init: function (settings) {
            accordion.config = {
                dad: '.accordion',
                link: 'h4',
                bro: 'div',
                transition: 'height 0.3s ease-out',
                open: 'open',
                close: 'close',
                solo: true,
                startClose: true
            };
            $.extend(accordion.config, settings);
            accordion.setClick();
            accordion.setClass();
        },
        showHide: function (dad) {
            var bro = dad.children(accordion.config.bro);
            
            if (dad.hasClass(accordion.config.open)) {
                bro.cssAnimateAuto({
                  transition: accordion.config.transition,
                  action: accordion.config.close
                });
                dad.removeClass(accordion.config.open).addClass(accordion.config.close);
                return true;
                
            } else {
                bro.cssAnimateAuto({
                  transition: accordion.config.transition,
                  action: accordion.config.open
                });
                dad.removeClass(accordion.config.close).addClass(accordion.config.open);
                return true;
                
            }
            return false;
        },
        closeUncles: function (dad) {
            dad.siblings(accordion.config.dad).each(function () {
                if ($(this).hasClass(accordion.config.open)) {
                    accordion.showHide($(this));
                }
            });
        },
        setClass: function () {
            var accordions = $(accordion.config.dad);
            if (accordion.config.startClose) {
                accordions.each(function () {
                    $(this).addClass(accordion.config.close);
                });
            }  
        },
        setClick: function () {
            var link = accordion.config.dad + ' ' + accordion.config.link;
            
            $(link).each(function () {
                
                $(this).click(function () {
                    var dad = $(this).parent(accordion.config.dad);
                    if (accordion.showHide(dad)) {
                        if (accordion.config.solo) {
                            accordion.closeUncles(dad);
                        }
                    }
                });
            });
        }
    },
    misc = {
        goBack: function () {
            window.history.back();
        },
        playIntro: function (el) {
            var myVideo = document.getElementById(el);
            if (myVideo) {
                myVideo.play();
                myVideo.onended = function () {
                    $('.slider').slick('slickPlay');
                    var myTimer = setTimeout(function () {
                        $('.slider').slick('slickRemove', 0);
                    }, 5000);
                };
                myVideo.addEventListener("play", function () {
                    $('.slider').slick('slickPause');
                }, true);
                $('.slider').on('beforeChange', function () {
                    myVideo.pause();
                });
            }
        },
        stopPro: function (el) {
            $(el).click(function (event) {
                event.stopPropagation();
            });
        },
        onReady: function () {
            showHide.init();
            pops.init();
            sidebar.init();
            
            if ($('.slider')) {
                $('.slider').slick({
                    dots: true,
                    adaptiveHeight: true,
                    autoplay: true,
                    autoplaySpeed: 5000
                });
            }
            menus.clickMenu();
            scrollWatch.myScroll("#content-container");
            $(document).scroll(function () {
                scrollWatch.myScroll("#content-container");
            });
            $("a#maps").click(function () {
                pops.showPop();
            }); 
            $('a.back-to-top').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 700);
                return false;
            });
            collage.init();
            collage.start('div.tile a.tile');
            accordion.init();
        }
    };

$(document).ready(function () {
    misc.onReady();
});

