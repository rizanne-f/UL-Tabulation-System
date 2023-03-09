$(document).ready(function() {
    refreshJudgeScore();
    function refreshJudgeScore() {
        $.ajax({
            url: 'assets/scripts/admin-getScoreProgress.php',
            type: 'GET',
            success: function(res) {
                var data = JSON.parse(res);
                var temp = "<table class='table table-hover table-responsive table-sm'>";

                temp += "<tr><th class='align-middle text-center'>Judge ID</th>" +
                            "<th class='align-middle'>Interview</th>" +
                            "<th class='align-middle'>Swim Wear</th>" +
                            "<th class='align-middle'>Formal Wear</th>" +
                        "</tr>";

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
    
    setInterval(function(){
		refreshJudgeScore();
	},2000);
});