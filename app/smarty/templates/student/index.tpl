{include file="share/header.tpl" }

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">{assign var="name" value="Tho " }
                <li class="breadcrumb-item active"><a href="index.php"> {$name}.</a></li>
                <li class="breadcrumb-item active"><a href="index.php"> Student List {testfn} </a></li>

            </ol>
            <div class="row">
            </div>
                    {* onchange="search()" *}

            {* <div class="card mb-4">
                <form action="search-item" method="POST">
                    <input class="form-control py-4" id="search_test" name="search_test" type="text" />
                    <div class="" id="search_result">
                    </div>
                    <input class="" type="submit" value="Search" />
                </form>
            </div> *}


            <div class="form-row">
                <div class="col-md-4">
                    <input class="form-control py-4" name="search" type="text" id="search" />
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary" id="btn_search" onclick="searchStudent()"> Search
                    </button>

                </div>

                <div class="col-md-4">
                    <input class="form-control py-4" name="sort" type="text" />

                </div>
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table Student
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#add_modal" data-whatever="@getbootstrap" id="btn_add_popup"><i class="fa fa-plus"
                            aria-hidden="true"></i>Add Student</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-bordered table-striped table-hover" id="datatable_student"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th> Courses </th>
                                    <th> Score</th>
                                    <th> Time</th>
                                    <th> Action </th>

                                </tr>
                            </thead>
                            <tbody>
                                {* {foreach from=$list_data key=k item=i}
                                    <tr>
                                        <td>{$k}</td>
                                        <td>{$i.name}</td>
                                        <td>{$i.courses}</td>
                                        <td>{$i.score}</td>
                                        <td>{$i.time}</td>
                                    </tr>
                                {/foreach} *}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

{include file="student/addStudent.tpl" }
{include file="student/updateStudent.tpl" }

{* <div class="wrapper">

</div> *}

{include file="share/footer.tpl"}
<script src="public/js/student.js"></script>