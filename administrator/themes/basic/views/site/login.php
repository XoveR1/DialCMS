<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
            
<div class="row">
    <div class="span3 offset4">
        <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'login-form',
                'enableClientValidation'=>true,
                'clientOptions'=>array(
                        'validateOnSubmit'=>true
                ),
        )); ?>
            <fieldset>
                <legend>Login</legend>
                <div class="control-group">
                        <?php echo $form->labelEx($model,'username'); ?>
                        <?php echo $form->textField($model,'username'); ?>
                        <?php echo $form->error($model,'username', array('class' => 'help-block')); ?>
                </div>
                <div class="control-group">
                        <?php echo $form->labelEx($model,'password'); ?>
                        <?php echo $form->passwordField($model,'password'); ?>
                        <?php echo $form->error($model,'password', array('class' => 'help-block')); ?>
                </div>
                <div class="control-group">
                        <?php echo $form->checkBox($model,'rememberMe'); ?>
                        <?php echo $form->label($model,'rememberMe', array('class' => 'inline-label')); ?>
                        <?php echo $form->error($model,'rememberMe'); ?>
                </div>
                <div class="control-group">
                        <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
                </div>
            </fieldset>
        <?php $this->endWidget(); ?>
    </div>
</div>
