<?php /* Smarty version 2.6.32, created on 2021-11-11 02:58:54
         compiled from student/index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "share/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4"><?php $this->assign('name', 'Tho '); ?>
                <li class="breadcrumb-item active"><a href="index.php"> Student</a></li>
                <li class="breadcrumb-item active"><a href="index.php"> Student List </a></li>
            </ol>
            <div class="row">
            </div>
                        <div class="form-row">
                <div class="col-md-4">
                    <input class="form-control py-4" name="search" type="text" id="search" />
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary" id="btn_search" onclick="searchStudent()"> Search
                    </button>

                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-2">
                    <select class="form-control py-2" name="sort" id="sort">
                        <option value="id"> Select ...</option>
                        <option value="name"> Name</option>
                        <option value="courses"> Courses</option>
                        <option value="score"> Score</option>
                        <option value="time"> Time</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control py-2" name="sort_type" id="sort_type">
                        <option value="ASC"> Ascending</option>
                        <option value="DESC"> Descending</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary" id="btn_sort" onclick="searchStudent()"> Sort
                    </button>
                </div>
               
            </div>
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Table Student
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#add_modal" data-whatever="@getbootstrap" id="btn_add_popup"><i class="fa fa-plus"
                            aria-hidden="true"></i>Add Student </button>

                    <button type="submit" class="btn btn-success float-right" style="margin-right: 10px" id="btn_top"
                        onclick="topStudent()"> Top 3
                        Student
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-bordered table-striped table-hover" id="datatable_student"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th> Courses </th>
                                    <th> Score</th>
                                    <th> Time</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "student/addStudent.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "student/updateStudent.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "share/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script src="public/js/student.js"></script>