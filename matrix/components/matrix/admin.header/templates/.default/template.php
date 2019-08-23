<?
/**
 * @var array $arResult
 */
use Matrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top shadow">
    <a class="navbar-brand" href="#">penetron</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample06">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/activity/file.system/"><?=Loc::getMessage("LINK_FILE_SYSTEM")?></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="/activity/"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"><?=Loc::getMessage("LINK_ABOUT")?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><?=Loc::getMessage("LINK_ABOUT_ACTIONS")?></a>
                    <a class="dropdown-item" href="#"><?=Loc::getMessage("LINK_ABOUT_REVIEWS")?></a>
                    <a class="dropdown-item" href="#"><?=Loc::getMessage("LINK_ABOUT_HISTORY")?></a>
                    <a class="dropdown-item" href="#"><?=Loc::getMessage("LINK_ABOUT_ISOLATION")?></a>
                    <a class="dropdown-item" href="#"><?=Loc::getMessage("LINK_ABOUT_CONTACTS")?></a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="/activity/"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false"><?=Loc::getMessage("LINK_SETTINGS")?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>

                    <?if($arResult["AUTH"]):?>
                        <a class="dropdown-item"
                           href="/activity/?logout=yes">
                            <?=Loc::getMessage("LINK_LOGOUT")?>
                        </a>
                    <?else:?>
                        <a class="dropdown-item"
                           href="/activity/">
                            <?=Loc::getMessage("LINK_LOGIN")?>
                        </a>
                    <?endif;?>
                </div>
            </li>

        </ul>

    </div>
</nav>