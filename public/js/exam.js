$(document).ready(function () {


    $('#frmExams').submit((e) => {
        e.preventDefault();

        swal({
                title: "Halt!",
                text: "Are you sure you about your answers? this action could not be undo once it was submitted",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((response) => {
                if (response) {
                    var global_choice = [];

                    var error_f = false;
                    var fields_error = [];
                    $.each($('.Qx'), (i, e) => {
                        var QID = $(e).data('qx');
                        var choice = $('input[name=Q' + QID + ']:checked').val();

                        if (typeof choice !== "undefined") {
                            global_choice.push({
                                QID: QID,
                                CHOICE: choice
                            });
                        } else {
                            error_f = true;
                            fields_error.push("Q" + QID);
                        }
                    });

                    if (error_f) {
                        swal("Oh! No!", fields_error.join() + " needs some input.", "error");
                    } else {
                        httpAjax('post', '/applicant/examination/', {
                            data: {
                                exam_id: $("#exid").data('exid'),
                                res: global_choice
                            }
                        });
                        swal("Success", "Your exam was successfully submitted!", "success");
                        setTimeout(() => {
                            window.location.href = "/applicant/";
                        }, 2000);
                    }

                    console.log(global_choice);
                } else {
                    swal("Take your time", "", "info");
                }

            });

        console.log($('.Qx'));
    })
});
