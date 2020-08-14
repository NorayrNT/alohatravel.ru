"use strict";
$(document).ready(function() {    
    // CSRF token for ajax calls
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    

    // Initialize wow js
    new WOW().init();

    // Header
    $(".with_nested").on("mouseover mouseout",function() {
        $(this).children(".nested_ul").eq(0).toggleClass('menu_down');
    });

    $(window).scroll(function() {
        $(this).scrollTop() > '25' ?  $("#top_mobile").addClass('sticky_header animated fadeInDown') : $("#top_mobile").removeClass('sticky_header animated fadeInDown');
    });
    $(window).scroll(function() {
        $(this).scrollTop() > '100' ?  $("#top_nav").addClass('sticky_header animated fadeIn') : $("#top_nav").removeClass('sticky_header animated fadeIn');
    });

    // Index's page Tour block hover 
    $(".tour_block  a").mouseenter(function() {
        $(this).children(".tour_img").eq(0).children('img').css({
            transform: 'scale(1.1)',
            transition: '.8s'
        });
        $(this).children(".tour_overlay").css({opacity:'.4'});
        $(this).children(".tour_text").children('p').eq(0).css({'background-color':'#00d800'});
    });
    $(".tour_block a").mouseleave(function() {
        $(this).children(".tour_img").eq(0).children('img').css({
            transform: 'scale(1)',
            transition: '.8s'
        });
        $(this).children(".tour_overlay").css({opacity:'.7'});
        $(this).children(".tour_text").children('p').eq(0).css({'background-color':'#ff5200'});
    });

    // Incoming tours' page
    $(".bordered").mouseenter(function() {
        $(this).find(".incoming_tour_img,.in_second_img").toggleClass('d-none');
        $(this).find(".inc_tour_name h5").css({color: '#ff5200'});            
    });
    $(".bordered").mouseleave(function() {
        $(this).find(".incoming_tour_img,.in_second_img").toggleClass('d-none');
        $(this).find(".inc_tour_name h5").css({color: "#007DC4"});
            
    });

    // Extreme tours' page
    $(".ex_item").on('mouseenter mouseleave',function() {
        $(this).children('.ex_overlay').eq(0).toggleClass('d-none');
    });
    
    // Sliders  
    $(".cnt_list").owlCarousel({
        items: 4,
        loop: true,
        urlHashListener: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        responsive: {
            768: {
                items: 3,
            }
        }
    });  
    $(".day_images").owlCarousel({
        loop: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 3,
            }
        }  
    });
    $(".out_overview_images").owlCarousel({
        dots: false,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            768: {
                items: 3,
            }
        }
    });

    // Get Car's pictures
    $(".car_img_block").click(function() {
        $('body').toggleClass('noscroll');
        let main_id = $(this).attr('data-main-id');
        let img_block = $(".car_images");
        if(img_block.attr('data-id') === main_id) {
            $(".car_overlay").css({display:'block'});
            return;
        }

        $.ajax({
            url: "/services/cars/get-images",
            method: 'POST',
            data: {
                main_id: main_id
            },
            success: function(result) {
                if(result.images.length > 0) {
                    img_block.empty();
                    img_block.attr('data-id',main_id);
                    for(let i = 0; i < result.images.length; i++) {
                        let item = $(`<div class='item wow fadeIn animated '><img src=/${result.images[i]}  class='img-fluid' alt='car img' /></div>`);
                        img_block.append(item);
                    }
                    $(".car_images").owlCarousel('destroy');
                    $(".car_images").owlCarousel({
                        responsive: {
                            0: {
                                items: 1,
                                dots: false,
                                loop: true,
                                nav: true,
                                center: true,
                            }
                        }
                    });
                    $(".car_overlay").show();
                }
            },
            fail: function(err) {
                //
            } 
        });
        
    });

    // Car image slider close button
    $(".car_overlay > i").click(() => {
        $('body').toggleClass('noscroll');
        $(".car_overlay").hide();
    });

    // Get Apartment images
    $(".ap_img_block").click(function() {
        $('body').toggleClass('noscroll');
        let id = $(this).attr('data-id');
        let img_block = $(".ap_images");
        if(img_block.attr('data-id') === id) {
            $(".ap_overlay").css({display:'block'});
            return;
        }

        $.ajax({
            url: "/services/apartments/get-images",
            method: 'POST',
            data: {
                id: id
            },
            success: function(result) {
                if(result.images.length > 0) {
                    img_block.empty();
                    img_block.attr('data-id',id);
                    for(let i = 0; i < result.images.length; i++) {
                        let item = $(`<div class='item wow fadeIn animated '><img src=/${result.images[i]}  class='img-fluid' alt='car img' /></div>`);
                        img_block.append(item);
                    }
                    $(".ap_images").owlCarousel('destroy');
                    $(".ap_images").owlCarousel({
                        responsive: {
                            0: {
                                items: 1,
                                dots: false,
                                loop: true,
                                nav: true,
                                center: true,
                            }
                        }
                    });
                    $(".ap_overlay").show();
                }
            },
            fail: function(err) {
                //
            } 
        });
        
    });

    // Car image slider close button
    $(".ap_overlay > i").click(() => {
        $('body').toggleClass('noscroll');
        $(".ap_overlay").hide();
    });

    // Individual tours slider
    $(".tbl_items > td:first-child").click(function() {
        $('body').toggleClass('noscroll');
        let id = $(this).closest('tr').attr('data-id');
        let desc_block = $(".ind_modal_desc");
        let img_block = $(".ind_images");
        if(img_block.attr('data-id') === id) {
            $(".ind_overlay").css({display:'block'});
            return;
        }

        $.ajax({
            url: "/services/individual/get-images",
            method: 'POST',
            data: {
                id: id
            },
            success: function(result) {
                if(result.length > 0) {
                    img_block.empty();
                    desc_block.empty();
                    img_block.attr('data-id',id);
                    for(let i = 0; i < result[1].images.length; i++) {
                        let item = $(`<div class='item wow fadeIn animated '><img src=/${result[1].images[i]}  class='img-fluid' alt='private-tour_img' /></div>`);
                        img_block.append(item);
                    }
                    desc_block.html(result[0].desc);
                    $(".ind_images").owlCarousel('destroy');
                    $(".ind_images").owlCarousel({
                        responsive: {
                            0: {
                                items: 1,
                                dots: false,
                                loop: true,
                                nav: true,
                                center: true,
                            }
                        }
                    });
                    $(".ind_overlay").show();
                }
            },
            fail: function(err) {
                //
            } 
        });
    });

    // Individual image slider close button
    $(".ind_overlay > i").click(() => {
        $('body').toggleClass('noscroll');
        $(".ind_overlay").hide();
    });

    // range slider
    (function() {        
        $("#filter").slider({
            range: true,
            min: 10,
            max: 1000,
            values: [30,350],
            slide: function(event, ui) {
                $(".range_first_price").attr('value',ui.values[0]);
                $(".range_second_price").attr('value',ui.values[1]);
                $(".range_first_price").html(ui.values[0]);
                $(".range_second_price").html(ui.values[1]);
            }
        });
        $(".range_first_price").attr('value',$("#filter").slider( "values", 0 ));
        $(".range_second_price").attr('value',$("#filter").slider( "values", 1 ));
        $(".range_first_price").html($("#filter").slider( "values", 0 ));
        $(".range_second_price").html($("#filter").slider( "values", 1 ));
    })();

    // Bootstrap tooltips everywhere
    (function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    // Apartment filter select change
    $(".ap_filters > li > select").change(function() {
        $(this).val() !== '' ? $(this).addClass('sel_border') : $(this).removeClass('sel_border');
    });

    // Apartment form submit
    $(".ap_src").click(function() {
        $(".apartment_submit_btn").click();
    });

    // Register,reset-password and login  pages
    $("#img_up > i").click(function() {
        $('.user_img_upload').trigger('click');
    });

    $(".regForm, .loginForm, .resetForm").click(function() {
        let id = $(this).attr('class');
        $(this).closest('form').eq(0).toggleClass('d-none');
        $(`#${id}`).toggleClass('d-none');
    });

    // Armenia 
    $(".arm_list > ul > li > span, .arm_list > ul > li > i ").click(function() {
        $(this).siblings('p').slideToggle();
    });

    // Mobile Menu
    $(".with_ul").click(function() {
        $(this).find('.m_nested_menu').eq(0).slideToggle();
    });

    $(".menu_icon").click(function() {
        $("#m_menu").css({
            display: 'block',
        });
        $("#m_menu").addClass('opened');
    });
    
    $("#m_menu > .zmdi-close").click( () => $("#m_menu").slideToggle());
    
    // Set and remove container-fluid class
    function addRemoveClasses(width) {
        if(width > '576' && width < '768') {
            let elems = [$(".toggle_width"),$(".out_ind"),$(".out_tours_row"),$("#loginBlock"),$("#apartment_rental > .container"),$("#incoming_tour > .container")];
            for(let i = 0; i < elems.length; i++) {
                elems[i].removeClass("container");
                elems[i].addClass("container-fluid");
            }
        }else {
            let elems = [$(".toggle_width"),$(".out_ind"),$(".out_tours_row"),$("#loginBlock"),$("#apartment_rental > .container-fluid"),$("#incoming_tour > .container-fluid")];
            for(let i = 0; i < elems.length; i++) {
                elems[i].removeClass("container-fluid");
                elems[i].addClass("container");
            }
        }
    }    

    (function() {
        let width = document.body.clientWidth;
        addRemoveClasses(width);
    })();

    $(window).resize(function() {
        let width = document.body.clientWidth;
        addRemoveClasses(width);
    });

    // Account page
    $(".userImg > i").click(() => {
        $(".accAvatar").trigger('click');
    });

    $('.acc_tabs > li').click(function() {
        if($(this).hasClass('dontDoIt')) {
            return;
        }else { 
            let id = $(this).attr('data-id');
            $(".dataCol > div").css({
                display: 'none',
            });
            $(`.${id}`).css({
                display: 'block',
            });
        }
    });

    $(".acc_tabs > li").click(function() {
        if($(this).hasClass('active_tab')) {
            return; 
        }else {
            $(".active_tab").removeClass('active_tab');
            $(this).addClass('active_tab');
        }        
    });

    // Change Language and Currency
    $(".drop_language > li,.drop_currency > li").click(function() {
        let type= $(this).closest('ul').eq(0).attr('data-type');
        let val = $(this).attr('data-value');
        changeLang(type,val);
    });
    $(".m_language,.m_currency").change(function() {
        let type= $(this).attr('data-type');
        let val= $(this).val();
        changeLang(type,val);
    });

    function changeLang(type,val) {
        $.ajax({
            url: "/change-lang",
            method: 'post',
            data: {
                type: type,
                val: val
            },
            success: (result) => {
                result === type ? location.reload() : '';
            },
            fail: function(err) {
                alert('something went wrong');
            }
        });
    }

    // Modals (Contacts)
    $("#contacts_modal > i").click(function() {
        $("#contacts_modal").css({display:'none'});
        $('body').toggleClass('noscroll');
    })

    $(".all_phones > i, .m_phone,.car_book_btn > button,.ap_book_btn,.trans_book_btn,.top_mail > i,.more_30").click(function() {
        $("#contacts_modal").css({display: 'block'});
        $('body').toggleClass('noscroll');
    })

    // Contacts page,remove fa-lg class
    $(".contact_icons > a > i").removeClass('fa-lg');

    // Extreme tours
    let ex_p = $(".ex_overlay > p");
    ex_p.map(function(key,val) {
        if(!val.innerHTML) {
            ex_p[key].remove();
        }
    });

    // Subscribe
    $(".acc_subscribe").click(function() {
        $.ajax({
            url: '/subscribe',
            method: 'post',
            data: {},
            success: function(result) {
                if(result === 'true') {}
            },
            fail: function(err) {}
        });
    });


    $(".subscribe > i").click(function() {
        let email = $(this).siblings("input[type='email']").val();    
        if(email == '') return;
        $.ajax({
            url: '/subscribe',
            method: 'post',
            data: {
                email: email
            },
            success: function(result) {
                if(result === 'true') {
                    $(".subscribe > div").html('successfuly subscribed');
                }else if(result === 'has') {
                    $(".subscribe > div").html("you are already subscribed !");    
                }
                $(".subscribe > input").val('');
                $(".subscribe > i").fadeOut();
            },
            fail: function(err) {
                $(".subscribe > span").html('something went wrong. Try again later.');
            }
        });
    });

    $(".subscribe > input").keyup(function() {
        $(this).val() !== '' ? $(".subscribe > i").fadeIn() : $(".subscribe > i").fadeOut();
    });


    // Under input text display
    $("#inner_form input[name='password']").on("focus blur",function() {
        $(".under_pass").toggleClass('show_text');
    });

    // Contacts page's country change and  map function
    (function() {
        $(".contact_right > iframe").addClass('contact_map');
    })();

    $(".contact_cnts > ul > li").click(function() {
        let country = $(this).html();
        if($(this).hasClass('active_cnt')) {
            return;
        }else {
            $(".active_cnt").removeClass('active_cnt');
            $(this).addClass('active_cnt');
            $.ajax({
                url: '/change-contacts',
                method: 'post',
                data: {
                    country: country
                },
                success: function(result) {
                    if(result) {
                        let phone = result['phone'].split(",");
                        if(phone.length > 0) {
                            let link = $(".phone_email > p > a");
                            link.attr('href',"tel:" + phone[0]);
                            link.html(phone[0]);
                        }
                        let map = result['map'];
                        if(map !== ''){
                            let right_part = $(".contact_right");
                            right_part.empty();
                            right_part.append(map);
                            $(".contact_right > iframe").addClass('contact_map');
                        }
                    }
                },
                fail: function(err) {
                    //
                }
            });        
        }
    });
    
});//end of jquery

// var userFeed = new Instafeed({
//     get: 'user',
//     userId: '00b6a16bde714bcb9db70a30b96b6c1c',
//     limit: 12,
//     resolution: 'standard resolution',
//     accessToken: '21873089318.1677ed0.21a3873f751c406c956090c34cd14fbc',
//     sortBy: 'most-recent'
// });
// userFeed.run();