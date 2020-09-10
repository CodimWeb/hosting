$(document).ready(function () {
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
        if (this.href === path) {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    var cntBtnPlus = 1;
    $('.btn-add-plus').on('click', function () {
        console.log('plus')
        ++cntBtnPlus;
        $('.plus-container').append(''+
            '<div class="form-group">'+
            '<input name="hosting-plus[]" type="text" class="form-control" placeholder="Плюс">' +
            '</div>')
    })

    var cntBtnMinus = 1;
    $('.btn-add-minus').on('click', function () {
        console.log('minus')
        ++cntBtnMinus;
        $('.minus-container').append(''+
            '<div class="form-group">'+
            '<input name="hosting-minus[]" type="text" class="form-control" placeholder="Минус">' +
            '</div>')
    })

    $('.add-infoblock').on('click', function () {
        $('.infoblocks').append(''+
            '<div class="infoblock mb-4">'+
                '<label>Заголовок</label>'+
                '<input type="text" name="title[]" class="form-control mb-4 mt-1">'+
                '<textarea id="summernote" class="summernote" name="mediadata[]"></textarea>'+
            '</div>'
        )

        $('.summernote').summernote({
            height: 240
        });
    })

    $('.btn-add-comment').on('click', function (e) {
        var id = $(this).attr('data-id');
        var result = confirm('Опубликовать коментарий?')
        if(result) {
            window.location.href = window.location.href + '/add/' + id;
        }
    })

    $('.btn-delete-comment').on('click', function (e) {
        var id = $(this).attr('data-id');
        var result = confirm('Удалить коментарий?')
        if(result) {
            window.location.href = window.location.href + '/delete/' + id;
        }
    })

    $('.btn-delete-article').on('click', function () {
        var id = $(this).attr('data-id');
        var result = confirm('Удалить статью?')
        if(result) {
            window.location.href = window.location.href + '/delete/' + id;
        }
    })
    $('.btn-delete-hosting').on('click', function () {
        var id = $(this).attr('data-id');
        var result = confirm('Удалить хостинг?')
        if(result) {
            window.location.href = window.location.href + '/delete/' + id;
        }
    })
});
