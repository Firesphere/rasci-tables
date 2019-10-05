<table class="table-bordered table-striped table-hover" id="totals-table">
    <thead>
    <tr>
        <th>Total per team</th>
        <% loop $Annex.Teams %>
            <th>$Name</th>
        <% end_loop %>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-left">Number of responsibilities</td>
        <% loop $Annex.Teams %>
            <td class="r team">$TotalItems('R')</td>
        <% end_loop %>
    </tr>
    <tr>
        <td class="text-left">Number of accountabilities</td>
        <% loop $Annex.Teams %>
            <td class="a team">$TotalItems('A')</td>
        <% end_loop %>
    </tr>
    <tr>
        <td class="text-left">Number of controls supported</td>
        <% loop $Annex.Teams %>
            <td class="s team">$TotalItems('S')</td>
        <% end_loop %>
    </tr>
    <tr>
        <td class="text-left">Number of controls on which consulted</td>
        <% loop $Annex.Teams %>
            <td class="c team">$TotalItems('C')</td>
        <% end_loop %>
    </tr>
    <tr>
        <td class="text-left">Number of controls of which informed</td>
        <% loop $Annex.Teams %>
            <td class="i team">$TotalItems('I')</td>
        <% end_loop %>
    </tr>
    </tbody>
</table>
