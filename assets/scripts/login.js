$(document).ready(function () {
  $("body").on("click", "#login-btn", function () {

    var username = $("#judge-select").val();
    var password = $("#password").val();
    var userId = $("option:selected").attr("data-userId");
    var judgeId = $("option:selected").attr("data-judgeId");

    console.log(username);
    console.log(password);
    console.log(userId);
    console.log(judgeId);

    if (username == "" || password == "") {
      alert("Incomplete Login Info!");
      return false;
    }

    // Verifies login info
    $.ajax({
      url: "assets/scripts/verifylogin.php",
      type: "GET",
      data: { username: username, password: password, userId: userId, judgeId: judgeId },
      success: function (res) {
        var response = JSON.parse(res);

        if (response.status == "success") {
          // Checks if the user is the admin
          if (userId == 1) {
            // Redirects admin to admin page
            window.location.href = "admin.php";
          } else {
            // redirects the judge to the scoring page
            window.location.href = "index.php";
          }
        } else {
          alert("Invalid Login Credentials");
          return false
        }

      },
    });

  });

});
