const basicButton = document.getElementById("sweetalert-basic"),
    titleButton = document.getElementById("sweetalert-title"),
    longcontentButton = document.getElementById("sweetalert-longcontent"),
    confirmButton = document.getElementById("sweetalert-confirm-button"),
    paramsButton = document.getElementById("sweetalert-params"),
    imageButton = document.getElementById("sweetalert-image"),
    closeButton = document.getElementById("sweetalert-close"),
    positionTopStart = document.querySelector("#position-top-start"),
    positionTopEnd = document.querySelector("#position-top-end"),
    positionBottomStart = document.querySelector("#position-bottom-start"),
    positionBottomEnd = document.querySelector("#position-bottom-end"),
    infoButton = document.getElementById("sweetalert-info"),
    warningButton = document.getElementById("sweetalert-warning"),
    errorButton = document.getElementById("sweetalert-error"),
    successButton = document.getElementById("sweetalert-success"),
    questionButton = document.getElementById("sweetalert-question");
infoButton.addEventListener("click", (t) => {
    Swal.fire({
        text: "Here's an example of an info SweetAlert!",
        icon: "info",
        buttonsStyling: !1,
        confirmButtonText: "Ok, got it!",
        customClass: { confirmButton: "btn btn-info" },
    });
}),
    warningButton.addEventListener("click", (t) => {
        Swal.fire({
            title: "Bạn có muốn xóa không?",
            text: "Bạn sẽ không thể khôi phục lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Hủy bỏ",
            confirmButtonText: "Ok",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Đã xóa!",
                    text: "Bạn đã xóa thành công.",
                    icon: "success",
                });
            }
        });
    }),
    errorButton.addEventListener("click", (t) => {
        Swal.fire({
            text: "Here's an example of an error SweetAlert!",
            icon: "error",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: { confirmButton: "btn btn-danger" },
        });
    }),
    successButton.addEventListener("click", (t) => {
        Swal.fire({
            text: "Here's an example of a success SweetAlert!",
            icon: "success",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: { confirmButton: "btn btn-success" },
        });
    }),
    questionButton.addEventListener("click", (t) => {
        Swal.fire({
            text: "Here's an example of a question SweetAlert!",
            icon: "question",
            buttonsStyling: !1,
            confirmButtonText: "Ok, got it!",
            customClass: { confirmButton: "btn btn-primary" },
        });
    }),
    positionTopStart &&
        (positionTopStart.onclick = function () {
            Swal.fire({
                position: "top-start",
                icon: "success",
                text: "Your work has been saved",
                showConfirmButton: !1,
                timer: 1500,
                customClass: { confirmButton: "btn btn-primary" },
                buttonsStyling: !1,
            });
        }),
    positionTopEnd &&
        (positionTopEnd.onclick = function () {
            Swal.fire({
                position: "top-end",
                icon: "success",
                text: "Your work has been saved",
                showConfirmButton: !1,
                timer: 1500,
                customClass: { confirmButton: "btn btn-primary" },
                buttonsStyling: !1,
            });
        }),
    positionBottomStart &&
        (positionBottomStart.onclick = function () {
            Swal.fire({
                position: "bottom-start",
                icon: "success",
                text: "Your work has been saved",
                showConfirmButton: !1,
                timer: 1500,
                customClass: { confirmButton: "btn btn-primary" },
                buttonsStyling: !1,
            });
        }),
    positionBottomEnd &&
        (positionBottomEnd.onclick = function () {
            Swal.fire({
                position: "bottom-end",
                icon: "success",
                text: "Your work has been saved",
                showConfirmButton: !1,
                timer: 1500,
                customClass: { confirmButton: "btn btn-primary" },
                buttonsStyling: !1,
            });
        }),
    basicButton.addEventListener("click", (t) => {
        Swal.fire({
            title: "Any fool can use a computer",
            customClass: { confirmButton: "btn btn-primary mt-2" },
            buttonsStyling: !1,
        });
    }),
    titleButton.addEventListener("click", function () {
        Swal.fire({
            title: "The Internet?",
            text: "That thing is still around?",
            icon: "question",
            customClass: { confirmButton: "btn btn-primary mt-2" },
            buttonsStyling: !1,
            showCloseButton: !0,
        });
    }),
    successButton.addEventListener("click", function () {
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success",
            showCancelButton: !0,
            customClass: {
                confirmButton: "btn btn-primary me-2 mt-2",
                cancelButton: "btn btn-danger mt-2",
            },
            buttonsStyling: !1,
            showCloseButton: !0,
        });
    }),
    errorButton.addEventListener("click", function () {
        Swal.fire({
            title: "Oops...",
            text: "Something went wrong!",
            icon: "error",
            customClass: { confirmButton: "btn btn-primary mt-2" },
            buttonsStyling: !1,
            footer: '<a href="#!">Why do I have this issue?</a>',
            showCloseButton: !0,
        });
    }),
    longcontentButton.addEventListener("click", function () {
        Swal.fire({
            imageUrl: "https://placeholder.pics/svg/300x1500",
            imageHeight: 1500,
            imageAlt: "A tall image",
            customClass: { confirmButton: "btn btn-primary mt-2" },
            buttonsStyling: !1,
            showCloseButton: !0,
        });
    }),
    confirmButton.addEventListener("click", function () {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            customClass: {
                confirmButton: "btn btn-primary me-2 mt-2",
                cancelButton: "btn btn-danger mt-2",
            },
            confirmButtonText: "Yes, delete it!",
            buttonsStyling: !1,
            showCloseButton: !0,
        }).then(function (t) {
            t.value &&
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success",
                    customClass: { confirmButton: "btn btn-primary mt-2" },
                    buttonsStyling: !1,
                });
        });
    }),
    paramsButton.addEventListener("click", function () {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            customClass: {
                confirmButton: "btn btn-primary me-2 mt-2",
                cancelButton: "btn btn-danger mt-2",
            },
            buttonsStyling: !1,
            showCloseButton: !0,
        }).then(function (t) {
            t.value
                ? Swal.fire({
                      title: "Deleted!",
                      text: "Your file has been deleted.",
                      icon: "success",
                      customClass: { confirmButton: "btn btn-primary mt-2" },
                      buttonsStyling: !1,
                  })
                : t.dismiss === Swal.DismissReason.cancel &&
                  Swal.fire({
                      title: "Cancelled",
                      text: "Your imaginary file is safe :)",
                      icon: "error",
                      customClass: { confirmButton: "btn btn-primary mt-2" },
                      buttonsStyling: !1,
                  });
        });
    }),
    imageButton.addEventListener("click", function () {
        Swal.fire({
            title: "Sweet!",
            text: "Modal with a custom image.",
            imageUrl: "assets/images/logo-sm.png",
            imageHeight: 40,
            customClass: { confirmButton: "btn btn-primary mt-2" },
            buttonsStyling: !1,
            showCloseButton: !0,
        });
    }),
    closeButton.addEventListener("click", function () {
        var t;
        Swal.fire({
            title: "Auto close alert!",
            html: "I will close in <strong></strong> seconds.",
            timer: 2e3,
            timerProgressBar: !0,
            showCloseButton: !0,
            didOpen: function () {
                Swal.showLoading(),
                    (t = setInterval(function () {
                        var t = Swal.getHtmlContainer();
                        t &&
                            (t = t.querySelector("b")) &&
                            (t.textContent = Swal.getTimerLeft());
                    }, 100));
            },
            onClose: function () {
                clearInterval(t);
            },
        }).then(function (t) {
            t.dismiss === Swal.DismissReason.timer &&
                console.log("I was closed by the timer");
        });
    }),
    document
        .getElementById("custom-html-alert")
        .addEventListener("click", function () {
            Swal.fire({
                title: "<i>HTML</i> <u>example</u>",
                icon: "info",
                html: 'You can use <b>bold text</b>, <a href="#">links</a> and other HTML tags',
                showCloseButton: !0,
                showCancelButton: !0,
                customClass: {
                    confirmButton: "btn btn-success me-2",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: !1,
                confirmButtonText:
                    '<i class="ti ti-thumb-up-filled me-1"></i> Great!',
                cancelButtonText: '<i class="ti ti-thumb-down-filled"></i>',
            });
        }),
    document
        .getElementById("custom-padding-width-alert")
        .addEventListener("click", function () {
            Swal.fire({
                title: "Custom width, padding, background.",
                width: 600,
                padding: 100,
                customClass: { confirmButton: "btn btn-primary" },
                buttonsStyling: !1,
                background:
                    "var(--osen-secondary-bg) url(assets/images/small/small-5.jpg) no-repeat center",
            });
        }),
    document
        .getElementById("ajax-alert")
        .addEventListener("click", function () {
            Swal.fire({
                title: "Submit email to run ajax request",
                input: "email",
                showCancelButton: !0,
                confirmButtonText: "Submit",
                showLoaderOnConfirm: !0,
                customClass: {
                    confirmButton: "btn btn-primary me-2",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: !1,
                showCloseButton: !0,
                preConfirm: function (e) {
                    return new Promise(function (t, n) {
                        setTimeout(function () {
                            "taken@example.com" === e
                                ? n("This email is already taken.")
                                : t();
                        }, 2e3);
                    });
                },
                allowOutsideClick: !1,
            }).then(function (t) {
                Swal.fire({
                    icon: "success",
                    title: "Ajax request finished!",
                    customClass: { confirmButton: "btn btn-primary" },
                    buttonsStyling: !1,
                    html: "Submitted email: " + t,
                });
            });
        });
