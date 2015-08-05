<?php
namespace App\Libraries;


use Illuminate\Pagination\BootstrapThreePresenter;

class Paginator extends BootstrapThreePresenter
{

    protected function getActivePageWrapper($text)
    {
        return '<li class=""><span>aa</span></li>';
    }
}
