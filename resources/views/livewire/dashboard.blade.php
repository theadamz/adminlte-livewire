<div>
    <!-- Toolbar -->
    <section class="content-header-fixed pt-0 px-0">
        <nav class="navbar navbar-expand navbar-white shadow-sm">
            <!-- Left -->
            <ul class="navbar-nav">
                <li class="nav-item mr-2">
                    <button type="button" class="btn btn-sm btn-outline-success" id="create" name="create" data-toggle="modal" data-target="#modalFormInput">
                        <i class="fas fa-plus d-inline"></i>
                        <span class="ml-2 d-none d-sm-inline font-weight-bold">Add</span>
                    </button>
                </li>
                <li class="nav-item mr-2">
                    <button type="button" class="btn btn-sm btn-outline-dark" id="duplicate" name="duplicate" data-toggle="modal" data-target="#modalFormDuplicate">
                        <i class="fas fa-copy d-inline"></i>
                        <span class="ml-2 d-none d-sm-inline font-weight-bold">Duplicate</span>
                    </button>
                </li>
                <li class="nav-item mr-2">
                    <button type="button" class="btn btn-sm btn-outline-warning" id="edit" name="edit">
                        <i class="fas fa-edit d-inline"></i>
                        <span class="ml-2 d-none d-sm-inline font-weight-bold">Edit</span>
                    </button>
                </li>
                <li class="nav-item mr-2">
                    <button type="button" class="btn btn-sm btn-outline-danger" id="delete" name="delete">
                        <span class="indicator-label">
                            <i class="fas fa-trash d-inline"></i>
                            <span class="ml-2 d-none d-sm-inline font-weight-bold">Delete</span>
                        </span>
                        <span class="indicator-progress d-none">
                            <span class="spinner-border spinner-border-sm"></span>
                        </span>
                    </button>
                </li>
            </ul>

            <!-- Right -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="refresh" name="refresh">
                        <span class="indicator-label">
                            <i class="fas fa-sync d-inline"></i>
                            <span class="ml-2 d-none d-sm-inline font-weight-bold">Refresh</span>
                        </span>
                        <span class="indicator-progress d-none">
                            <span class="spinner-border spinner-border-sm"></span>
                        </span>
                    </button>
                </li>
            </ul>
        </nav>
    </section>

    <!-- Main content -->
    <section class="content">
        <button type="button" class="btn btn-default hide-on-collapse btn-block" x-on:click="alert('This is a test button!')">
            <i class="fas fa-sign-out-alt"></i>
            <span class="ml-2 hide-on-collapse-all">Test</span>
        </button>
    </section>
    <!-- /.content -->
</div>
