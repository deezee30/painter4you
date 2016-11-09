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

    //Handles the carousel thumbnails
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

    // When the carousel slides, auto update the text
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
            // The bigger the distance to affix, the higher the value
            top: 600
        }
    });

    /* ****************************
     * Sidebar Smooth Scrolling
     * ****************************/

    $("#sidebar").find("a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 500, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        }
    });
});

function launchGallery() {

    var bCheckEnabled = true;
    var bFinishCheck = false;

    var img;
    var imgArray = [];
    var i = 0;

    var myInterval = setInterval(loadImage, 1);

    function loadImage() {

        if (bFinishCheck) {
            clearInterval(myInterval);
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
            return;
        }

        if (bCheckEnabled) {

            bCheckEnabled = false;

            img = new Image();
            img.onload = fExists;
            img.onerror = fDoesntExist;
            img.src = '../img/3/' + (i + 1) + '.jpg';
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