<table class="table-bordered table-striped table-hover table-header-rotated" id="totals-table">
    <thead>
    <tr class=" alert alert-primary">
        <th>Total per team</th>
        <% loop $Annex.Teams %>
            <th class="rotate-45"><div><span>$Name</span></div></th>
        <% end_loop %>
        <th class="text-center">Totals</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="text-left">Number of responsibilities</td>
        <% loop $Annex.Teams %>
            <td class="r team">$TotalItems('R')</td>
        <% end_loop %>
        <td class="text-right">$Totals('R')</td>
    </tr>
    <tr>
        <td class="text-left">Number of accountabilities</td>
        <% loop $Annex.Teams %>
            <td class="a team">$TotalItems('A')</td>
        <% end_loop %>
        <td class="text-right">$Totals('A')</td>
    </tr>
    <tr>
        <td class="text-left">Number of controls supported</td>
        <% loop $Annex.Teams %>
            <td class="s team">$TotalItems('S')</td>
        <% end_loop %>
        <td class="text-right">$Totals('S')</td>
    </tr>
    <tr>
        <td class="text-left">Number of controls on which consulted</td>
        <% loop $Annex.Teams %>
            <td class="c team">$TotalItems('C')</td>
        <% end_loop %>
        <td class="text-right">$Totals('C')</td>
    </tr>
    <tr>
        <td class="text-left">Number of controls of which informed</td>
        <% loop $Annex.Teams %>
            <td class="i team">$TotalItems('I')</td>
        <% end_loop %>
        <td class="text-right">$Totals('I')</td>
    </tr>
    </tbody>
</table>
