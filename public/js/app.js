$("body").on("click", ".btn-show", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr("href"),
        title = me.attr("title");

    $("#modal-title").text(title);
    $("#modal-btn-save")
        .removeClass("hide")
        .text(me.hasClass("edit") ? "Save" : "Save");


    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            $("#modal-body").html(response);
        },
    });

    $("#modal").modal("show");
});





$("#modal-btn-save").click(function (event) {
    event.preventDefault();

    var form = $("#modal-body form"),
        url = form.attr("action"),
        method = $("input[name=_method]").val() == undefined ? "POST" : "POST";
    // method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';
    form.find(".help-block").remove();
    form.find(".form-group").removeClass("has-error");

    //untuk menangani inputan textarea dari ck editor
    // if(url.split('/')[3] == 'produk') {
    //     for ( instance in CKEDITOR.instances ) {
    //         CKEDITOR.instances[instance].updateElement();
    //     }
    // }
    y = $("form").serializeArray();

    $.ajax({
        url: url,
        method: method,
        data: new FormData(form[0]),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(url.split("/")[3]);
            if (url.split("/")[3] == "department") {
                $(".data2").DataTable().draw(false);
            } else {
                $(".data").DataTable().draw(false);
            }
            // $('.data-table').DataTable().ajax.reload();
            const Toast = Swal.mixin({
                toast: true,
                position: "center",
                showConfirmButton: false,
                timer: 1500,
                // timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                },
            });

            Toast.fire({
                icon: "success",
                title: "saved successfully",
            });

            response == "close-modal" ? $("#modal").modal("hide") : "";
            // $("#modal").modal("hide");

            if (url.split("/")[3] == "department") {
                $(".data2").DataTable().draw(false);

                $("[name=name_department]").val("").trigger("change");
            } else {
                $.each(y, function (i, field) {
                    $("[name=" + field.name + "]")
                        .val("")
                        .trigger("change");
                });
            }
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: value,
                    });
                    // $('#' + key)
                    //     .closest('.form-group')
                    //     .addClass('has-error')
                    //     .append('<span class= "help-block"><strong>' + value + '</strong</span>')
                });
            }
        },
    });
});

$("body").on("click", ".btn-delete", function (event) {
    event.preventDefault();
    var me = $(this),
        url = me.data("url");
    (title = me.attr("title2")),
        (csrf_token = $('meta[name="csrf-token"]').attr("content"));
    // console.log(url.split('/')[4]);
    console.log(url);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: { _method: "DELETE", _token: csrf_token },
                success: function (response) {
                    console.log(url.split("/")[3]);
                    if (url.split("/")[3] == "department") {
                        $(".data2").DataTable().draw(false);
                    } else {
                        $(".data").DataTable().draw(false);
                    }

                    //unutk penginputan calender
                    // if (url.split('/')[4] == 'hari_libur') {
                    //     $("#calendar").fullCalendar('removeEvents', url.split('/')[5]);
                    //     $('#modal').modal('hide');
                    // }

                    const Toast = Swal.mixin({
                        toast: true,
                        position: "center",
                        showConfirmButton: false,
                        timer: 1500,
                        // timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener(
                                "mouseenter",
                                Swal.stopTimer
                            );
                            toast.addEventListener(
                                "mouseleave",
                                Swal.resumeTimer
                            );
                        },
                    });

                    Toast.fire({
                        icon: "success",
                        title: "Deleted Success",
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                },
            });
        }
    });
});

$("body").on("click", ".btn-preview", function (event) {
    event.preventDefault();

    var me = $(this),
        url = me.data("url"),
        title = me.attr("title");

    console.log(title);
    $("#modal-title-preview").text(title);

    $.ajax({
        url: url,
        dataType: "html",
        success: function (response) {
            $("#modal-body-preview").html(response);
        },
    });

    $("#modal-preview").modal("show");
});
