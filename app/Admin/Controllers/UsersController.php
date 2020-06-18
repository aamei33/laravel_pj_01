<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Users;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

use Tests\Models\User;

class UsersController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Users(), function (Grid $grid) {
            $grid->id->sortable();
            $grid->name;
            $grid->email;
            $grid->email_verified_at;
            $grid->password;
            $grid->remember_token;
            $grid->is_admin;
            $grid->created_at;
            $grid->updated_at->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Users(), function (Show $show) {
            $show->id;
            $show->name;
            $show->email;
            $show->email_verified_at;
            $show->password;
            $show->remember_token;
            $show->is_admin;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Users(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('email');
            $form->text('email_verified_at');
            $form->text('password');
            $form->text('remember_token');
            $form->text('is_admin');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
