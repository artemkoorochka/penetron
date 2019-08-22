<?php
class iblock extends CModule
{
	var $MODULE_ID = "iblock";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;
	var $errors;

    function InstallDB()
    {
        global $DB;
        $DB->RunSQLBatch(dirname(__FILE__)."/sql/install.sql");
    }

    function UnInstallDB()
    {
        global $DB;
        $DB->RunSQLBatch(dirname(__FILE__)."/sql/uninstall.sql");

    }
    function DoInstall()
    {
        $this->InstallDB();
        RegisterModule("koorochka.septic.master");
        RegisterModuleDependences("main", "OnBeforeEndBufferContent", "koorochka.septic.master", "\\Koorochka\\Septic", "OnBeforeEndBufferContent");
        return true;
    }
    function DoUninstall()
    {
        $this->UnInstallDB();
        UnRegisterModuleDependences("main", "OnBeforeEndBufferContent", "koorochka.septic.master", "\\Koorochka\\Septic", "OnBeforeEndBufferContent");
        UnRegisterModule("koorochka.septic.master");
        return true;
    }
}