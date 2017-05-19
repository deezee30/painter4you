<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contactModal">Get a quote from Paul</h4>
            </div>
            <!-- /header -->

            <!-- send self a form to compose an email and send to contact -->
            <form class="form-horizontal" action="<?php echo basename($_SERVER['PHP_SELF']) ?>" method="POST">

                <!-- body -->
                <div class="modal-body">

                    <!-- name -->
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input id="name" name="name" type="text" class="form-control input-md" required>
                        </div>
                    </div>

                    <!-- phone -->
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input id="phone" name="phone" type="text" class="form-control input-md" required>
                        </div>
                    </div>

                    <!-- contact email -->
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input id="email" name="email" type="email" class="form-control">
                        </div>
                    </div>

                    <!-- description of the job -->
                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea style="resize: none" id="description" name="description" class="form-control input-md" required rows="4"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /body -->

                <!-- footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                <!-- /footer -->
            </form>
        </div>
    </div>
</div>