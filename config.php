<?php

// /////////////////////////////////////////////////// //
// // General configuration file for Painter4You.ie // //
// /////////////////////////////////////////////////// //

return [

    // For developmental purposes. Enables debugging and
    // prevents caching. Do not use in production environment.
    "dev" => false,

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
    ],
	
    /*
     * Email server configuration
     */
    "email_server" => [

        // URL of injection API server. This server does the processing and sending of email.
        "url" => "https://inject.socketlabs.com/api/v1/email",

        // The ID of the server.
        "id" => "20426",

        // The private key of the server.
        "key" => "Jd8e3WGp45DoBx67ZiXc"
    ],

    /*
     * Media settings
     */
    "media" => [

        // Rotating carousel at the top of the website
        // Standard image resolutions are 2000x700 pixels.
        "top" => [
            [
                "path" => "img/1/1.jpg",
                "title" => "Top Quality Painting & Decorating Contractor",
                "caption" => "Experienced in all areas of home and property decorating with over twenty years experience in the decorating business"
            ], [
                "path" => "//placehold.it/2000x700",
                "title" => "...",
                "caption" => "..."
            ], [
                "path" => "//placehold.it/2000x700",
                "title" => "...",
                "caption" => "..."
            ]
        ],

        // Customer reviews
        "reviews" => [
            [
                "review" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                "customer" => "Person 1, Some area"
            ], [
                "review" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                "customer" => "Person 2, Knocknacarra"
            ], [
                "review" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                "customer" => "Business, Salthill"
            ], [
                "review" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                "customer" => "Business, Salthill"
            ], [
                "review" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                "customer" => "Business, Salthill"
            ]
        ]
    ]
];