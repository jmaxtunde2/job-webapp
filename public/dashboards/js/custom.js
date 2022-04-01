$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

function submitAjax(btn,btnval,  datas, url, redir, msg) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    btn.addClass('is-loading');
    btn.html('Processing');
    //
    $.ajax({
        url: url,
        type: "POST",
        data: datas,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            if(data.success){
                toastr.options.positionClass = 'toast-top-right';
                toastr.success(data.message, 'Success !');
                btn.removeClass('is-loading');
                btn.html(btnval);
                setTimeout(
                    function () {
                        if (redir !='') { location.href = redir; }
                        else { location.reload()}
                    }, 3000);
            }else{
                toastr.options.positionClass = 'toast-top-right';
                toastr.error(data.message, 'Error !');
                btn.removeClass('is-loading');
                btn.html(btnval);
            }
        },
        error : function(data){
            var response = JSON.parse(data.responseText);
            //
            printErrorMsg(response.errors);
            //
            toastr.options.positionClass = 'toast-bottom-right';
            toastr.error(response.message, 'Error !');
            btn.removeClass('is-loading').html(btnval);
        }
    });
}


//login js
$("#loginAction").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#loginBtn"), "Login", datas, '/login/doLogin', "", $("#msg"));
}));

function printErrorMsg (errors) {
    $.each(errors, function (key, val) {
        if(key in errors){
            console.log(key+" found")
            $("#" + key).addClass('is-invalid')
            $("#err_" + key).text(val[0]);
        }

    });
}



$(document).off('click', '.confirmation').on('click', '.confirmation', function () {
    return confirm('Voulez-vous Vraiment effectuer cette action ?');
});

function getNotifications(url) {
    var lastResponse = ''
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    setInterval(function() {
        $.ajax({
            url: url,
            type: 'POST',
            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',
            success: function(response) {

                if (response.read && response.read < 1) {
                    $('<audio id="chatAudio"><source src="/songs/noti.mp3" type="audio/ogg"><source src="/songs/noti.mp3" type="audio/mpeg"><source src="/songs/noti.mp3" type="audio/wav"></audio>').appendTo('body');
                    $('#chatAudio')[0].play();
                    //
                    toastr.options.positionClass = 'toast-top-right';
                    toastr.options.closeButton = true;
                    toastr.options.newestOnTop = true;
                    toastr.options.progressBar = true;
                    toastr.options.preventDuplicates = true;
                    toastr.options.showDuration = '700';
                    toastr.options.timeOut = '7000';

                    toastr.info("<a href='"+response.link+"'>"+response.msg+"</a>", '<b>Notification !!</b>');
                }
                lastResponse = response.msg;
            }
        });
    }, 10000);

}


// Update Profile
$("#editUserSetting").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-editUserSettting"), "Update Profile", datas, '/post/profile_settings', "", $("#msg"));
}));

// Update Password
$("#editUserPassword").on('submit',(function(e) {
    e.preventDefault();    //
    var datas = new FormData(this);
    submitAjax($("#btn-editUserPassword"), "Update Password", datas, '/post/change_password', "", $("#msg"));
}));

$('#blogCarousel').carousel({
    interval: 5000
});

// Add User
$("#registerAction").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-registerBtn"), " Compte Ajouté", datas, '/post/inscription', '/login', $("#msg"));
}));

$("#registercandidatAction").on('submit',(function(e) {
    e.preventDefault();
    //
    var datas = new FormData(this);
    submitAjax($("#btn-registercandidatBtn"), " Compte Ajouté", datas, '/post/inscription-candidat', '/login', $("#msg"));
}));