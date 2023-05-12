// const searchBar = document.getElementById("quick-search");
// const tableRows = document.getElementsByTagName("tr");

// searchBar.addEventListener("input", () => {
//     const searchValue = searchBar.value.toLowerCase();

//     for (let i = 1; i < tableRows.length; i++) {
//         const row = tableRows[i];
//         const id = row.getElementsByTagName("td")[0].innerText.toLowerCase();
//         const act = row.getElementsByTagName("td")[1].innerText.toLowerCase();
//         const title = row.getElementsByTagName("td")[2].innerText.toLowerCase();
//         const fineAmount = row.getElementsByTagName("td")[3].innerText.toLowerCase();
//         const pointsDeducted = row.getElementsByTagName("td")[4].innerText.toLowerCase();
//         const createdAt = row.getElementsByTagName("td")[5].innerText.toLowerCase();

//         if (
//             id.includes(searchValue) ||
//             act.includes(searchValue) ||
//             title.includes(searchValue) ||
//             fineAmount.includes(searchValue) ||
//             pointsDeducted.includes(searchValue) ||
//             createdAt.includes(searchValue)
//         ) {
//             row.style.display = "";
//         } else {
//             row.style.display = "none";
//         }
//     }
// });
