$(document).ready(function () {
    faqList();
    $("#faqlist-table").dataTable();
    function faqList() {
        $("#faq-list-tbody").html("<tr><td colspan='4'> Loading , request a data .. </td></tr>");
        $.ajax({
            type: "ajax",
            url: BASE_URL + "settings/faq/faq-list",
            async: false,
            dataType: "json",
            success: function(data) {
                var showFaq = "";
                var i;
                var length = 50;
                for (i = 0; i < data.length; i++) {
                    showFaq += "<tr>";
                    showFaq += "<td>" + data[i].question.substring(0, length);+"</td>";
                    showFaq += "<td>" + data[i].answer.substring(0, length); +"</td>";
                    showFaq += "<td>" + data[i].date_add +"</td>";
                    showFaq += "</tr>";
                }
                $("#faq-list-tbody").html(showFaq);
            },
        });
    }
});
