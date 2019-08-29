/**
 * Koorochka editor
 * @constructor
 */
function KoorochkaEditor(id)
{
    this.id = id;
    this.input = id + "-input";
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

    /**
     * https://developer.mozilla.org/ru/docs/Web/API/Document/execCommand
     *
     */
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
        case "out":
            document.execCommand("insertBrOnReturn", false, null);
            break;
        // formatBlock
        case "blockquote":
            document.execCommand("formatBlock", false, "blockquote");
            break;
        case "h1":
            document.execCommand("formatBlock", false, "h1");
            break;
        case "h2":
            document.execCommand("formatBlock", false, "h2");
            break;
        case "h3":
            document.execCommand("formatBlock", false, "h3");
            break;
        case "h4":
            document.execCommand("formatBlock", false, "h4");
            break;
        case "h5":
            document.execCommand("formatBlock", false, "h5");
            break;
        case "h6":
            document.execCommand("formatBlock", false, "h6");
            break;
    }

    this.valueConvert();
};

/**
 * TODO set modal object for set file
 */

/**
 * Form methods
 * @param value
 */
KoorochkaEditor.prototype.valueToInput = function (value) {
    $("#" + this.input).html(value);
};
KoorochkaEditor.prototype.valueConvert = function () {
    this.valueToInput(this.editor.html());
};

/**
 * Debug tools
 * @param value
 */
KoorochkaEditor.prototype.d = function (value) {
    console.info(value);
};

