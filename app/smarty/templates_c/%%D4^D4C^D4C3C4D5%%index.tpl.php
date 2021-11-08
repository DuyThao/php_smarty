<?php /* Smarty version 2.6.32, created on 2021-11-08 05:09:38
         compiled from student/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'testfn', 'student/index.tpl', 8, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "share/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4"><?php $this->assign('name', 'Tho '); ?>
                <li class="breadcrumb-item active"><a href="index.php"> <?php echo $this->_tpl_vars['name']; ?>
.</a></li>
                <li class="breadcrumb-item active"><a href="index.php"> Student List <?php echo smarty_function_testfn(array(), $this);?>
 </a></li>

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