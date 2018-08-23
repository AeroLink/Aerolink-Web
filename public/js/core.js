
$(document).ready(() => {

    
    var listJobs = () => {
        httpAjax('get', '/list-careers', {})
        .then(
            (result) => {
                $("#careerDrop").empty();
                for (key in result.data) {
                    var stringcompo = result.data[key].jobOpen + (result.data[key].jobOpen > 1 ? " positions " : " position ") + "left";
                    $("#careerDrop").append('<div class="col-4"><div class="card"><div class="card-header bg-success text-white"><strong>' + result.data[key].title + '</strong> &nbsp; [' + stringcompo + ']</div><div class="card-body">' + result.data[key].description + '</div><div class="card-footer"><div class="d-flex justify-content-end"><a class="btn btn-success btn-sm" href="/applyNowTrigger/' + result.data[key].job_id + '">Apply Now!</a></div></div></div>')
                }
            }
        );
    };

    setInterval( function () {
        listJobs();    
    }, 1000 );


});