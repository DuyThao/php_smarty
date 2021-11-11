let column = "id";
let type = "ASC";
let search = "";
let top_student = false;

(function ($) {
    var student = function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        reload_table()

        $('#add_form').on('submit', function (e) {
            e.preventDefault();
            var data = {
                'name': $('#name').val(),
                'courses': $('#courses').val(),
                'score': $('#score').val(),
                'time': $('#time').val(),
            }
            token = $('#csrf_token').val()
            if ($('#name').val() != "" && $('#courses').val() != "" && $('#score').val() != "" && $('#time').val() != "") {
                $.post("student-add", { data: data, token: token }, function (result) {
                    if (JSON.parse(result).code == 200) {
                        swal({
                            title: 'Create Success',
                            type: 'success',
                            timer: 1000,
                            buttons: true,
                        })
                        reload_table()
                        $("#add_modal").modal('hide');
                    }
                    else {
                        Swal('Create fail', '', 'error');

                    }

                })
            }
            else {
                return;
            }

        });

        $('#update_form').on('submit', function (e) {
            e.preventDefault();

            var data = {
                'name': $('#update_name').val(),
                'courses': $('#update_courses').val(),
                'score': $('#update_score').val(),
                'time': $('#update_time').val(),
                'id': $('#update_form').attr('data-id'),
            }
            token = $('#csrf_token').val()

            if ($('#update_name').val() != "" && $('#update_courses').val() != "" && $('#update_score').val() != "" && $('#update_time').val() != "") {
                $.post("student-update", { data: data, token: token }, function (result) {
                    if (JSON.parse(result).code == 200) {
                        swal({
                            title: 'Update Success',
                            type: 'success',
                            timer: 1000,
                            buttons: true,
                        })
                        reload_table()
                        $("#edit_modal").modal('hide');
                    }
                    else {
                        Swal('Update fail', '', 'error');

                    }

                })
            }
            else {
                return;
            }

        });

        $(document).on('change', '[type=search]', function () {
            $('#datatable').dataTable().ajax.reload();
        });
    };

    new student();
})($);

function getItem(id) {
    $.post("student-get-item/" + id, { id: id }, function (result) {
        result = JSON.parse(result);

        $('#update_form').attr('data-id', result[0][0]);
        $('#update_name').val(result[0][1])
        $('#update_courses').val(result[0][2])
        $('#update_score').val(result[0][3])
        time = result[0][4].replace(" ", "T");
        $('#update_time').val(time)

    })
}
function searchXSS() {
    text = $("#search_test").val();
    $.get("search-item/" + text, function (result) {
        $("#search_result").html("Search for: " + text)

    });

}

function topStudent() {
    top_student = true
    searchStudent();
}

function searchStudent() {
    search = $("#search").val();
    // $.post("search-student" , { text: text }, function (result) {
    column = $("#sort").val();
    type = $("#sort_type").val();
    // });
    var table = $('#datatable_student').DataTable();
    table.clear();
    table.destroy();
    $('#datatable_student').dataTable({
        "ordering": false,
        "processing": true,
        "serverSide": true,
        "paging": true,
        "searching": false,
        "pageLength": 10,
        "pagingType": "full_numbers",
        "responsive": true,
        "ajax": {
            "url": "search-student",
            "type": "POST",
            "data": { search: search, column: column, type: type, top: top_student },
        },
        "fnRowCallback": function (nRow, aData) {
            $(nRow).attr("rowid", aData[0]);
            return nRow;
        },
    });
    top_student = false

}
function deleteStudent(id) {
    token = $('#csrf_token').val()

    swal({
        title: 'Are you sure?',
        text: "What do you want to delete it?",
        type: 'warning',
        showCancelButton: true,

        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Confirm'
    }).then((result) => {

        if (result.value) {
            // axios.({
            //     method: 'POST',
            //     url: 'student-delete/' + id,
            //     data: {token :token},
            // }).then((res) => {
            //     if (res.status == 200) {
            //         swal({
            //             title: 'Delete Success',
            //             type: 'success',
            //             timer: 1000,
            //             buttons: true,
            //         })
            //         reload_table()
            //     } else {
            //         Swal('Delete fail', '', 'error');
            //     }
            // })
            axios.post('student-delete/' + id, token)
                .then(res => {
                    if (res.status == 200) {
                        swal({
                            title: 'Delete Success',
                            type: 'success',
                            timer: 1000,
                            buttons: true,
                        })
                        reload_table()
                    } else {
                        Swal('Delete fail', '', 'error');
                    }

                });
        }
    })

}
function reload_table() {
    var table = $('#datatable_student').DataTable();
    table.clear();
    table.destroy();
    $('#datatable_student').dataTable({
        "ordering": false,
        "processing": true,
        "serverSide": true,
        "paging": true,
        "searching": false,
        "pageLength": 10,
        "pagingType": "full_numbers",
        "responsive": true,
        "ajax": {
            "url": "get-data-table-student",
            "type": "POST",
            "data": { search: search },
        },
        "fnRowCallback": function (nRow, aData) {
            $(nRow).attr("rowid", aData[0]);
            return nRow;
        },
    });
}

