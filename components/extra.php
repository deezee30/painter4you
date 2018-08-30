<div class="row">
    <!-- left -->
    <div class="col-xs-7">
        <!-- WIP -->
        <div class="box">
            <div class="box-content">
                <h1 class="text-center"><span class="glyphicon glyphicon-user"></span> About me</h1>
				<p>Hi! My name is Paul and I am from Latvia. I am 44 years old and I have worked in the painting industry for over 20 years.
				<br /><br />Before working in Galway, I have professionally used my painting skills in Germany, Switzerland and Denmark for homes and companies!
				<br><br />I am an honest, organised and responsible individual and I love my job!
				<br /><br />If you're interested in what I do and would like to get in touch, contact me via phone, email or the form on the website!</p>
            </div>
        </div>
    </div>
    <!-- /left -->

    <!-- right -->
    <div class="col-xs-5 text-center">
        <div class="box">
            <div class="box-content">
                <h1 class="tag-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Contact</h1>
                <hr class="separator" />
                <div class="row">
                    <div class="col-xs-4" style="text-align: right">
                        <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> <b>Phone</b><br />
                        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <b>Email</b>
                    </div>
                    <div class="col-xs-5" style="text-align: left">
                        <?php echo CONTACT_PHONE ?><br />
                        <b><a href="mailto:<?php echo CONTACT_EMAIL ?>"><?php echo CONTACT_EMAIL ?></a></b>
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