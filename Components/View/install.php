<html>
<head>
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>
<h1><?php echo $gingerTranslations['GINGER_BANK_LABEL'] ?></h1>
<?php use GingerPlugins\Components\Configurators\BankConfig;

if (!$ginger_api_key) {
    echo $gingerTranslations['GINGER_INSTALLMANUAL'];
} else {
    echo $gingerTranslations['GINGER_EDITMANUAL'];
} ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Paymethods</h3>
    </div>
    <div class="panel-body">
        <p>The following paymethods will become available in your webshop.</p>

        <?php foreach ($paymentMethods as $oPaymethod) {
            echo '<span style="display: inline-block; width: 75px;">';
            echo sprintf('<img src="%s" style="width: 50px; padding: 7px 0" /> ', $oPaymethod->icon);
            echo '</span>';
            echo $oPaymethod->name;
            echo '<br />';
        } ?>

        <form action="<?php echo BankConfig::AppInstallUri; ?>" method="post" onsubmit="showInstallingMessage(event)">
            <input type="hidden" name="language" id="language" value="<?php echo $language ?>"/>
            <input type="hidden" name="api_public" id="api_public" value="<?php echo $api_public ?>"/>
            <input type="hidden" name="install_type" id="install_type" value="app_psp"/>

            <label for="ginger_api_key"
                   style="margin-top: 10px"><?php echo $gingerTranslations['GINGER_APIKEY']; ?></label>
            <input type="text" name="ginger_api_key" id="ginger_api_key" value="<?php echo $ginger_api_key; ?>"
                   style="width: 25%"/><br>

            <?php if (!$ginger_api_key) { ?>
                <button id="installButton" name="action" class="btn btn-success" style="margin-top: 20px"
                        value="install">Install</button>
            <?php } else { ?>
                <button id="saveButton" name="action" class="btn btn-success" style="margin-top: 20px" value='update'>Save</button>
            <?php } ?>
        </form>
    </div>
</div>

<script>
    function showInstallingMessage(event) {
        var installButton = document.getElementById('installButton');
        var saveButton = document.getElementById('saveButton');

        if (installButton && installButton.value === 'install') {
            installButton.innerHTML = 'Installing...';
        }

        if (saveButton && saveButton.value === 'update') {
            saveButton.innerHTML = 'Saving...';
        }
    }
</script>
</body>
</html>
