<?php
/**
 * Created by PhpStorm.
 * User: Junnyor
 * Date: 11/07/2017
 * Time: 22:01
 */
namespace App\Services\Mobile\Box\Traits;
use Carbon\Carbon;

trait BoxAttributes{

    /**
     * @return string
     */
    public function getEditButtonAttribute() {
        return '<a href="'.route('mobile.boxes.edit', $this->id).'" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('crud.edit_button') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute() {
        return '<a href="'.route('mobile.boxes.destroy', $this->id).'" data-method="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="' . trans('crud.delete_button') . '"></i></a>';
    }

    /**
     * @return string
     */
    public function getInstalmentsButtonAttribute() {
        return '<a href="'.route('mobile.boxes.participants', $this->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-ok-circle" data-toggle="tooltip" data-placement="top" title="Gerar Mensalidades"></i></a>';
    }

    /* public function getSendEmailButtonAttribute(){
         return '<a href="'.route('backend.question_group.send', $this->id).'"  class="btn btn-xs btn-info"><i class="fa fa-envelope" data-toggle="tooltip" data-placement="top" title="' . trans('crud.send_button') . '"></i></a>';

     }*/

    public function getStartDateAttribute($start_date) {
        return Carbon::parse($start_date)->format('d/m/Y');
    }

    public function getDueDateAttribute($due_date) {
        return Carbon::parse($due_date)->format('d/m/Y');
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute() {
        return $this->getEditButtonAttribute().' '.
        $this->getDeleteButtonAttribute().' '.
        $this->getInstalmentsButtonAttribute().' ';
    }
}