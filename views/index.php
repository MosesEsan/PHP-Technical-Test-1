
<div class="row">

    <div class="page-header">
        <h1>PHP Test Application</h1>
    </div>

</div>

<div class="row">
    <div class="col-sm-7">

        <form class="form-horizontal">
            <div class="form-group">
                <label for="filter" class="col-sm-3 control-label">Filter By City:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="filterCity" placeholder="Filter By City">
                </div>
            </div>
        </form>

        <table class="table table-striped table-condensed" id="usersTable">
            <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Phone Number</th>
                <th>City</th>
            </tr>
            </thead>
            <tbody>
            <?foreach($users as $user){?>
                <tr>
                    <td><?=$user->getName()?></td>
                    <td><?=$user->getEmail()?></td>
                    <td><?=$user->getPhoneNumber()?></td>
                    <td><?=$user->getCity()?></td>
                </tr>
            <?}?>
            </tbody>
        </table>

    </div>

    <div class="col-sm-5">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Add New User</h3>
            </div>
            <div class="panel-body">
                <form method="post" action="create.php" class="form-horizontal" id="add-user-form">
                    <div class="form-group" id="name-group">
                        <label class="control-label col-xs-3" for="name">Name</label>
                        <div class="controls col-xs-9">
                            <input type="text" name="name" id="name" class="form-control">
                            <div class="help-block" id="name-error"></div> <!--Error message will display here-->
                        </div>
                    </div>

                    <div class="form-group" id="email-group">
                        <label class="control-label col-xs-3" for="email">Email</label>
                        <div class="controls col-xs-9">
                            <input type="text" name="email" id="email" class="form-control">
                            <div class="help-block" id="email-error"></div> <!--Error message will display here-->
                        </div>
                    </div>

                    <div class="form-group" id="phoneNumber-group">
                        <label class="control-label col-xs-3" for="phoneNumber">Phone No.</label>
                        <div class="controls col-xs-9">
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
                            <div class="help-block" id="phoneNumber-error"></div> <!--Error message will display here-->
                        </div>
                    </div>

                    <div class="form-group" id="city-group">
                        <label class="control-label col-xs-3" for="city">City</label>
                        <div class="controls col-xs-9">
                            <input type="text" name="city" id="city" class="form-control">
                            <div class="help-block" id="city-error"></div> <!--Error message will display here-->
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

