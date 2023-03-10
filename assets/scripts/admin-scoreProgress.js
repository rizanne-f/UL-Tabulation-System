$(document).ready(function() {
    
    function refreshJudgeScore() {
        $.ajax({
            url: 'assets/scripts/admin-getScoreProgress.php',
            type: 'GET',
            success: function(res) {
                var data = JSON.parse(res);
                var temp = "<table class='table table-hover table-sm'>";
                temp += "<caption class='pb-0 text-center'>Mr. UL Candidates</caption>";
                temp += "<thead>";
                temp += "<tr><th class='align-middle text-center'>Judge ID</th>" +
                            "<th class='align-middle'>Interview</th>" +
                            "<th class='align-middle'>Swim Wear</th>" +
                            "<th class='align-middle'>Formal Wear</th>" +
                        "</tr>";
                temp += "</thead>";
                var i = 0;
                for (i = 0; i < data.length - 1; i++) {
                    temp += "<tr>";
                    temp += "<td>" + data[i].judge_id + "</td>";
                    temp += "<td>" + data[i].Interview + "</td>";
                    temp += "<td>" + data[i].SwimWear + "</td>";
                    temp += "<td>" + data[i].Formal + "</td>";
                    temp += "</tr>";
                }
                temp += "</table>";
                $("#list-scored").html(temp);
            }
        })
    }
    refreshJudgeScore();

    function refreshTop5() {
        // Get Top 5 Candidates in Interview Category
        $.ajax({
            url: 'assets/scripts/fetchInterviewTop5.php',
            type: 'GET',
            success: function(res) {
                var data = JSON.parse(res);
                var temp = "<table class='table table-hover table-sm'>";
                temp += "<caption class='pb-0 text-center'>Interview</caption>";
                temp += "<thead>";
                temp += "<tr><th class='align-middle text-center'>Rank</th>" +
                            "<th class='align-middle'>Candidate</th>" +
                            "<th class='align-middle text-center'>No.</th>" +
                            "<th class='align-middle text-center'>Score</th>" +
                        "</tr>";
                temp += "</thead>";
                var i = 0;
                for (i = 0; i < data.length-1; i++) {
                    temp += "<tr>";
                    temp += "<td class='text-center'>" + (i+1) + "</td>";
                    temp += "<td>" + data[i].name + "</td>";
                    temp += "<td class='text-center'>" + data[i].no + "</td>";
                    temp += "<td class='text-center'>" + data[i].ave + "</td>";
                    temp += "</tr>";
                }
                temp += "</table>";
                $("#mrul-interview-top5").html(temp);
            }
        });

        // Get Top 5 Candidates in Swimwear Category
        $.ajax({
            url: 'assets/scripts/fetchSwimwearTop5.php',
            type: 'GET',
            success: function(res) {
                var data = JSON.parse(res);
                var temp = "<table class='table table-hover table-sm'>";
                temp += "<caption class='pb-0 text-center'>Swimwear</caption>";
                temp += "<thead>";
                temp += "<tr><th class='align-middle text-center'>Rank</th>" +
                            "<th class='align-middle'>Candidate</th>" +
                            "<th class='align-middle text-center'>No.</th>" +
                            "<th class='align-middle text-center'>Score</th>" +
                        "</tr>";
                temp += "</thead>";
                var i = 0;
                for (i = 0; i < data.length-1; i++) {
                    temp += "<tr>";
                    temp += "<td class='text-center'>" + (i+1) + "</td>";
                    temp += "<td>" + data[i].name + "</td>";
                    temp += "<td class='text-center'>" + data[i].no + "</td>";
                    temp += "<td class='text-center'>" + data[i].ave + "</td>";
                    temp += "</tr>";
                }
                temp += "</table>";
                $("#mrul-swimwear-top5").html(temp);
            }
        });

        // Get Top 5 Candidates in Formal Wear Category
        $.ajax({
            url: 'assets/scripts/fetchFormalTop5.php',
            type: 'GET',
            success: function(res) {
                var data = JSON.parse(res);
                var temp = "<table class='table table-hover table-sm'>";
                temp += "<caption class='pb-0 text-center'>Formal Wear</caption>";
                temp += "<thead>";
                temp += "<tr><th class='align-middle text-center'>Rank</th>" +
                            "<th class='align-middle'>Candidate</th>" +
                            "<th class='align-middle text-center'>No.</th>" +
                            "<th class='align-middle text-center'>Score</th>" +
                        "</tr>";
                temp += "</thead>";
                var i = 0;
                for (i = 0; i < data.length-1; i++) {
                    temp += "<tr>";
                    temp += "<td scope='row' class='text-center'>" + (i+1) + "</td>";
                    temp += "<td>" + data[i].name + "</td>";
                    temp += "<td class='text-center'>" + data[i].no + "</td>";
                    temp += "<td class='text-center'>" + data[i].ave + "</td>";
                    temp += "</tr>";
                }
                temp += "</table>";
                $("#mrul-formal-top5").html(temp);
            }
        });

        // Get Top 5 Candidates Overall
        $.ajax({
            url: 'assets/scripts/fetchFormalTop5.php',
            type: 'GET',
            success: function(res) {
                var data = JSON.parse(res);
                var temp = "<table class='table table-hover table-sm'>";
                temp += "<caption class='pb-0 text-center'>Overall</caption>";
                temp += "<thead>";
                temp += "<tr><th class='align-middle text-center'>Rank</th>" +
                            "<th class='align-middle'>Candidate</th>" +
                            "<th class='align-middle text-center'>No.</th>" +
                            "<th class='align-middle text-center'>Score</th>" +
                        "</tr>";
                temp += "</thead>";
                var i = 0;
                for (i = 0; i < data.length-1; i++) {
                    temp += "<tr>";
                    temp += "<td scope='row' class='text-center'>" + (i+1) + "</td>";
                    temp += "<td>" + data[i].name + "</td>";
                    temp += "<td class='text-center'>" + data[i].no + "</td>";
                    temp += "<td class='text-center'>" + data[i].ave + "</td>";
                    temp += "</tr>";
                }
                temp += "</table>";
                $("#mrul-overall-top5").html(temp);
            }
        });
    }
    refreshTop5();

    // Periodically refreshes the table
    setInterval(function(){
		refreshJudgeScore();
        refreshTop5();
	},2000);

});