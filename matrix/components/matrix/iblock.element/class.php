<?
use Matrix\Main\Loader,
    Matrix\Iblock\ElementTable;

class iblockElement extends CMatrixComponent
{
    private $_element;

    // <editor-fold defaultstate="collapsed" desc=" # Element methods">

    /**
     * @return mixed
     */
    public function getElement()
    {
        return $this->_element;
    }

    /**
     * @param mixed $element
     */
    public function setElement($element)
    {
        $this->_element = $element;
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
                $element = ElementTable::getList(array(
                    "filter" => array(
                        "ID" => ["ID"]
                    ),
                    "select" => $this->arParams["select"]
                ));
                if($element = $element->fetch())
                {
                    $this->setElement($element);
                }
            }
            // cached work of some methods
            $this->endResultCache();
        }

        $this->arResult = $this->getElement();

        $this->IncludeComponentTemplate();
    }
    // </editor-fold>
}
?>