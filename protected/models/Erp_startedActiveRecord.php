<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

abstract class Erp_startedActiveRecord extends CActiveRecord
{
    
    protected function beforeSave() {
        
        if(null!==Yii::app()->user)
            $id=yii::app()->user->id;
        else
            $id=1;
        
        if($this->isNewRecord)
            $this->create_user_id=$id;
        $this->update_user_id=$id;
        
        return parent::beforeSave();
    }
    
    public function behaviors() {
        return array(
         'CTimestampBehavior'=>array(
            'class'=>'zii.behaviors.CTimestampBehavior',
            'createAttribute'=>'create_time',
            'updateAttribute'=>'update_time',
            'setUpdateOnCreate'=>true,
         ),   
        );
    }
}
?>
