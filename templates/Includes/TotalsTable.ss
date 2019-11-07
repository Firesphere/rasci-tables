<% cached $cacheKey %>
    <table class="table-bordered table-striped table-hover table-header-rotated" id="totals-table">
        <thead>
        <tr class=" alert alert-primary">
            <th></th>
            <% loop $Annex.Teams %>
                <th class="rotate-45 $FirstLast">
                    <div><span>$Name</span></div>
                </th>
            <% end_loop %>
            <th class="text-center">Total per team</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-left">Number of responsibilities</td>
            <% loop $Annex.Teams %>
                <td class="r team $FirstLast">$TotalItems('R')</td>
            <% end_loop %>
            <td class="text-right">$getTotals('R')</td>
        </tr>
        <tr>
            <td class="text-left">Number of accountabilities</td>
            <% loop $Annex.Teams %>
                <td class="a team $FirstLast">$TotalItems('A')</td>
            <% end_loop %>
            <td class="text-right">$getTotals('A')</td>
        </tr>
        <tr>
            <td class="text-left">Number of controls supported</td>
            <% loop $Annex.Teams %>
                <td class="s team $FirstLast">$TotalItems('S')</td>
            <% end_loop %>
            <td class="text-right">$getTotals('S')</td>
        </tr>
        <tr>
            <td class="text-left">Number of controls on which consulted</td>
            <% loop $Annex.Teams %>
                <td class="c team $FirstLast">$TotalItems('C')</td>
            <% end_loop %>
            <td class="text-right">$getTotals('C')</td>
        </tr>
        <tr>
            <td class="text-left">Number of controls of which informed</td>
            <% loop $Annex.Teams %>
                <td class="i team $FirstLast">$TotalItems('I')</td>
            <% end_loop %>
            <td class="text-right">$getTotals('I')</td>
        </tr>
        </tbody>
    </table>
<% end_cached %>
