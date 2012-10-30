<?php
$this->pageTitle = Yii::app()->name . ' / Login';
$this->breadcrumbs = array(
    'Login',
);
?>


<?php
$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true, // display a larger alert block?
    'fade' => true, // use transitions?
    'closeText' => '&times;', // close link text - if set to false, no close link is displayed
    'alerts' => array(// configurations per alert type
        'success' => array('block' => true, 'fade' => true, 'closeText' => '&times;'), // success, info, warning, error or danger
    ),
));
?>


<div class="row">
    <div class="center-login">

        <?php
        /** @var BootActiveForm $form */
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'login-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true
            ),
            'htmlOptions' => array('class' => 'well'),
                ));
        ?>

        <fieldset>
            <legend>Login</legend>
            <?php echo $form->textFieldRow($model, 'username', array('class' => 'span4', 'disabled' => 'disabled')); ?>
            <?php echo $form->passwordFieldRow($model, 'password', array('class' => 'span4', 'disabled' => 'disabled')); ?>
            <?php echo $form->checkboxRow($model, 'rememberMe', array('disabled' => 'disabled')); ?>
            
                <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'htmlOptions' => array('disabled' => 'disabled'), 'label' => 'Login', 'type' => 'primary')); ?>

        </fieldset>
        <?php $this->endWidget();
        ?>

        <script type="text/javascript">
            $(document).ready(function(){
                $('*[disabled="disabled"]').attr('disabled', false)
            });
        </script>

    </div>
</div>
