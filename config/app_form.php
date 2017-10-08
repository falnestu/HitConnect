<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 30.09.17
 * Time: 21:13
 */

return [
    // Container element used by control().
    'inputContainer' => '<div class="top-margin">{{content}}</div>',
    // Generic input element.
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
    // Submit input element.
    'inputSubmit' => '<input class="btn btn-action" type="{{type}}"{{attrs}}/>',
    // Container for submit buttons.
    'submitContainer' => '<div class="col-lg-4 text-right">{{content}}</div>',
];