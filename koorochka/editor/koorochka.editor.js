/**
 * Koorochka editor
 * @constructor
 */
function KoorochkaEditor(id)
{
    this.id = id;
    this.editor = null;

    // init
    this.setEditor();
}

/**
 * Editor object methods
 */
KoorochkaEditor.prototype.setEditor = function(){
    this.editor = $("#" + this.id);
};
KoorochkaEditor.prototype.getEditor = function(){
    if(this.editor === null){
        this.setEditor();
    }
    return this.editor;
};

/**
 * Editor events
 * @param item
 * @param code
 */
KoorochkaEditor.prototype.click = function(item, code){
    this.editor.focus();

    switch (code) {
        case "b":
            document.execCommand("bold", false, null);
            break;
        case "i":
            document.execCommand("italic", false, null);
            break;
        case "s":
            document.execCommand("strikeThrough", false, null);
            break;
        case "ul":
            document.execCommand("insertunorderedlist", false, null);
            break;
        case "ol":
            document.execCommand("insertOrderedList", false, null);
            break;
        case "div":
            document.execCommand("insertParagraph", false, null);
            break;
        case "hr":
            document.execCommand("insertHorizontalRule", false, null);
            break;
        case "color":
            document.execCommand("foreColor", false, item.value);
            break;
        case "bg":
            document.execCommand("backColor", false, item.value);
            break;
        case "underline":
            document.execCommand("underline", false, item.value);
            break;
        case "blockquote":
            document.execCommand("formatBlock", false, "blockquote");
            break;
        case "out":
            document.execCommand("insertBrOnReturn", false, null);
            break;
    }

};

/**
 * Debug tools
 * @param value
 */
KoorochkaEditor.prototype.d = function (value) {
    console.info(value);
};
