import './bootstrap';

window.setFries = function ($button) {

    let all = document.getElementById("all_cat");
    let un_cat = document.getElementById("un_cat");
    let advance_input = document.getElementsByClassName("advance-input");

    if ($button) {
            if ($button === 'all') {
                un_cat.checked = false;
            } else {
                all.checked = false;
            }
        for (var i = 0; i < advance_input.length; i++)
            advance_input[i].checked = false;
    } else {
        all.checked = false;
        un_cat.checked = false;
    }
}
