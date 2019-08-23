<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CMatrixMenuComponent extends CMatrixComponent
{
    private $_currentDir;
    private $_items;


    // <editor-fold defaultstate="collapsed" desc=" # Prepare params">
    /**
     * @param $arParams
     * @return mixed
     */
    public function onPrepareComponentParams($arParams)
    {
        $arParams["CACHE_TYPE"] = $arParams["MENU_CACHE_TYPE"];
        $arParams["CACHE_TIME"] = $arParams["MENU_CACHE_TIME"];

        //Menu depth level
        if (isset($arParams["MAX_LEVEL"]) && 1 < intval($arParams["MAX_LEVEL"]) && intval($arParams["MAX_LEVEL"]) < 5)
            $arParams["MAX_LEVEL"] = intval($arParams["MAX_LEVEL"]);
        else
            $arParams["MAX_LEVEL"] = 1;

        //Root menu type
        if (isset($arParams["ROOT_MENU_TYPE"]) && strlen($arParams["ROOT_MENU_TYPE"]) > 0)
            $arParams["ROOT_MENU_TYPE"] = htmlspecialcharsbx(trim($arParams["ROOT_MENU_TYPE"]));
        else
            $arParams["ROOT_MENU_TYPE"] = "left";

        //Child menu type
        if (isset($arParams["CHILD_MENU_TYPE"]) && strlen($arParams["CHILD_MENU_TYPE"]) > 0)
            $arParams["CHILD_MENU_TYPE"] = htmlspecialcharsbx(trim($arParams["CHILD_MENU_TYPE"]));
        else
            $arParams["CHILD_MENU_TYPE"] = "left";

        //Include menu_ext.php
        $arParams["USE_EXT"] = (isset($arParams["USE_EXT"]) && $arParams["USE_EXT"] == "Y" ? true : false);

        $arParams["DELAY"] = (isset($arParams["DELAY"]) && $arParams["DELAY"] == "Y" ? "Y" : "N");

        //Allow multiple highlightning of current item in menu
        $arParams["ALLOW_MULTI_SELECT"] = ($arParams["ALLOW_MULTI_SELECT"] == "Y");

        //Find current menu item in RecalcMenu(). Cach ID depends on this parameter too
        $arParams["CACHE_SELECTED_ITEMS"] = ($arParams["CACHE_SELECTED_ITEMS"] <> "N" && $arParams["CACHE_SELECTED_ITEMS"] !== false);

        return $arParams;
    }
    // </editor-fold>


    // <editor-fold defaultstate="collapsed" desc=" # Menu items">

    public function requireItems(){

    }

    // </editor-fold>

    // <editor-fold defaultstate="collapsed" desc=" # Execution component">
    public function executeComponent()
    {

        /**
         * start work with cache
         */
        if($this->startResultCache(false))
        {
            // cached work of some methods
            $this->endResultCache();
        }



        $this->IncludeComponentTemplate();
    }
    // </editor-fold>
}