const dropdowns = Array.from(document.getElementsByClassName('rasci-value'));
const savebuttons = Array.from(document.getElementsByClassName('savebutton'));
const form = document.getElementById('Form_SaveForm');

export default function () {
    dropdowns.forEach(item => {
        item.addEventListener("change", () => {
            const cell = item.closest('td');
            const row = cell.closest('tr');
            cell.classList.remove('r', 'a', 's', 'c', 'i');
            cell.classList.add(item.value[0].toLowerCase());
            savebuttons.forEach(item => {
                item.style.display = 'none';
            });
            row.querySelector('td.savebutton').style.display = 'block';
        });
    });

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const original = e.explicitOriginalTarget;
        original.value = "";
        e.explicitOriginalTarget.classList.add('spinner-border');
        const data = new FormData(form);
        const request = new XMLHttpRequest();
        request.open("POST", form.getAttribute('action'));
        request.send(data);
        setTimeout(() => {
            e.explicitOriginalTarget.classList.remove('spinner-border');
            e.explicitOriginalTarget.value = "Save";
            try {
                e.explicitOriginalTarget.closest('td').style.display = 'none';
            } catch (exception) {
                // noop, we're using a button outside of the table
            }
            request.onreadystatechange = () => {
                if (request.readyState === 4) {
                    document.getElementById('totals-table').innerHTML = (request.response);
                }
            }
        }, 1000);
        return false;
    });
}
