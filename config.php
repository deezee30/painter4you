<?php

// /////////////////////////////////////////////////// //
// // General configuration file for Painter4You.ie // //
// /////////////////////////////////////////////////// //

return [

    // Whether or not to output the debuggings of the website
    // for developmental and non-production environments.
    "debug" => true,

    // Alert message to display on the top of the website.
    // Leave blank to display no message.
    "alert" => "",

    // The logo to use at the top left corner of the page.
    // Maximum height is 100px
    "logo" => "logo2.png",

    /*
     * Contact information
     */
    "contact" => [

        // Whether or not contacting via POST form is enabled.
        // If disabled, quotes will not be sent to the email,
        // however contact information will still be displayed.
        "enabled" => true,

        // The email to display on the website and send the
        // inquiries and contact forms to.
        "email" => "contact@painter4you.ie",

        // The phone number to display on the website as a contact method.
        "phone" => "085 154 8215"
    ]
];