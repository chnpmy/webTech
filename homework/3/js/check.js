/**
 * Created by chnpmy on 2014/10/25.
 */

function validate() {
    var at = document.getElementById("email").value.indexOf("@");
    var age = document.getElementById("age").value;
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var submitOK = "true";

    if (fname.length < 1 || lname.length < 1){
        alert("名字必须大于 0 个字符。");
        submitOK = "false";
    }
    if (fname.length > 20 || lname.length > 20) {
        alert("名字必须小于 20 个字符。");
        submitOK = "false";
    }
    if (isNaN(age) || age < 1 || age > 100) {
        alert("年龄必须是 1 与 100 之间的数字。");
        submitOK = "false";
    }
    if (at == -1) {
        alert("不是有效的电子邮件地址。");
        submitOK = "false";
    }
    if (submitOK == "false") {
        alert("error");
        return false;
    }
}