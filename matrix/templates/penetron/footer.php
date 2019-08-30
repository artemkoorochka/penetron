<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
use Matrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
            </div>
        </div>


        <div class="parallax" id="contact-us">
            <div class="container">
                <h3>
                    (044) 360-68-24
                    <br>
                    Связаться с нами
                </h3>
                <div class="row">
                    <div class="col-xs-12 col-md-6">

                        <?$APPLICATION->IncludeComponent("matrix:feedback.form", "", array(
                            "ACTION" => $APPLICATION->GetCurPage(false),
                            "FIELDS" => array(
                                "NAME",
                                "EMAIL",
                                "PHONE",
                                "TEXT"
                            )
                        ))?>

                    </div>
                    <div class="col-xs-12 col-md-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.255056690442!2d30.646982315393522!3d50.454974979476006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNTDCsDI3JzE3LjkiTiAzMMKwMzgnNTcuMCJF!5e0!3m2!1suk!2sua!4v1476261227252" style="width:100%;height:450px;border:0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-v1 sticky-footer">
            <div class="footer hidden-xs">
                <div class="container">
                    <div class="row">

                        <div class="col-md-4 col-sm-6 md-margin-bottom-40 wow fadeIn">
                            <div class="text-danger h3">PENETRON</div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>




                        <div class="col-md-4 col-sm-6 md-margin-bottom-40 wow fadeIn">
                            <div class="headline"><h2><?=Loc::getMessage("FOOTER_NEWS")?></h2></div>
                            <?$APPLICATION->IncludeComponent("matrix:iblock.element.line", "list.unstyled", array(
                                "SEF_BASE_URL" => "/about/articles/#ID#/",
                                "IBLOCK_ID" => 5
                            ));?>
                        </div>
                        <div class="col-md-4 col-sm-6 map-img md-margin-bottom-40 wow fadeIn">
                            <div class="headline"><h2><?=Loc::getMessage("FOOTER_CONTACTS")?></h2></div>
                            <address class="md-margin-bottom-40">
                                <p><b>Киев</b></p>
                                ул. Магнитогорская, 1 "Б"
                                <p>+38(044)360-68-24</p>
                                <p>+38(067)526-39-29</p>

                                <p><b>Ивано-Франковск</b></p>
                                <p>+38(050)943-52-42</p>
                                <p>+38(096)386-16-98</p>
                            </address>
                        </div><!--/col-md-3-->
                    </div>
                </div>
            </div><!--/footer-->

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 hidden-xs">
                            <p>
                                <?$APPLICATION->IncludeComponent(
                                    "matrix:main.include",
                                    ".default",
                                    array(
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "AREA_FILE_SHOW" => "file",
                                        "PATH" => SITE_DIR . "local/inc/copyright.html",
                                        "EDIT_TEMPLATE" => ""
                                    ),
                                    false,
                                    array(
                                        "HIDE_ICONS" => "Y"
                                    )
                                );?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <?$APPLICATION->IncludeComponent(
                                "matrix:main.include",
                                ".default",
                                array(
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "AREA_FILE_SHOW" => "file",
                                    "PATH" => SITE_DIR . "local/inc/social.links.html",
                                    "EDIT_TEMPLATE" => ""
                                ),
                                false,
                                array(
                                    "HIDE_ICONS" => "Y"
                                )
                            );?>
                        </div>
                    </div>
                </div>
            </div><!--/copyright-->
        </div>
        <!--=== End Footer Version 1 ===-->
        </div>

<?
echo "</body>";
$APPLICATION->ShowHeadScripts();
echo "</html>";
?>