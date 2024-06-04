function ajaxReloadElement(url,id_element, user_function) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById(id_element).innerHTML = this.responseText;
            user_function();
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}