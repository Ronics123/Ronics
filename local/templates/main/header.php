<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE html>
<html>
<head>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-3.1.0.min.js"></script>
    <script src="<?= SITE_TEMPLATE_PATH ?>/js/script.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?$APPLICATION->ShowHead()?>
    <title><?$APPLICATION->ShowTitle()?></title>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
<div id="header">
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "main",
        Array(
            "ROOT_MENU_TYPE"	=>	"top",
            "MAX_LEVEL"	=>	"1",
            "USE_EXT"	=>	"N",
            "MENU_CACHE_TYPE" => "A",
            "MENU_CACHE_TIME" => "3600",
            "MENU_CACHE_USE_GROUPS" => "N",
            "MENU_CACHE_GET_VARS" => Array()
        )
    );?>
</div>
<div class="main">

        <h1 id="pagetitle"><?$APPLICATION->ShowTitle(false)?></h1>
        <div class="content">