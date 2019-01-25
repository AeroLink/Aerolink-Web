
$(document).ready(() => {

    
    var listJobs = () => {
        httpAjax('get', '/list-careers', {})
        .then(
            (result) => {
                $("#careerDrop").empty();
                for (key in result.data) {
                    var stringcompo = result.data[key].jobOpen + (result.data[key].jobOpen > 1 ? " positions " : " position ") + "left";
                    $("#careerDrop").append('<tr><td>' + result.data[key].status + '</td><td>' + result.data[key].t + '</td><td>' + result.data[key].salary + '</td><td>' + stringcompo + '</td><td><a href="/applyNowTrigger/' + result.data[key].job_id +  '" class="btn btn-sm btn-success">Apply Now !</a></td></tr>')
                }
            }
        );
    };

    setInterval( function () {
        listJobs();    
    }, 1000 );


});