primaTable();
primaTable2();

function primaTable(){
    $("#primaTable").DataTable({
        responsive: true,
        pageLength : 5,
	});
}
function primaTable2(){
    $("#primaTable2").DataTable({
        responsive: true,
        pageLength : 5,
	});
}

// $(document).ready(function () {
// 	var table = $("#primaTable").DataTable({
//         responsive: true,
//         pageLength : 5,
// 	});
// });

// $(document).ready(function () {
// 	var table = $("#primaTable2").DataTable({
// 		responsive: true,
// 		pageLength : 10,
// 	});
// });