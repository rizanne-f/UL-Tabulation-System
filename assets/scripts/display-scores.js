$(document).ready(function(){
    // var d = new Date();
    // var month = d.getMonth() + 1;
    // var month1 = d.getMonth() + 1;
    // var day = d.getDate();

    // var output = d.getFullYear() + '-' +
    //     (month < 10 ? '0' : '') + month + '-' +
    //     (day < 10 ? '0' : '') + day;

    // var page = 0;
    

    // Display the Scores Table
    function refreshlist() {
        var content = $("#text-content").val();
        $.ajax({
            url: "assets/scripts/display-scores.php",
            type: "GET",
            data: { content: content },
            success: function(res) {

                var data = JSON.parse(res);
                var temp = "<table class='table table-hover table-sm'>";

                temp += "<tr><th class='align-middle text-center'>Cand. No.</th>" +
                            "<th class='align-middle'>Cand. Name</th>" +
                            "<th class='category align-middle' id='interview'>Interview</th>" +
                            "<th class='category align-middle' id='swear'>Swim Wear</th>" +
                            "<th class='category align-middle' id='fwear'>Formal Wear</th>" +
                            "<th class='align-middle text-center'>Ave Score</th>" +
                        "</tr>";

                var i = 0;
                for (i = 0; i < data.length - 1; i++) {

                    temp += "<tr>";
                    temp += "<td class='text-center'>" + data[i].no + "</td>";
                    temp += "<td class='text-left'>" + data[i].name + "</td>";
                    temp += "<td><input class='form-control form-control-sm' data-id='" + data[i].id + "' name='1' type='number' min='1' max='10' value='" + data[i].Interview + "'></td>";
                    temp += "<td><input class='form-control form-control-sm' data-id='" + data[i].id + "' name='2' type='number' min='1' max='10' value='" + data[i].SwimWear + "'></td>";
                    temp += "<td><input class='form-control form-control-sm' data-id='" + data[i].id + "' name='3' type='number' min='1' max='10' value='" + data[i].FormalWear + "'></td>";
                    temp += "<td class='text-center'>" + data[i].AveScore + "</td>";
                    temp += "</tr>";

                }

                temp += "<tr>" +
                            "<td></td>" +
                            "<td></td>" +
                            "<td><input type='button' class='btn btn-sm btn-outline-dark w-100' value='Submit'></td>" +
                            "<td><input type='hidden' class='btn btn-sm btn-outline-dark w-100' value='Submit'></td>" +
                            "<td><input type='hidden' class='btn btn-sm btn-outline-dark w-100' value='Submit'></td>" +
                            "<td></td>" +
                        "</tr>";

                temp += "</table>";

                $("#list-display").html(temp);
            }
        });
    }

    refreshlist()

    // Search for Candidate Names
    $('#searchbar').on("keyup", function() {
        refreshlist();
    });

    // Disable Scrolling on Input Type = Number
    $('body').on('focus', 'input[type=number]', function (event) {
        $(this).on('wheel.disableScroll', function (event) {
          event.preventDefault()
        })
    });

    // Updates Table Record
    $('body').on("change", ".form-control-sm", function (event) {
        var scoreVal = $(event.target).val();
        var categoryId = $(event.target).attr("name");
        var cnddtId = $(event.target).attr("data-id");
        
        if (scoreVal < 1 || scoreVal > 10) {
            alert('Please enter a number between 1 to 10');
            $(this).addClass('is-invalid');
        } else {
            $.ajax ({
                url: "assets/scripts/edit-scores.php",
                type: "POST",
                data: { score_value: scoreVal,
                    cnddt_id: cnddtId,
                    ctgry_id: categoryId },
                success: function(res) {
                },
            });
            refreshlist();
        }
    });

    // Displays the Candidate Photo and other info
    $("#preview").hide();
    $("body").on("click", function (event) {
        var candidate = $(event.target).attr("data-id");
        if (candidate) {
            $.ajax ({
                url: "assets/scripts/display-candidate.php",
                type: "GET",
                data: "candidate=" + candidate,
                success: function(res) {
                    var data = JSON.parse(res);
                    var temp = '<img id="contestant-image" src="assets\\img\\' + data[0].pic_path + '">';

                    temp += '<ul class="list-group border-0">' +
                                '<li class="list-group-item border-0">Candidate No: ' + data[0].no + '</li>' +
                                '<li class="list-group-item border-0">' + data[0].name + '</li>' +
                                '<li class="list-group-item border-0">' + data[0].course + '</li>' +
                            '</ul>';

                    $("#preview").html(temp);
                    $("#preview").fadeIn("fast");
                }
            });
        }
    });

});