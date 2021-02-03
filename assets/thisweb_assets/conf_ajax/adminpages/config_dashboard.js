$(document).ready(function () {
    countPurchased();
    countUser();

    function countPurchased(){
        var countOrderComplete = 0;
        $.ajax({
            url: BASE_URL + "dashboard/count-purchased",
            dataType: "JSON",
            data: {
                countOrderComplete: countOrderComplete,
            },
            success: function (data) {
                $('.count-purchased').html(data.countOrderComplete);
            },
        });
    }

    function countUser(){
        var countAllUser = 0;
        $.ajax({
            url: BASE_URL + "dashboard/count-user",
            dataType: "JSON",
            data: {
                countAllUser: countAllUser,
            },
            success: function (data) {
                $('.count-user').html(data.countAllUser);
            },
        });
    }
});