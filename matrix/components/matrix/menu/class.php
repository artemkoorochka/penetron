<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CMatrixMenuComponent extends CMatrixComponent
{
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

    /**
     * @param $dir
     * @param $type
     * @return mixed
     * Тут мы получаем массив пунктов меню через инклуд файла меню
     */
	public function requireItems($dir, $type){
        $aMenuLinks = array();
        $file = $_SERVER["DOCUMENT_ROOT"] . $dir . "." . $type . ".menu.php";
        if(file_exists($file)){
            require_once $file;
        }
	    return $aMenuLinks;
    }

    /**
     * @return array
     * Тут мы обрабатываем массив пунктов меню
     */
	public function getItems(){
        $links = array();
        $aMenuLinks = $this->requireItems($this->arParams["CURRENT_DIR"], $this->arParams["ROOT_MENU_TYPE"]);
        if(!empty($aMenuLinks)){
            $i = 0;
            foreach ($aMenuLinks as $link){
                $links[$i] = array(
                    "TEXT" => $link[0],
                    "LINK" => $link[1],
                    "DEPTH_LEVEL" => "1"
                );
                if(!empty($link[3]))
                {
                    $links[$i]["PARAMS"] = $link[3];
                }
                if($this->arParams["MAX_LEVEL"] > 1){
                    $subMenuLinks = $this->requireItems($link[1], $this->arParams["CHILD_MENU_TYPE"]);
                    if(!empty($subMenuLinks)){
                        $links[$i]["IS_PARENT"] = true;
                        foreach ($subMenuLinks as $link){
                            $i++;
                            $links[$i] = array(
                                "TEXT" => $link[0],
                                "LINK" => $link[1],
                                "DEPTH_LEVEL" => "2",
                                "IS_PARENT" => false
                            );
                            if(!empty($link[3]))
                            {
                                $links[$i]["PARAMS"] = $link[3];
                            }
                        }
                    }
                }
                $i++;
            }
        }

        return $links;
    }

    /**
     * Execution
     */
    public function executeComponent()
    {

        /**
         * start work with cache
         */
        if($this->startResultCache(false))
        {
            $this->arResult = $this->getItems();
            $this->endResultCache();
        }



        $this->IncludeComponentTemplate();
    }
}