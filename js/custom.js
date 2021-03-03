/*
 * When page finishes loading
 */
jQuery(document).ready(function($) {

    /* ****************************
     * Gallery 1 (Main Carousel)
     * ****************************/

    $('.carousel').carousel({
        interval: 6000
    });

    /* ****************************
     * Gallery 2 (Second Carousel)
     * ****************************/

    $('#gallery2').carousel({
        interval: 5000
    });

    // handle the carousel thumbnails
    $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#gallery2').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });

    // auto update the text when carousel slides
    $('#gallery2').on('slid.bs.carousel', function (e) {
        var id = $('.item.active').data('slide-number');
        $('#carousel-text').html($('#slide-content-'+id).html());
    });

    /* ****************************
     * Sidebar Scrollspy
     * ****************************/

    $(document.body).scrollspy({
        target: '#leftCol',
        offset: $('.navbar').outerHeight(true) + 10
    });

    /* ****************************
     * Sidebar Affix
     * ****************************/
    $('#sidebar').affix({
        offset: {
            // the bigger the distance to affix, the higher the value
            top: 600
        }
    });

    /* ****************************
     * Sidebar Smooth Scrolling
     * ****************************/

    $("#sidebar").find("a").on('click', function(event) {
        // make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // prevent default anchor click behavior
            event.preventDefault();

            // store hash
            var hash = this.hash;

            // using jQuery's animate() method to add smooth page scroll
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 500, function(){

                // add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        }
    });

    /* ****************************
     * Back To Top
     * ****************************/

    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
        // duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        // grab the "back to top" link
        $back_to_top = $('.cd-top');

    // hide or show the "back to top" link
    $(window).scroll(function() {
        ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible');
    });

    // smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
                scrollTop: 0
            }, scroll_top_duration
        );
    });
	
	// set up gallery
	setupGallery();
});

var bFinishCheck = false;
var interval;
var imgArray = [];
var i = 0;

function launchGallery() {
	// only load gallery if images are loaded
	if (bFinishCheck) {
		clearInterval(interval);
		if (i > 0) {
			var imgUrlArray = [i];
			for (var count = 0; count < imgArray.length; ++count) {
				imgUrlArray[count] = imgArray[count].src;
			}

			blueimp.Gallery(imgUrlArray, {
				clearSlides: false,
				preloadRange: 1
			});
		}
	}
}

function setupGallery() {

    var bCheckEnabled = true;
    var img;

    interval = setInterval(loadImage, 1);

    function loadImage() {

        if (bCheckEnabled) {

            bCheckEnabled = false;

            img = new Image();
            img.onload = fExists;
            img.onerror = fDoesntExist;
            img.src = '../img/3/' + (i+1) + '.jpg';
        }
    }

    function fExists() {
        imgArray.push(img);
        i++;
        bCheckEnabled = true;
    }

    function fDoesntExist() {
        bFinishCheck = true;
    }
}