<?php

Validator::extend('alpha_spaces', function($attribute, $value)
{
    return preg_match('/^[\pL\s]+$/u', $value);
});

Validator::extend('float_or_int', function($attribute, $value)
{
    return preg_match('/^\d*(\.\d{1,2})?$/', $value);
});