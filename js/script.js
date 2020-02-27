$(document).ready(function() {
    if ($(window).height() < 600) {
        $('#popUpcontainer #signInUpContainer form label').hide();
    }
    $('.loginButton').on('click', function(event) {
        event.preventDefault();
        $('#popUpcontainer').fadeIn();
        $('#mobileMenu').removeClass('showMobileMenu');
    });
    $('#popUpcontainer').on('click', function(event) {
        if (event.target == this || event.target == $('#closeLogin')[0]) {
            $(this).fadeOut();
        }
    });
    $(document).on('keyup', function(event) {
        if (event.which == 27) {
            $('#popUpcontainer').fadeOut();
        }
    });
    $('#iconMenu').on('click', function() {
        $('#mobileMenu').addClass('showMobileMenu');
    });
    $('#hideMobileMenu').on('click', function() {
        $(this).parent().removeClass('showMobileMenu');
    });
    $('#signInUpContainer').on('click', function(event) {
        if (event.target == $('#choseLogIn')[0]) {
            $('#login').css('display', 'block');
            $('#signup').css('display', 'none');
            $('#choseLogIn').css({
                background: 'white',
                color: '#333'
            }).siblings().css({
                background: '#333',
                color: 'white'
            });
        } else if (event.target == $('#choseSignUp')[0]) {
            $('#login').css('display', 'none');
            $('#signup').css('display', 'block');
            $('#choseSignUp').css({
                background: 'white',
                color: '#333'
            }).siblings().css({
                background: '#333',
                color: 'white'
            });
        } else if (event.target == $('#recoverLink')[0]) {
            event.preventDefault();
            $('#login').css('display', 'none');
            $('#signup').css('display', 'none');
            $('#logInOrUp').css('display', 'none');
            $('#recover').css('display', 'block');
            $('#recoverTitle').css('display', 'block');
        }
    });
    $('.content').richText();
    $('#finput').change(function() {
        var fd = new FormData();
        fd.append('featuredImg', $(this)[0]['files'][0]);
        $.ajax({
            type: 'POST',
            url: '../includs/featuredImg.inc.php',
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#featuredImg > span').css('display', 'none');
                $('#imgspiner').css('display', 'block');
            },
            success: function(data) {
                $('#featuredImg').css('background-image', 'url(' + "../" + data + ')');
            },
            complete: function() {
                $('#imgspiner').css('display', 'none');
            }
        });
    });
    $('#featuredImg').height($('#featuredImg').width());
    $(window).resize(function() {
        $('#featuredImg').height($('#featuredImg').width());
        if ($(window).height() < 600) {
            $('#popUpcontainer #signInUpContainer form label').hide();
        } else {
            $('#popUpcontainer #signInUpContainer form label').show();
        }
    });
    $('#editProfile').on('click', function(event) {
        event.preventDefault();
        $('#profileInfo').find('input').each(function(i, item) {
            $(this).removeAttr('readonly');
            $('#editProfile').attr('hidden', 'true');
            $('#saveProfile').fadeIn();
            $(item).addClass('update');
            return i < 3;
        });
        $('#profileInfo').find('section').css({
            background: '#fff',
            margin: '0',
            padding: 0
        });
    });
    $('#H1updatePass').on('click', function() {
        $('#updatePass').css('display', 'block');
    });
    $('#publish').on('click', function() {
        $('#error').remove();
        $('#succeed').remove();
        var fn = new FormData();
        fn.append('featuredImg', $('#finput')[0].files[0]);
        fn.append('postTitle', $('#postTitle').val());
        fn.append('article', $('#postContent').val());
        fn.append('categorie', $('#postCategorie').val());
        fn.append('publish', $('#publish').val());
        if ($('#postTitle').val() !== "") {
            if ($('.richText-editor').text() !== "") {
                if ($('.richText-editor').text().match(/\w+/g).length > 70) {
                    $.ajax({
                        type: 'POST',
                        url: '../includs/signupAction.inc.php',
                        data: fn,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $('#spin').show().siblings().hide();
                        },
                        success: function(data) {
                            $('nav').after(data);
                        },
                        complete: function() {
                            $('#postTitle').val("");
                            $('#postCategorie').val("");
                            $('.richText-editor').html("");
                            $('#finput').val('');
                            $('#featuredImg').css('background-image', '');
                            $('#featuredImg > span').css('display', 'block');
                            $('#pub').show().siblings().hide();
                        }
                    });
                } else {
                    $('nav').after('<section class="container" id="error"><p>The text field is required at least 70 word!</p></section>');
                }
            } else {
                $('nav').after('<section class="container" id="error"><p>The text field is required!</p></section>');
            }
        } else {
            $('nav').after('<section class="container" id="error"><p>The title input field is required!</p></section>');
        }
    });
    $('#profileImage').change(function() {
        $('#error').remove();
        $('#succeed').remove();
        var allowedExt = ['jpg', 'jpeg'];
        var ext = $('#profileImage').val().split(".").pop();
        var fn = new FormData();
        fn.append('profileImage', $('#profileImage')[0].files[0]);
        if ($.inArray(ext, allowedExt) == -1) {
            $('nav').after('<section class="container" id="error"><p>Only [jpg-jpeg] files are accepted!</p></section>');
        } else {
            $.ajax({
                type: 'POST',
                url: '../includs/profileImage.inc.php',
                data: fn,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#profileSpin').css("display", "grid");
                },
                success: function(data) {
                    $('#profilePicture').css("background-image", "url(" + "../" + data + ")");
                },
                complete: function() {
                    $('#profileSpin').css("display", "none");
                }
            });
        }
    });
});