function changeInputType() {
    const select = document.getElementById("column");
    const inputContainer = document.getElementById("search-input-container");
    const selectedOption = select.options[select.selectedIndex].value;

    if (selectedOption === "police_station") {
        inputContainer.innerHTML = '<select name="search" id="search">' +
            '<option value="Motor Traffic (AMENDMENT) Act, No. 8 of 2009">Motor Traffic (AMENDMENT) Act, No. 8 of 2009</option>' +
            '</select>';
    } else {
        inputContainer.innerHTML = '<input type="text" name="search" id="search">';
    }
}