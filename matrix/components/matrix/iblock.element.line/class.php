<?

use Matrix\Iblock\ElementTable;
use Matrix\Main\Loader;

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
                    $this->setElment($element);
                }
            }
            // cached work of some methods
            $this->endResultCache();
        }

        $this->arResult = $this->getElements();

        $this->IncludeComponentTemplate();
    }
    // </editor-fold>
}
?>