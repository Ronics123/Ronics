<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="main_menu">
    <div class="main">
    <?if (!empty($arResult)):?>
        <ul class="list-inline text-uppercase">
            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):?>
                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                    <li class="<?if ($arItem["SELECTED"]):?>active<?endif?>">
                        <a href="<?=$arItem["LINK"]?>" ">
                        <?=$arItem["TEXT"]?>
                        </a>
                    </li>
                <?endif?>
            <?endforeach?>
        </ul>
        <!-- <div class="clear"></div> -->
    <?endif?>
    </div>
</div>
