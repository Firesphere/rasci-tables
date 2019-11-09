<% cached $cacheKey %>
    <% with $Annex %>
    <table class="table-bordered table-striped table-hover table-header-rotated" id="totals-table">
        <thead>
        <tr class=" alert alert-primary">
            <th></th>
            <% loop $CachedTeams %>
                <th class="rotate-45 $FirstLast">
                    <div><span>$Name</span></div>
                </th>
            <% end_loop %>
            <th class="text-center">Total responsibilities</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="text-left">Number of responsibilities</td>
            <% loop $CachedTeams %>
                <td class="r team $FirstLast">$TotalItems('R')</td>
            <% end_loop %>
            <td class="text-right">$Up.getTotals('R')</td>
        </tr>
        <tr>
            <td class="text-left">Number of accountabilities</td>
            <% loop $CachedTeams %>
                <td class="a team $FirstLast">$TotalItems('A')</td>
            <% end_loop %>
            <td class="text-right">$Up.getTotals('A')</td>
        </tr>
        <tr>
            <td class="text-left">Number of controls supported</td>
            <% loop $CachedTeams %>
                <td class="s team $FirstLast">$TotalItems('S')</td>
            <% end_loop %>
            <td class="text-right">$Up.getTotals('S')</td>
        </tr>
        <tr>
            <td class="text-left">Number of controls on which consulted</td>
            <% loop $CachedTeams %>
                <td class="c team $FirstLast">$TotalItems('C')</td>
            <% end_loop %>
            <td class="text-right">$Up.getTotals('C')</td>
        </tr>
        <tr>
            <td class="text-left">Number of controls of which informed</td>
            <% loop $getCachedTeams %>
                <td class="i team $FirstLast">$TotalItems('I')</td>
            <% end_loop %>
            <td class="text-right">$Up.getTotals('I')</td>
        </tr>
        </tbody>
        <tfoot >
        <tr>
            <td><b>Total</b></td>
            <% loop $getCachedTeams %>
                <td class="team $FirstLast"><b>$TotalRASCI()</b></td>
            <% end_loop %>
            <td class="text-right"><b>$Up.TotalRASCI</b></td>
        </tr>
        </tfoot>
    </table>
    <% end_with %>
<% end_cached %>
