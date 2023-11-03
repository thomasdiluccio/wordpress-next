<?php

function sample_command($args) {
    WP_CLI::success('Thank you for running the sample command.');
}

WP_CLI::add_command('demo', 'sample_command');