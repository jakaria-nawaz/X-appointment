<?php
require_once 'config/session.php';

$user = new User(new Database);
if ($user->is_loggedin() != true) {
    $user->redirect('login');
}
if (isset($_REQUEST['logout'])) {
    $user->logout();
    $user->redirect('login');
}

$htmlLayout = new GenerateLayout("X-Appointment (Dashboard)");
echo $htmlLayout->generateHeader(true);
?>

<div class="jumbotron mt-3">

    <h3>Welcome, <?php echo ucfirst($_SESSION['user_name']) ?>.</h3>
    <p class="lead">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac sapien turpis. Ut vehicula dui quis tortor
        lobortis tincidunt. Donec auctor magna vel sapien mattis consectetur. Donec bibendum nisl ut nunc volutpat, nec
        ultrices justo commodo. Mauris ac vehicula mauris, ac ullamcorper neque. Quisque luctus euismod erat non
        pharetra. Mauris id quam quis magna euismod tempus. Nam dui neque, mollis eu nibh et, gravida ultrices turpis.
        Sed cursus vitae elit at interdum. Vestibulum lobortis sit amet felis a vehicula. Donec congue quis neque at
        bibendum. Proin eleifend malesuada interdum.
    </p>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sampleModal">
        Click to check the modal
    </button>

</div> <!-- jumbotron mt-3 -->

<div class="container root-container">
    <h3>The root container</h3>
</div> <!-- root-container -->


<!-- Create Modal -->
<div class="modal fade" id="sampleModal" tabindex="-1" role="dialog" aria-labelledby="sampleModalTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Sample Modal Form</h3>
                <form method="post">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="inputText">Text</label>
                        <textarea class="form-control" id="inputText" name="text" placeholder="Text"
                                  maxlength="150"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputDate">Date</label>
                        <input type="date" class="form-control" id="inputDate" name="deadline" max="3000-12-31"
                               min="1000-01-01" placeholder="Text">
                    </div>
                    <button type="submit" name="save_btn" class="btn btn-primary">Save</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> <!-- modal ends -->

<?php
echo $htmlLayout->generateFooter();
?>
