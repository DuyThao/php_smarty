{include file="share/header.tpl" }

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <ol class="breadcrumb mb-4">
               <li class="breadcrumb-item active"><a href="index.php"> Student</a></li>
                <li class="breadcrumb-item active"><a href="index.php"> Student List</a></li>


            </ol>
            <div class="row">
            </div>
            <form class="needs-validation" novalidate id="change_password_form" enctype="multipart/form-data" action="student_add" method="POST">
                <input type="hidden" name="_token" value="csrf_token()" />
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Name</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddress">Phone</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputCity">Score</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Courses</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </main>

</div>


{* <div class="wrapper">

</div> *}
{include file="share/footer.tpl"}