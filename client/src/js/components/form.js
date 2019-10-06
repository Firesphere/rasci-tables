const dropdowns = Array.from(document.getElementsByClassName('rasci-value'));
const savebuttons = Array.from(document.getElementsByClassName('savebutton'));
const form = document.getElementById('Form_SaveForm')
const table = document.getElementById('totals-table');

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
            document.querySelector('th.savebutton').style.display = 'block';
            Array.from(document.querySelectorAll('td.savebutton.alert-dark'))
                .forEach(item => {
                    item.style.display = 'block';
                })
        });
    });

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        let original = e.explicitOriginalTarget;
        original.value = "";
        e.explicitOriginalTarget.classList.add('spinner-border');
        let data = new FormData(form);
        let request = new XMLHttpRequest();
        request.open("POST", form.getAttribute('action'));
        request.send(data);
        request.onreadystatechange = () => {
            table.innerHTML = request.response;
        };
        setTimeout(() => {
            e.explicitOriginalTarget.classList.remove('spinner-border');
            e.explicitOriginalTarget.value = "Save";
            try {
                e.explicitOriginalTarget.closest('td').style.display = 'none';
                document.querySelector('th.savebutton').style.display = 'none';
                Array.from(document.querySelectorAll('td.savebutton.alert-dark')).forEach(item => {
                    item.style.display = 'none';
                });

            } catch (exception) {
                // no-op
            }
        }, 1000);
        return false;
    });
}
