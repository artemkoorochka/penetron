<?

use Matrix\Iblock\ElementTable,
    Matrix\Main\FileTable,
    Matrix\Main\Loader;


class iblockElementLine extends CMatrixComponent
{
    private $_elements;

    // <editor-fold defaultstate="collapsed" desc=" # Elements methods">

    /**
     * @return mixed
     */
    public function getElements()
    {
        return $this->_elements;
    }

    /**
     * @param mixed $elements
     */
    public function setElements($elements)
    {
        $this->_elements = $elements;
    }

    /**
     * @param mixed $elments
     */
    public function setElment($element)
    {
        $this->_elements[] = $element;
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
            if(Loader::includeModule("iblock")){
                $arrFilter = array(
                    "filter" => array(
                        "IBLOCK_ID" => $this->arParams["IBLOCK_ID"]
                    )
                );
                if(!empty($this->arParams["select"])){
                    $arrFilter["select"] = $this->arParams["select"];
                }
                if(!empty($this->arParams["filter"])){
                    $arrFilter["filter"] = array_merge($this->arParams["filter"], $arrFilter);
                }
                $elements = ElementTable::getList($arrFilter);
                while($element = $elements->fetch())
                {
                    if($element["PREVIEW_PICTURE"] > 0){
                        $element["PREVIEW_PICTURE"] = CFile::GetFileArray($element["PREVIEW_PICTURE"]);
                    }
                    if($element["DETAIL_PICTURE"] > 0){
                        $element["DETAIL_PICTURE"] = CFile::GetFileArray($element["DETAIL_PICTURE"]);
                    }
                    $this->setElment($element);
                }
            }
            // cached work of some methods
            $this->endResultCache();
        }

        $this->arResult["ITEMS"] = $this->getElements();
        $this->IncludeComponentTemplate();
    }
    // </editor-fold>
}
?>