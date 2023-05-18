function changeInputType() {
    const select = document.getElementById("column");
    const inputContainer = document.getElementById("search-input-container");
    const selectedOption = select.options[select.selectedIndex].value;

    if (selectedOption === "act") {
        inputContainer.innerHTML = '<select name="search" id="search">' +
            '<option value="Motor Traffic (AMENDMENT) Act, No. 8 of 2009">Motor Traffic (AMENDMENT) Act, No. 8 of 2009</option>' +
            '</select>';
    } else if (selectedOption === "law_type") {
        inputContainer.innerHTML = '<select name="search" id="search">' +
            '<option value="Fine">Fine</option>' +
            '<option value="Court">Court</option>' +
            '<option value="Other">Other</option>' +
            '</select>';
    } else if (selectedOption === "title" || selectedOption === "law_text") {
        inputContainer.innerHTML = '<input type="text" name="search" id="search">';
    } else if (selectedOption === "created_at" || selectedOption === "latest_update_at") {
        inputContainer.innerHTML = '<input type="date" name="search" id="search">';
    } else if (selectedOption === "id" || selectedOption === "part_number" || selectedOption === "chapter_number" || selectedOption === "section_number" || selectedOption === "fine_amount" || selectedOption === "points_deducted" || selectedOption === "added_by" || selectedOption === "latest_update_by") {
        inputContainer.innerHTML = '<input type="number" name="search" id="search">';
    } else {
        inputContainer.innerHTML = '<input type="number" name="search" id="search">';
    }
}