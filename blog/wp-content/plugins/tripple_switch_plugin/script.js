document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.getElementById("add-toggle-tab");
    const tabList = document.getElementById("toggle-tab-list");

    addButton.addEventListener("click", function (e) {
        e.preventDefault();
        let tabName = prompt("Enter Toggle Tab Name:");
        if (tabName) {
            let listItem = document.createElement("li");
            listItem.innerHTML = `<span>${tabName}</span> <button class="remove-tab button">x</button>`;
            tabList.appendChild(listItem);

            // Remove tab event
            listItem.querySelector(".remove-tab").addEventListener("click", function () {
                listItem.remove();
            });
        }
    });
});
