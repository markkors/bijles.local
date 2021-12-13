<?php

class html_helper
{
    static function create_usertable($data) {

        //var_dump($data);

        //echo $data[2]->username;
    $html = <<< HTML
    <div class="row header">
        <div class="cell">kop 1</div>
        <div class="cell">kop 2</div>
        <div class="cell">kop 3</div>
    </div>
HTML;

    foreach ($data as $key=>$value) {
        $html .= <<< HTML
    <div class="row">
        <div class="cell">$value->id</div>
        <div class="cell">$value->username</div>
        <div class="cell">$value->password</div>
    </div>
HTML;
    }







        return $html;

    }
}