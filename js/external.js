/**
 * Created by chnpmy on 2014/10/17.
 */
function externallinks() {
    if (!document.getElementsByTagName) return;
    var anchors = document.getElementsByTagName("a");
    for (var i=0; i<anchors.length; i++) {
        var anchor = anchors[i];
        if (anchor.getAttribute("href") &&
            anchor.getAttribute("rel") == "external")
            anchor.target = "_blank";
        else if (anchor.getAttribute("href") &&
            anchor.getAttribute("rel") == "mainframe")
        anchor.target = "mainframe";
    }
}
window.onload = externallinks;