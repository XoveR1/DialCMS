<div class="container-fluid">  
    <div class="row-fluid">
        <div class="span12">
            <noscript>
            <div class="alert in alert-block fade alert-error">
                <a data-dismiss="alert" class="close">×</a>
                <strong><?= Translator::_('ERROR_LABEL') ?></strong> 
                <?= Translator::_('ERROR_NO_JS_SUPPORT') ?>  
                <a href="http://www.enable-javascript.com/" target="_blank">
                    <?= Translator::_('HOW_DO_THIS') ?> 
                </a>
            </div>
            </noscript>
        </div>
    </div>
</div>

<div id="preloaderBlock" style="display: none" class="preloader modal-backdrop">
    <div class="progress progress-striped active center-block">
        <div id="preloaderBar" class="bar" style="width: 0%;"></div>
    </div>
</div>

<? foreach (CSProvider::instance()->getCoreScripts()->getCollection() as $scriptUrl) : ?>
    <script type="text/javascript" src="<?= $scriptUrl->getUrlToItem() ?>" ></script>
<? endforeach; ?>
<script type="text/javascript">
    oCore.init('<?= CSProvider::instance()->getJQueryUploadItem()->getUrlToItem() ?>', 
    <?= CSProvider::instance()->getJQueryUploadItem()->getSizeOfItem() ?>,
    '<?= CSProvider::instance()->showJson(CSProvider::instance()->getUploadScripts(), true) ?>',
    '<?= CSProvider::instance()->showJson(CSProvider::instance()->getLoadedClientConfig(), true) ?>');
</script>