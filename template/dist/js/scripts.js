$(document).ready(function(){
    CKEDITOR.replace("textEditor");
    CKEDITOR.replace("thumb");

    
});

$(document).ready(function () {
    $(document).on('click', '#delProd', function (e) {
        $('#modal').modal();
        e.preventDefault();
        let id = $(this).attr("data-id");

        $('#prodDelete').on('click', function (e) {
            e.preventDefault();

            $.ajax({
                url: "/admin/product/delete/" + id,
                method: "POST",
                success: function () {
                    window.location.href="/admin/product";
                }
            });
            return false;
        });
    });

});

$(document).ready(function () {
    $(document).on('click', '#modCategory', function (e) {
        $('#modal').modal();
        e.preventDefault();
        let id = $(this).attr("data-id");

        $('#catDelete').on('click', function (e) {
            e.preventDefault();
            
            $.ajax({
                url: "/admin/category/delete/" + id,
                method: "POST",
                success: function () {
                    window.location.href="/admin/category";
                }
            });
            return false;
        });
    });

});

$(document).ready(function () {
    $(document).on('click', '#modArticle', function (e) {
        $('#modal').modal();
        e.preventDefault();
        let id = $(this).attr("data-id");

        $('#articleDelete').on('click', function (e) {
            e.preventDefault();
            
            $.ajax({
                url: "/admin/news/delete/" + id,
                method: "POST",
                success: function () {
                    window.location.href="/admin/news";
                }
            });
            return false;
        });
    });

});

$(document).ready(function () {
    $(document).on('click', '#modComment', function (e) {
        $('#modal').modal();
        e.preventDefault();
        let id = $(this).attr("data-id");

        $('#commDelete').on('click', function (e) {
            e.preventDefault();
            
            $.ajax({
                url: "/admin/comments/delete/" + id,
                method: "POST",
                success: function () {
                    window.location.href="/admin/comments";
                }
            });
            return false;
        });
    });

});

$(document).ready(function () {
    $(document).on('click', '#modOrder', function (e) {
        $('#modal').modal();
        e.preventDefault();
        let id = $(this).attr("data-id");

        $('#orderDelete').on('click', function (e) {
            e.preventDefault();
            
            $.ajax({
                url: "/admin/order/delete/" + id,
                method: "POST",
                success: function () {
                    window.location.href="/admin/order";
                }
            });
            return false;
        });
    });

});