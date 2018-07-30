$(document).ready(function () {
    $("#memberlogin").on("submit", function (e) {
        e.preventDefault();
        loginAjax($("#memberusername").val(), $("#memberpassword").val());
    })
})

function loginAjax(username, password, e) {
//    buttonSpin(e);
    $.ajax({
        type: "POST",
        url: BASE_URL + "accounts/login_member/",
        data: {username: username, password: password},
        dataType: "json",
        success: function (response) {
            if (response.status == 201) {
                window.location.href = BASE_URL + "member/dashboard";
            } else {
                alert(response.message);
            }
        },
        error: function () {

        },
        done: function () {
//            buttonUnspin(e);
        }
    });
}



function copyToClipboard(text) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(text).select();
    document.execCommand("copy");
    $temp.remove();
}