<tr class="table-active" id="SubChapter-$ID">
    <td class="subsidiary_number"><code>$SubNo</code></td>
    <td class="subsidiary_title">$Title</td>
    <td colspan="$AnnexChapter.getTeamCount()">
        <% if $Description %>
            <b>Objective:</b>
            $Description
        <% end_if %>
    </td>
    <% if not $Comparing %>
    <td colspan="2"></td>
    <% end_if %>
</tr>
