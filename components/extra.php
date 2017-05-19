<div class="row">
    <!-- left -->
    <div class="col-xs-7">
        <!-- WIP -->
        <div class="box">
            <div class="box-content">
                <h4>Work in progress!</h4>
            </div>
        </div>
    </div>
    <!-- /left -->

    <!-- right -->
    <div class="col-xs-5 text-center">
        <div class="box">
            <div class="box-content">
                <h1 class="tag-title"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Contact</h1>
                <hr class="separator" />
                <div class="row">
                    <div class="col-xs-4" style="text-align: right">
                        <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> <b>Phone</b><br />
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <b>Email</b>
                    </div>
                    <div class="col-xs-5" style="text-align: left">
                        <?php echo $contact_phone ?><br />
                        <b><a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></b>
                    </div>
                </div>
                <hr class="separator" />

                <!-- button trigger modal -->
                <div class="center-block"><h4>Want a quote?</h4></div>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contactModal">Contact Now</button>
            </div>
        </div>
    </div>
    <!-- right -->
</div>